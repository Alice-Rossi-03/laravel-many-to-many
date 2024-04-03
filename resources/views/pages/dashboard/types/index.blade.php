@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-2 fw-bold">My projects:</h1>

    <a href="{{route('dashboard.types.create')}}" class="btn btn-primary d-block ms-auto">Add A New Type</a>

    <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Type</th>
            <th scope="col">Slug</th>
          </tr>
        </thead>
        <tbody>

            @foreach ( $types as $type )
            <tr>
                <th>{{$type->id}}</th>
                <td><a href="{{route('dashboard.types.show', $type->slug)}}">{{$type->name}}</a></td>
                <td>{{$type->slug}}</td>
              </tr>
            @endforeach

        </tbody>
      </table>
</div>
@endsection
