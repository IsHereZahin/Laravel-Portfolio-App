<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Portfolio = Portfolio::all();
        $i = 1;
        return view('admin.portfolio.index', compact('Portfolio', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'category' => 'required',
            'short_desc' => 'required',
            'description' =>'required',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if (!empty($request->image)){
            $image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/portfolio'), $image);
        }

        Portfolio::create([
            'name' => $request->name,
            'title' => $request->title,
            'category' => $request->category,
            'short_desc' => $request->short_desc,
            'description' => $request->description,
            'image' => $image,
        ]);

        // Success notification
        $notification = [
            'message'    => 'Portfolio added successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('portfolio.index')->with($notification);
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
        $Portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit', compact('Portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'       => 'required|string',
            'title'      => 'required|string',
            'category'   => 'required|string',
            'short_desc' => 'required|string',
            'description' => 'required|string',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $portfolio = Portfolio::find($id);

        if(!empty($request->image)){
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/portfolio'), $image);

            #delete old image
            if(File::exists(public_path('upload/portfolio/'.$portfolio->image))) {
                File::delete(public_path('upload/portfolio/'.$portfolio->image));
            }
        }
        else
        $image = $portfolio->image;


        // Update portfolio data
        $portfolio->update([
            'name' => $request->name,
            'title' => $request->title,
            'category' => $request->category,
            'short_desc' => $request->short_desc,
            'description' => $request->description,
            'image' => $image,
        ]);

        $notification = [
            'message' => 'Portfolio updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('portfolio.index')->with($notification);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Portfolio = Portfolio::query()->find($id);
        Portfolio::query()->find($id)->delete();

        // dd ($data);
        File::delete(public_path('upload/portfolio/'.$Portfolio->image));

        // Deleted notification
        $notification = [
           'message'    => 'Portfolio deleted successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('portfolio.index')->with($notification);
    }
}
