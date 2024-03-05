<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blog = Blog::latest()->get();
        $i = 1;
        return view('admin.blog.index', compact('blog', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'blog_category_id'  => 'required',
            'title'             => 'required',
            'tags'              => 'required',
            'description'       => 'required',
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/blog'), $image);
        } else {
            $image = null;
        }

        Blog::create([
            'blog_category_id'  => $request->blog_category_id,
            'title'             => $request->title,
            'tags'              => $request->tags,
            'description'       => $request->description,
            'image'             => $image,
            'created_at'        => Carbon::now(),
        ]);

        return redirect()->route('blog.index')
            ->with('success', 'Blog created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

}
