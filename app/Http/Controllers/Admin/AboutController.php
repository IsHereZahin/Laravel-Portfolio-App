<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function edit()
    {
        $about = About::first();
        return view('admin.about.about', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title'             => 'nullable',
            'short_title'       => 'nullable',
            'button_name'       => 'nullable',
            'button_url'        => 'nullable',
            'short_description' => 'nullable',
            'long_description'  => 'nullable',
            'image'             => 'image|mimes:png,jpg',
        ]);

        // Find the first About record or create a new instance
        $about = About::firstOrNew();

        // Check if image is present in the request
        if ($request->hasFile('image')) {
            // Generate a unique filename for the image
            $image = time().'.'.$request->image->extension();
            // Move the uploaded image to the specified directory
            $request->image->move(public_path('upload/about/index'), $image);
            // Delete the old image if it exists
            if (!empty($about->image) && File::exists(public_path('upload/about/index/'.$about->image))) {
                File::delete(public_path('upload/about/index/'.$about->image));
            }
        } else {
            // If no new image is uploaded, keep the existing image filename
            $image = $about->image;
        }


        // Update the record with the provided data
        $about->fill([
            'title'             => $request->title,
            'short_title'       => $request->short_title,
            'button_name'       => $request->button_name,
            'button_url'        => $request->button_url,
            'short_description' => $request->short_description,
            'long_description'  => $request->long_description,
            'image'             => $image,
        ]);

        // Save the changes to the database
        $about->save();

        // Determine the appropriate success notification message based on whether data was updated or created
        $notificationMessage = $about->wasRecentlyCreated ? 'Data Created Successfully' : 'Data Updated Successfully';

        // Success notification
        $notification = [
            'message'    => $notificationMessage,
            'alert-type' => 'info',
        ];

        return redirect()->route('home.about.edit')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete()
    {
        // Find the first About record and delete it
        $about = About::first();
        if ($about) {
            $about->delete();

            // Success notification
            $notification = [
                'message'    => 'Data deleteed Successfully',
                'alert-type' => 'success',
            ];
        } else {
            // If no About record found
            $notification = [
                'message'    => 'No data found to delete',
                'alert-type' => 'info',
            ];
        }

        return redirect()->route('home.about.edit')->with($notification);
    }
}
