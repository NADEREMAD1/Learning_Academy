@extends('Admin.layout')
@section('content')

<div class="d-flex justify-content-between p-5">
    <h5>Categories</h5>
    <a class="btn btn-sm btn-primary" href="{{route('admin.cats.create')}}">Add New</a>
</div>

<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Acthio</th>
      </tr>
    </thead>
    <tbody>
@foreach ( $cat as $cat )
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{$cat->name}}</td>
        <td>

            <a href="{{ route('admin.cats.edit',$cat->id) }}" class="btn btn-sm btn-info">Edit</a>

            <a href="{{ route('admin.cats.delete',$cat->id) }}" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
@endforeach

    </tbody>
  </table>
@endsection

