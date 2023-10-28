@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')

<div class="container mt-3 p-5">

<div class="d-flex justify-content-between mb-3">
    <h6 class="text-dark">T<span class="text-danger">R</span>A<span class="text-danger">I</span>N</span><span class="text-danger">E</span>RS  / Edit / {{$trainers->name}}</h6>

    <a href="{{ route('admin.trainers.index') }}" class="btn btn-danger btn-sm">Back</a>

</div>

    @include('admin.inc.errors')

<form action="{{ route('admin.trainers.update') }}" method="POST" class="form-control p-4"  enctype="multipart/form-data">

    @csrf

        <input type="hidden" name="id" value="{{$trainers->id}}">

    <div class="form-group">

        <label for="exampleInputEmail1">Name</label>

        <input type="text" name="name" class="form-control mb-2 bg-white text-dark" value="{{$trainers->name}}">

    </div>
    <div class="form-group">

        <label for="exampleInputEmail1">phone</label>

        <input type="text" name="phone" class="form-control bg-white text-dark mb-2" value="{{$trainers->phone}}">

    </div>
    <div class="form-group">

        <label for="exampleInputEmail1">spec</label>

        <input type="text" name="spec" class="form-control bg-white text-dark mb-2" value="{{$trainers->spec}}">

    </div>

    <img src="{{asset('uplods/trainers/' . $trainers->img)}}" width="100px" alt="">

    <div class="form-group">

        <label for="exampleInputEmail1">img</label>

        <input type="file" name="img" class="form-control mb-2 bg-white text-dark">
    </div>


    <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
</form>
</div>
@endsection








