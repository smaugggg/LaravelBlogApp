<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommentController extends Controller
{
    /*
        User
        Body
        Like
        Report for Abuse (?)
     */

    public function __construct() {
        $this->middleware('auth', ['only' => ['create', 'edit']]);
    }
    public function index() {
        $posts = Post::paginate(7);
        $comments = Comment::get();
        return view('comments.index', compact("comments", "posts"));
    }

    public function create() {
        $comments = Post::all();
        return view('comments.create', compact("comments"));
    }

    public function store(CommentRequest $request)
    {
        try {
            $post = Post::findOrFail($request->post_id);

            if (!$request->user()) {
                return redirect()->route('login');
            }

            $comment = new Comment($request->all());
            $comment->author_id = $request->user()->id;
            $comment->author_username = $request->user()->username;
            $comment->post()->associate($post)->save();

            return redirect('posts');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }




    public function show(Comment $comment){
        return view('comments.show', compact('comment'));
    }

    public function destroy(Comment $comment) {
        $comment->delete();
        return redirect('comments');
    }

    public function manage() {
        $comments = Comment::withTrashed()->get();
        return view('comments.manage', compact("comments"));
    }
    public function restore($post) {
        Comment::withTrashed()->where('id', $post)->restore();
        Comment::findOrFail($post)->post()->restore();
        return redirect('comments');
    }
    public function forceDelete($post) {
        Comment::onlyTrashed()->where('id', $post)->forceDelete();
        return redirect('comments');
    }


    public function edit($comment){
        $comment = Comment::findOrFail($comment);
        return view('comments.edit', compact("comment"));
    }
    public function update(Request $request, $comment){
        $formData = $request->all();
        $comment = Comment::findOrFail($comment);
        $comment->update($formData);

        return redirect('comments');
    }
}
