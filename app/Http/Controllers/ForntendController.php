<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutMultiImage;
use App\Models\ClientsFeedback;
use App\Models\Experience;
use App\Models\Hero;
use App\Models\Portfolio;
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
        $portfolio = Portfolio::all();
        $feedback = ClientsFeedback::all();
        return view('frontend.index', compact('hero', 'about', 'images', 'portfolio', 'feedback'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {
        $about = About::first();
        $experience = Experience::all();
        $feedback = ClientsFeedback::all();
        return view('frontend.about.index', compact('about', 'experience', 'feedback'));
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
        $portfolio = Portfolio::find($id);
        return view('frontend.portfolio.portfolio_details', compact('portfolio'));
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
