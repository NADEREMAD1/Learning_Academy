@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')

<div class="d-flex justify-content-between p-5">
    <h5>Trainers</h5>
    <a class="btn btn-sm btn-primary" href="{{route('admin.trainers.create')}}">Add New</a>
</div>

<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">img</th>
        <th scope="col">Name</th>
        <th scope="col">phone</th>
        <th scope="col">spec</th>
        <th scope="col">Acthions</th>
      </tr>
    </thead>
    <tbody>
@foreach ( $trainers as $t )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><img src="{{asset('uplods/trainers/' . $t->img) }}" height="50px" alt=""></td>
                <td>{{$t->name}}</td>
                <td>
        @if ($t->phone !== null)
        {{$t->phone}}
        @else
        Not Exist
@endif
</td>
        <td>{{$t->spec}}</td>
        <td>

            <a href="{{ route('admin.trainers.edit',$t->id) }}" class="btn btn-sm btn-info">Edit</a>

            <a href="{{ route('admin.trainers.delete',$t->id) }}" class="btn btn-sm btn-danger">Delete</a>
        </td>
      </tr>
@endforeach

    </tbody>
  </table>
@endsection

