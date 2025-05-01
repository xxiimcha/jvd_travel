<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourController extends Controller
{
    // Show all tours (index page)
    public function index()
    {
        // Later: fetch tours from DB
        return view('admin.tours.index');
    }

    // Show form to create a new tour
    public function create()
    {
        return view('admin.tours.create');
    }

    // Store new tour
    public function store(Request $request)
    {
        // Sample validation
        $request->validate([
            'location' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'price'    => 'required|numeric',
            'status'   => 'required|in:Active,Inactive',
        ]);

        // You can replace this with saving to DB later
        // Example: Tour::create($request->all());

        return redirect()->route('admin.tours.index')->with('success', 'Tour created successfully.');
    }
}
