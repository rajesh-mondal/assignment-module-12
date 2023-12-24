@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Create Booking</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('seat-allocations.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">User:</label>
            <select class="form-control" name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="trip_id">Select Trip</label>
            <select name="trip_id" id="trip_id" class="form-control">
                @foreach ($tripDetails as $trip)
                    <option value="{{ $trip->id }}">
                        {{ $trip->fromLocation->name }} to {{ $trip->toLocation->name }} on {{ $trip->date }} (Price: {{ $trip->price }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="seat_number" class="form-label">Seat Number:</label>
            <input type="number" class="form-control" name="seat_number" required>
        </div>

        <button type="submit" class="btn btn-success">Create Seat Allocation</button>
    </form>
@endsection
