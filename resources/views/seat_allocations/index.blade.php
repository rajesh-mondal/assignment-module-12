@extends('layouts.app')

@section('content')
    <h1 class="mb-4 d-flex justify-content-between align-items-center">
        Seat Allocations
        <a href="{{ route('seat-allocations.create') }}" class="btn btn-primary">Add Booking</a>
    </h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Trip</th>
                <th>Seat Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($seatAllocations as $seatAllocation)
                <tr>
                    <td>{{ $seatAllocation->id }}</td>
                    <td>{{ $seatAllocation->user->name }}</td>
                    <td>{{ $seatAllocation->trip->id }}</td>
                    <td>{{ $seatAllocation->seat_number }}</td>
                    <td>
                        <a href="{{ route('seat-allocations.edit', $seatAllocation->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('seat-allocations.destroy', $seatAllocation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this seat allocation?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
