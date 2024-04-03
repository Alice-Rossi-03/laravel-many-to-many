@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-2 fw-bold">Edit the project:</h1>

        <form action="{{ route('dashboard.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="my-3">
                <label for="title" class="form-label">Insert The Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    aria-describedby="title" name="title" value='{{ old('title') ?? $project->title }}' required>
                @error('title')
                    <div class="alert alert-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Insert The Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') ?? $project->description }}</textarea>
            </div>

            <div class="mb-3">

                @if ($project->cover)
                <label for="cover_img">Old Cover:</label>
                <figure class="img-fluid" id="cover_img">
                    <img src="{{ asset('/storage/' . $project->cover) }}" alt="{{ $project->title }}">
                </figure>
                @endif

            </div>

            <div class="mb-3">
                <label for="cover" class="form-label">Insert The Cover</label>
                <input type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" aria-describedby="cover" name="cover"
                    value='{{ old('cover') ?? $project->cover }}'>
                @error('cover')
                    <div class="alert alert-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">

                <label for="type_id" class="form-label">Insert The Type</label>
                <select name="type_id" id="type_id" class="form-select form-select-lg @error('type_id') is-invalid @enderror">

                    <option value="">Select One</option>

                    @foreach ( $types as $type)
                    <option
                        value="{{$type->id}}"
                        {{$type->id == old('type_id', $project->type ? $project->type->id : '') ? 'selected' : ''}}>
                        {{$type->name}}
                    </option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="alert alert-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">

                <label for="technologies" class="form-label">Insert The Languages</label>
                <select multiple name="technologies[]" id="technologies" class="form-select @error('technologies') is-invalid @enderror">

                    <option value="">Select One Or More</option>

                    @forelse ( $technologies as $technology)

                        @if ($errors->any())

                        <option value="{{$technology->id}}" {{in_array($technology->id, old('technologies', [])) ? 'selected' : ''}}>{{$technology->name}}</option>

                        @else

                        <option value="{{$technology->id}}" {{$project->technologies->contains($technology->id) ? 'selected' : ''}}>{{$technology->name}}</option>

                        @endif

                    @empty

                        <option value="">There are no technologies</option>

                    @endforelse

                </select>
                @error('technologies->name')
                    <div class="alert alert-danger mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary d-block ms-auto">EDIT</button>
        </form>

    </div>
@endsection
