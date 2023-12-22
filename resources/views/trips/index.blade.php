@extends('layouts.app')

@section('content')
    <h1 class="mb-4 d-flex justify-content-between align-items-center">
        Trip List
        <a href="{{ route('trips.create') }}" class="btn btn-primary">Add Trip</a>
    </h1>

    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>From</th>
                <th>To</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trips as $trip)
                <tr>
                    <td>{{ $trip->date }}</td>
                    <td>{{ $trip->fromLocation->name }}</td>
                    <td>{{ $trip->toLocation->name }}</td>
                    <td>{{ $trip->price }}</td>
                    <td>
                        <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
