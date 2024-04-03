@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-2 fw-bold">{{ $project->title }}</h1>
        <h3 class="mt-2">{{$project->type ? $project->type->name : ''}}</h3>

        <div class="d-flex gap-3">
            @if ($project->cover)
            <figure class="img-fluid">
                <img src="{{ asset('/storage/' . $project->cover) }}" alt="{{ $project->title }}">
            </figure>
            @endif

            <p>{{ $project->description }}</p>
        </div>


        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('dashboard.projects.edit', $project->slug) }}" class="btn btn-warning">EDIT</a>

            <form action="{{ route('dashboard.projects.destroy', $project->slug) }}" method="POST">

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    DELETE
                </button>
            </form>
        </div>


    </div>
@endsection
