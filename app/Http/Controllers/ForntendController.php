<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutMultiImage;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ClientsFeedback;
use App\Models\Experience;
use App\Models\Hero;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForntendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero       = Hero::first();
        $about      = About::first();
        $images     = AboutMultiImage::all();
        $portfolio  = Portfolio::all();
        $feedback   = ClientsFeedback::all();
        $blogs      = Blog::latest()->limit(3)->get();
        return view('frontend.index', compact('hero', 'about', 'images', 'portfolio', 'feedback', 'blogs' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {
        $about = About::first();
        $experience = Experience::all();
        $feedback = ClientsFeedback::all();
        $blogs      = Blog::latest()->limit(3)->get();
        return view('frontend.about.index', compact('about', 'experience', 'feedback', 'blogs'));
    }

    /**
     * portfolio
     */
    public function portfolio()
    {
        $portfolio = Portfolio::all();
        return view('frontend.portfolio.all_portfolio', compact('portfolio'));
    }

    /**
     * Display the specified resource.
     */
    public function portfolio_details(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('frontend.portfolio.portfolio_details', compact('portfolio'));
    }

    public function blog()
    {
        $blogs = Blog::latest()->get();;

        foreach ($blogs as $blog) {
            $blog->share_count = Hash::make(rand(10, 99));
        }

        $allBlogs = Blog::all();
        $allTags = [];

        // Extract tags from each blog and add them to $allTags array
        foreach ($allBlogs as $blogItem) {
            $tags = explode(',', $blogItem->tags);
            $allTags = array_merge($allTags, $tags);
        }

        // Remove duplicates from $allTags
        $uniqueTags = array_unique($allTags);

        $latestblog = Blog::latest()->limit(5)->get();
        $blogcategory = BlogCategory::all();
        return view('frontend.blog.all_blog', compact('blogs','uniqueTags', 'latestblog', 'blogcategory'));
    }

    public function blog_details(string $id)
    {
        $blog = Blog::findOrFail($id);
        $allBlogs = Blog::all();
        $allTags = [];

        // Extract tags from each blog and add them to $allTags array
        foreach ($allBlogs as $blogItem) {
            $tags = explode(',', $blogItem->tags);
            $allTags = array_merge($allTags, $tags);
        }

        // Remove duplicates from $allTags
        $uniqueTags = array_unique($allTags);

        $recentblogs = Blog::latest()->limit(5)->get();
        $blogcategory = BlogCategory::all();

        return view('frontend.blog.blog_details', compact('blog', 'uniqueTags', 'recentblogs', 'blogcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
