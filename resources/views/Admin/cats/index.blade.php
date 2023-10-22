@extends('Admin.layout')
@section('content')

<div class="d-flex justify-content-between p-5">
    <h5>Categories</h5>
<button class="btn btn-sm btn-primary">Add New</button>
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
@foreach ( $cat as $cats)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{$cats->name}}</td>
        <td>
            <button class="btn btn-sm btn-info">Edit</button>
            <button class="btn btn-sm btn-danger">Delete</button>
        </td>
      </tr>
@endforeach

    </tbody>
  </table>
@endsection

