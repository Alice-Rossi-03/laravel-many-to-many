@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-2 fw-bold">Edit the technology:</h1>

        <form action="{{ route('dashboard.technologies.update', $technology->slug) }}" method="POST">

            @csrf
            @method('PUT')


            <div class="my-3">
                <label for="name" class="form-label">Insert The Technology</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    aria-describedby="name" name="name" value='{{ old('name') ?? $technology->name }}' required>
                @error('name')
                    <div class="alert alert-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary d-block ms-auto">EDIT</button>
        </form>

    </div>
@endsection

