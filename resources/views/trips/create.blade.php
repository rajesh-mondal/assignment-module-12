@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Add Trip</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trips.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="date" class="form-label">Date:</label>
            <input type="date" class="form-control" name="date" required>
        </div>

        <div class="mb-3">
            <label for="from_location_id" class="form-label">From Location:</label>
            <select class="form-control" name="from_location_id" required>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="to_location_id" class="form-label">To Location:</label>
            <select class="form-control" name="to_location_id" required>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" class="form-control" name="price" required>
        </div>

        <button type="submit" class="btn btn-success">Add Trip</button>
    </form>
@endsection
