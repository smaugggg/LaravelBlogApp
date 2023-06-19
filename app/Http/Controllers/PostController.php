<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
class PostController extends Controller
{
    /*
        Category
        Name
        body
        Like
        Comment
        Posting User (Admin)
        Tags
        Date Posted
        Last Edited

    */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create','destroy', 'edit']]);
    }

    public function index()
    {
        //$articles = DB::table('articles')->get();
        $posts = Post::paginate(2);
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        // Fetch related posts with the same category ID as the current post
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->limit(3) // Get only the first 3 related posts
            ->get();

        return view('posts.show', compact('post', 'relatedPosts'));
    }
    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact("categories", "tags")); //, "tags"
    }
    public function store(Request $request) {
        $category = Category::findOrFail($request->category_id);
        $post = new Post($request->all());
        $post->user_id = $request->user()->id;
        $post->author_username = $request->user()->username;
        $post->category()->associate($category)->save();
        $post->tags()->sync($request->tags);
        if($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file->storePublicly('posts', 'public');
            $post->file = $path;
            $post->save();
        }

        return redirect('posts');
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect('posts');
    }

    public function manage() {
        $posts = Post::withTrashed()->get();
        return view('posts.manage', compact("posts"));
    }
    public function restore($post) {
        Post::withTrashed()->where('id', $post)->restore();
        Post::findOrFail($post)->category()->restore();
        return redirect('posts');
    }
    public function forceDelete($post) {
        Post::onlyTrashed()->where('id', $post)->forceDelete();
        return redirect('posts');
    }
}
