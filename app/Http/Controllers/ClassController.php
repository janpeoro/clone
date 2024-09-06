<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes as Classroom;

class ClassController extends Controller
{
    public function index()
    {
        // Fetch all classes from the database
        $classes = Classroom::all();

        // Pass the classes to the welcome view
        return view('welcome', compact('classes'));
    }

    public function createClass(Request $request)
    {
        // Validation logic here
        $request->validate([
            'class_name' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'room' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:20480' // Validating image upload
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('class_images', 'public');
        }

        // Create a new class
        Classroom::create([
            'class_name' => $request->input('class_name'),
            'section' => $request->input('section'),
            'subject' => $request->input('subject'),
            'room' => $request->input('room'),
            'schedule' => $request->input('schedule'),
            'image_path' => $imagePath // Save the image path
        ]);

        return redirect()->back()->with('success', 'Class created successfully!');
    }

    public function joinClass(Request $request)
    {
        // Validation logic here
        $request->validate([
            'class_code' => 'required|string|exists:classes,id', // Assuming 'id' is used as the class code
        ]);

        // Logic to join the class

        return redirect()->back()->with('success', 'Joined class successfully!');
    }

    
}