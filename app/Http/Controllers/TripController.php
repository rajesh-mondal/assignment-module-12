<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Location;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::all();
        return view('trips.create', compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'from_location_id' => 'required|exists:locations,id',
            'to_location_id' => 'required|exists:locations,id',
            'price' => 'required|numeric',
        ]);

        $validatedData['available_seats'] = 36;

        Trip::create($validatedData);

        return redirect()->route('trips.index')->with('success', 'Trip created successfully');
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
        $trip = Trip::findOrFail($id);
        $locations = Location::all();
        return view('trips.edit', compact('trip', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $trip = Trip::findOrFail($id);

        $validatedData = $request->validate([
            'date' => 'required|date',
            'from_location_id' => 'required|exists:locations,id',
            'to_location_id' => 'required|exists:locations,id',
            'price' => 'required|numeric',
        ]);

        $validatedData['available_seats'] = $trip->available_seats;

        $trip->update($validatedData);

        return redirect()->route('trips.index')->with('success', 'Trip updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully');
    }
}
