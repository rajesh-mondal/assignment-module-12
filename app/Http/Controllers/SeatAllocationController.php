<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SeatAllocation;

class SeatAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seatAllocations = SeatAllocation::all();
        return view('seat_allocations.index', compact('seatAllocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trips = Trip::all();
        $users = User::all();
        return view('seat_allocations.create', compact('trips', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'trip_id' => 'required|exists:trips,id',
            'seat_number' => 'required|integer',
        ]);

        SeatAllocation::create($validatedData);

        return redirect()->route('seat-allocations.index')->with('success', 'Seat allocation created successfully');
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
        $seatAllocation = SeatAllocation::findOrFail($id);
        $trips = Trip::all();
        $users = User::all();
        return view('seat_allocations.edit', compact('seatAllocation', 'trips', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $seatAllocation = SeatAllocation::findOrFail($id);

        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'trip_id' => 'required|exists:trips,id',
            'seat_number' => 'required|integer',
        ]);

        $seatAllocation->update($validatedData);

        return redirect()->route('seat-allocations.index')->with('success', 'Seat allocation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $seatAllocation = SeatAllocation::findOrFail($id);
        $seatAllocation->delete();

        return redirect()->route('seat-allocations.index')->with('success', 'Seat allocation deleted successfully');
    }
}
