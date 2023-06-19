<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /*
    Description
    Name
    Related Articles

    */
    public function __construct() {
        $this->middleware('auth', ['only' => ['create', 'edit']]);
    }
    public function index()
    {
        // $categories = Category::all();
        $categories = Category::paginate(5);
        return view('categories.index', compact('categories'));
    }

    public function show($category){
        $category = Category::find($category);
        return view('categories.show', compact('category'));
    }

    public function create(){
        return view('categories.create');
    }

    public function store(CategoryRequest $request){
        $formData = $request->all();

        Category::create($formData);

        return redirect('categories');
    }

    // Method to update table records
    public function edit($category){
        $category = Category::findOrFail($category);
        return view('categories.edit', compact("category"));
    }

    // Method to Update a record
    public function update(CategoryRequest $request, $category){
        $formData = $request->all();
        $category = Category::findOrFail($category);
        $category->update($formData);

        return redirect('categories');
    }


    public function destroy(Category $category) {
        $category->posts()->delete();
        $category->delete();
        return redirect('categories');
    }
    public function manage() {
        $categories = Category::withTrashed()->get();
        return view('categories.manage', compact("categories"));
    }
    public function restore($category) {
        Category::withTrashed()->where('id', $category)->restore();
        Category::findOrFail($category)->posts()->restore();
        return redirect('categories');
    }
    public function forceDelete($category) {
        Category::onlyTrashed()->where('id', $category)->forceDelete();
        return redirect('categories');
    }
}
