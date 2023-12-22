@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Add Location</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('locations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Location Name:</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <button type="submit" class="btn btn-success">Add Location</button>
    </form>
@endsection
