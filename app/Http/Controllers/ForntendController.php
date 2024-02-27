<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutMultiImage;
use App\Models\Experience;
use App\Models\Hero;
use Illuminate\Http\Request;

class ForntendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        $about = About::first();
        $images = AboutMultiImage::all();
        return view('frontend.index', compact('hero', 'about', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {
        $about = About::first();
        $experience = Experience::all();
        return view('frontend.about.index', compact('about', 'experience'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
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
