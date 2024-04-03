@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-2 fw-bold">{{ $technology->name }}</h1>

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('dashboard.technologies.edit', $technology->slug) }}" class="btn btn-warning">EDIT</a>

            <form action="{{ route('dashboard.technologies.destroy', $technology->slug) }}" method="POST">

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    DELETE
                </button>
            </form>
        </div>
    </div>


@endsection
