@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-2 fw-bold">{{ $type->name }}</h1>

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('dashboard.types.edit', $type->slug) }}" class="btn btn-warning">EDIT</a>

            <form action="{{ route('dashboard.types.destroy', $type->slug) }}" method="POST">

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    DELETE
                </button>
            </form>
        </div>
    </div>


@endsection
