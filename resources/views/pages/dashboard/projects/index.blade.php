@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-2 fw-bold">My projects:</h1>

    <a href="{{route('dashboard.projects.create')}}" class="btn btn-primary d-block ms-auto">Create A New Project</a>

    <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Type</th>
            <th scope="col">Cover</th>
            <th scope="col">Slug</th>
          </tr>
        </thead>
        <tbody>

            @foreach ( $projects as $project )
            <tr>
                <th>{{$project->id}}</th>
                <td><a href="{{route('dashboard.projects.show', $project->slug)}}">{{$project->title}}</a></td>
                <td>{{$project->type ? $project->type->name : '-' }}</td>
                <td>{{$project->cover ? 'Yes':'No'}}</td>
                <td>{{$project->slug}}</td>
              </tr>
            @endforeach

        </tbody>
      </table>
</div>
@endsection
