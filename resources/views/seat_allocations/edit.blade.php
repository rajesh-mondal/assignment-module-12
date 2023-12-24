@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Seat Allocation</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('seat-allocations.update', $seatAllocation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">User:</label>
            <select class="form-control" name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $seatAllocation->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="trip_id" class="form-label">Trip:</label>
            <select class="form-control" name="trip_id" required>
                @foreach ($trips as $trip)
                    <option value="{{ $trip->id }}" {{ $trip->id == $seatAllocation->trip_id ? 'selected' : '' }}>{{ $trip->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="seat_number" class="form-label">Seat Number:</label>
            <input type="number" class="form-control" name="seat_number" value="{{ $seatAllocation->seat_number }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Seat Allocation</button>
    </form>
@endsection
