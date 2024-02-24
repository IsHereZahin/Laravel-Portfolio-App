<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $hero = Hero::first();
        return view('admin.home.index.edit', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title'       => 'nullable',
            'short_title' => 'nullable',
            'button_name' => 'nullable',
            'button_link' => 'nullable',
            'video_url'   => 'nullable',
            'hero_image'  => 'image|mimes:png,jpg',
        ]);

        // Fetch or create a record in the Hero table
        $hero = Hero::firstOrNew();

        // Check if hero_image is present in the request
        if ($request->hasFile('hero_image')) {
            // Generate a unique filename for the image
            $image = time().'.'.$request->hero_image->extension();
            // Move the uploaded image to the specified directory
            $request->hero_image->move(public_path('upload/index/hero'), $image);
            // Delete the old image if it exists
            if (!empty($hero->hero_image) && File::exists(public_path('upload/index/hero/'.$hero->hero_image))) {
                File::delete(public_path('upload/index/hero/'.$hero->hero_image));
            }
        } else {
            // If no new image is uploaded, keep the existing image filename
            $image = $hero->hero_image;
        }

        // Update or create the record with the provided data
        $hero->updateOrCreate([], [
            'title'       => $request->title,
            'short_title' => $request->short_title,
            'button_name' => $request->button_name,
            'button_link' => $request->button_link,
            'video_url'   => $request->video_url,
            'hero_image'  => $image,
        ]);

        // Success notification
        $notification = [
            'message'    => 'Hero Data Updated Successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('hero.edit')->with($notification);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
