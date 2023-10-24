<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function index()
    {
        $page_title = "Blog List";
        $blogs = Blog::all();

        return view('blog.index', compact('page_title', 'blogs'));
    }


    public function create()
    {
        $page_title = "Blog Create";
        $categories = Category::where('type', 1)->get();

        return view('blog.create', compact('page_title', 'categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'thumbnail' => 'required|mimes:jpg,jpeg,png',
            'description' => 'required',
            'status' => 'required',
        ]);

        $image = $request->file('thumbnail');
        $path = 'uploads/blog/';

        Blog::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'thumbnail' => uploadImage($image, $path),
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => $request->status,
        ]);

        return redirect()->route('blog.index')->with('toast_success', 'Blog Added Successfully.');
    }


    public function show(Blog $blog)
    {
        //
    }


    public function edit(Blog $blog)
    {
        $page_title = "Blog Edit";
        $categories = Category::where('type', 1)->get();

        return view('blog.edit', compact('page_title', 'categories', 'blog'));
    }


    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'thumbnail' => 'mimes:jpg,jpeg,png',
            'description' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $path = 'uploads/blog/';
            $old_path = public_path($blog->thumbnail);
        }

        $blog->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'thumbnail' => $request->hasFile('thumbnail') ? uploadImage($image, $path, $old_path):$blog->thumbnail,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'status' => $request->status,
        ]);

        return redirect()->route('blog.index')->with('toast_success', 'Blog Updated Successfully.');
    }


    public function destroy(Blog $blog)
    {
        if (file_exists(public_path($blog->thumbnail))) {
            unlink(public_path($blog->thumbnail));
        }
        $blog->delete();
        return back()->with('toast_success', 'Blog Deleted Successfully.');
    }
}
