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
        return view('admin.about.home_about', compact('about'));
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
        ]);

        // Find the first About record or create a new instance
        $about = About::firstOrNew();

        // Update the record with the provided data
        $about->fill([
            'title'             => $request->title,
            'short_title'       => $request->short_title,
            'button_name'       => $request->button_name,
            'button_url'        => $request->button_url,
            'short_description' => $request->short_description,
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
