@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')
<div class="container mt-5 vh-100">

<div class="d-flex justify-content-between mb-3">
    <h5 class="text-dark">C<span class="text-danger">A</span>T<span class="text-danger">E</span>G<span class="text-danger">R</span>I<span class="text-danger">E</span>S  / Edit / <span class="text-danger"> {{$cat->name}}</span></h5>
    <a href="{{ route('admin.cats.index') }}" class="btn btn-danger btn-sm">Back</a>
</div>

    @include('admin.inc.errors')

<form action="{{ route('admin.cats.update') }}"  method="POST" class="form-control">

    @csrf

        <input type="hidden" name="id" value="{{$cat->id}}">

    <div class="form-group ">

        <label for="exampleInputEmail1 text-danger">Name</label> <br>

        <input type="text" name="name" class="form-control mb-3 mt-2 w-75 bg-white text-dark" value="{{$cat->name}}">

    </div>

    <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
</form>
</div>

@endsection








