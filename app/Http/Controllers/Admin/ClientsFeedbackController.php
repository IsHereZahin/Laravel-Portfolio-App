<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientsFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientsFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedback = ClientsFeedback::all();
        $i = 1;
        return view('admin.clients_feedback.index', compact('feedback', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients_feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'message' =>'required',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $image = null;
        if (!empty($request->image)){
            $image = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/clients_feedback'), $image);
        }

        ClientsFeedback::create([
            'name' => $request->name,
            'message' => $request->message,
            'image' => $image,
        ]);

        $notification = [
            'message'    => 'Feedback added successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('feedback.index')->with($notification);
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
        $feedback = ClientsFeedback::findOrFail($id);
        return view('admin.clients_feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'   =>'required',
            'message'=>'required',
            'image'  =>'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $feedback = ClientsFeedback::find($id);

        if(!empty($request->image)){
            $image = time().'.'.$request->image->extension();
            $request->image->move(public_path('upload/clients_feedback'), $image);

            #delete old image
            if(File::exists(public_path('upload/clients_feedback/'.$feedback->image))) {
                File::delete(public_path('upload/clients_feedback/'.$feedback->image));
            }
        } else $image = $feedback->image;

        ClientsFeedback::find($id)->update([
            'name'    => $request->name,
            'message' => $request->message,
            'image'   => $image,
        ]);

        $notification = [
            'message'    => 'Feedback updated successfully',
            'alert-type' => 'info',
        ];

        return redirect()->route('feedback.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feedback = ClientsFeedback::query()->find($id);
        ClientsFeedback::query()->find($id)->delete();

        File::delete(public_path('upload/clients_feedback/'.$feedback->image));

        // Deleted notification
        $notification = [
            'message'    => 'Feedback deleted successfully',
            'alert-type' => 'warning',
        ];

        return redirect()->route('feedback.index')->with($notification);

    }
}
