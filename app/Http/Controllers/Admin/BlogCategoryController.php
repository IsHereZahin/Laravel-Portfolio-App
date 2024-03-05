<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog_category = BlogCategory::all();
        $i = 1;
        return view('admin.blog.category.category_index', compact('blog_category', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.category.category_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'blog_category' =>'required',
        ]);

        BlogCategory::create($request->all());

        $notification = [
            'message' => 'Blog Ctaegory created successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('blog.category.index')
            ->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog_category = BlogCategory::findOrFail($id);
        return view('admin.blog.category.category_edit', compact('blog_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'blog_category' =>'required',
        ]);

        $blog_category = BlogCategory::findOrFail($id);
        $blog_category->update($request->all());

        $notification = [
            'message' => 'Blog Ctaegory updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('blog.category.index')
            ->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog_category = BlogCategory::findOrFail($id);
        $blog_category->delete();

        $notification = [
            'message' => 'Blog Category deleted successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('blog.category.index')
            ->with($notification);
    }
}
