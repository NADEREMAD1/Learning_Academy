@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')
<div class="container mt-5 vh-100">

<div class="d-flex justify-content-between mb-3">
    <h6>categrouis / Edit / {{$cat->name}}</h6>
    <a href="{{ route('admin.cats.index') }}" class="btn btn-danger btn-sm">Back</a>
</div>

    @include('admin.inc.errors')

<form action="{{ route('admin.cats.update') }}" class="form-group " method="POST">

    @csrf

        <input type="hidden" name="id" value="{{$cat->id}}">

    <div class="form-group ">

        <label for="exampleInputEmail1 text-danger">Name</label> <br>

        <input type="text" name="name" class="   mb-3 mt-2 w-75" value="{{$cat->name}}">

    </div>

    <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
</form>
</div>

@endsection








