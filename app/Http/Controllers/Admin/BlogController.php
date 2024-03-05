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

        $notification = [
            'message' => 'Blog created successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('blog.index')
            ->with($notification);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'blog_category_id'  => 'required',
            'title'             => 'required',
            'tags'              => 'required',
            'description'       => 'required',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $blog = Blog::find($id);

        if(!empty($request->image)){
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/blog'), $image);

            #delete old image
            if(File::exists(public_path('upload/blog/'.$blog->image))) {
                File::delete(public_path('upload/blog/'.$blog->image));
            }
        }
        else
        $image = $blog->image;

        $blog->update([
            'blog_category_id'  => $request->blog_category_id,
            'title'             => $request->title,
            'tags'              => $request->tags,
            'description'       => $request->description,
            'image'             => $image,
        ]);

        $notification = [
            'message' => 'Blog updated successfully',
            'alert-type' => 'info',
        ];
        return redirect()->route('blog.index')
            ->with($notification);
    }

    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        // Delete the associated image if it exists
        if ($blog->image) {
            if (File::exists(public_path('upload/blog/' . $blog->image))) {
                File::delete(public_path('upload/blog/' . $blog->image));
            }
        }

        $blog->delete();

        $notification = [
            'message' => 'Blog deleted successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('blog.index')
            ->with($notification);
    }
}
