<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExperienceBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExperienceBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experience = ExperienceBlog::all();
        $i = 1;
        return view('admin.experiences.index', compact('experience', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.experiences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required',
            'short_description' => 'required',
            'description'       =>'required',
            'image'             =>'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if($request->hasFile('image')) {
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/experience/blog'), $image);
        }
        else {
            $image = null;
        }

        ExperienceBlog::create([
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'image'             => $image,
        ]);

        // Success notification
        $notification = [
            'message' => 'Experience blog created successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('experience.index')->with($notification);
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
        $experience = ExperienceBlog::findOrFail($id);
        return view('admin.experiences.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'             =>'required',
            'short_description' =>'required',
            'description'       =>'required',
            'image'             =>'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);


        $experience = ExperienceBlog::find($id);

        if(!empty($request->image)){
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/experience/blog'), $image);

            #delete old image
            if(File::exists(public_path('upload/experience/blog/'.$experience->image))) {
                File::delete(public_path('upload/experience/blog/'.$experience->image));
            }
        }
        else
        $image = $experience->image;

        $experience->update([
            'title'             => $request->title,
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'image'             => $image,
        ]);

        // Update notification
        $notification = [
          'message' => 'Experience blog updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('experience.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = ExperienceBlog::query()->find($id);
        File::delete(public_path('upload/experience/blog/'.$experience->image));

        $experience->delete();

        // Deleted notification
        $notification = [
           'message' => 'Experience blog deleted successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('experience.index')->with($notification);
    }
}
