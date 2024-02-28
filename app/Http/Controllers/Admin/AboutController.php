<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutMultiImage;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Multi_index()
    {
        $multi_image = AboutMultiImage::all();
        return view('admin.about.multi_image_index', compact('multi_image'));
    }

    public function Multi_create()
    {
        return view('admin.about.multi_image_create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Multi_store(Request $request)
    {
        $request->validate([
            'multi_image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $image = null;
        if (!empty($request->multi_image)){
            $image = time().'.'.$request->multi_image->getClientOriginalExtension();
            $request->multi_image->move(public_path('upload/about/multiimage'), $image);
        }

        AboutMultiImage::create([
            'multi_image' => $image,
        ]);

        $notification = array(
            'message' => 'Image Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('about.multi-image.index')->with($notification);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Multi_edit($id)
    {
        $multi_image = AboutMultiImage::findOrFail($id);
        return view('admin.about.multi_image_edit', compact('multi_image'));
    }

    /**
     * Display the specified resource.
     */
    public function Multi_update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'multi_image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $multi_image = AboutMultiImage::find($id);

        if(!$multi_image) {
            return redirect()->route('about.multi-image.index')->with('info', 'Multi-image not found');
        }

        $notification = [
            'message'    => 'Image updated successfully',
             'alert-type' => 'info',
        ];

        if ($request->hasFile('multi_image')) {
            $image = time().'.'.$request->multi_image->extension();
            $request->multi_image->move(public_path('upload/about/multiimage'), $image);
            // Delete old image
            if (File::exists(public_path('upload/about/multiimage/'.$multi_image->multi_image))) {
                File::delete(public_path('upload/about/multiimage/'.$multi_image->multi_image));
            }
            // Update multi_image attribute in database
            $multi_image->multi_image = $image;
            $multi_image->save();
        }

        return redirect()->route('about.multi-image.index')->with($notification);
    }

    public function Multi_destroy($id)
    {
        $data = AboutMultiImage::query()->find($id);

        $notification = [
            'message'    => 'Image deleted successfully',
             'alert-type' => 'info',
         ];

        // Check if image exists before deletion
        if (!empty($data->multi_image)) {
            if (File::exists(public_path('upload/about/multiimage/' . $data->multi_image))) {
                File::delete(public_path('upload/about/multiimage/' . $data->multi_image));
            } else {
                // Handle non-existent file case (optional: log or notify)
                return redirect()->route('about.multi-image.index')->with($notification);
            }
        }

        AboutMultiImage::query()->find($id)->delete();

        return redirect()->route('about.multi-image.index')->with($notification);
    }







    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////







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

        $data = About::query()->first();
        File::delete(public_path('upload/about/index/'.$data->image));

        About::query()->first()->delete();

        // Find the first About record and delete it
        $notification = [
            'message'    => 'Data deleteed Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('home.about.edit')->with($notification);
    }







/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////







    public function experience_index()
    {
        $experience = Experience::all();
        return view('admin.about.experience.index', compact('experience'));
    }

    public function experience_create()
    {
        return view('admin.about.experience.create');
    }

    public function experience_store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'duration'    => 'required',
            'description' => 'required',
        ]);

        Experience::create([
            'title'       => $request->title,
            'duration'    => $request->duration,
            'description' => $request->description,
        ]);
        $notification = array(
          'message' => 'Experience Inserted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('about.experience.index')->with($notification);
    }

    public function experience_edit($id)
    {
        $data = Experience::findOrFail($id);
        return view('admin.about.experience.edit', compact('data'));
    }

    public function experience_update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'duration'    => 'required',
            'description' => 'required',
        ]);

        $data = Experience::find($id);

        $data->title = $request->title;
        $data->duration = $request->duration;
        $data->description = $request->description;
        $data->save();

        // Success notification
        $notification = [
            'message'    => 'Experience updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('about.experience.index')->with($notification);
    }

    public function experience_destroy($id)
    {
        $data = Experience::findOrFail($id);
        $data->delete();

        // Success notification
        $notification = [
           'message'    => 'Experience deleteed Successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('about.experience.index')->with($notification);
    }
}
