@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-2 fw-bold">The Technologies:</h1>

    <a href="{{route('dashboard.technologies.create')}}" class="btn btn-primary d-block ms-auto">Add A New Technology</a>

    <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Technology</th>
            <th scope="col">Slug</th>
          </tr>
        </thead>
        <tbody>

            @foreach ( $technologies as $item )
            <tr>
                <th>{{$item->id}}</th>
                <td><a href="{{route('dashboard.technologies.show', $item->slug)}}">{{$item->name}}</a></td>
                <td>{{$item->slug}}</td>
              </tr>
            @endforeach

        </tbody>
      </table>
</div>
@endsection
