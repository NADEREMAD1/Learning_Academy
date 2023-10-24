@extends('Admin.layout')
@section('content')

<div class="d-flex justify-content-between mb-3">
    <h6>categrouis / Edit / {{$cat->name}}</h6>
    <a href="{{ route('admin.cats.index') }}" class="btn btn-danger btn-sm">Back</a>
</div>

    @include('admin.inc.errors')

<form action="{{ route('admin.cats.update') }}" method="POST">

    @csrf

        <input type="hidden" name="id" value="{{$cat->id}}">

    <div class="form-group">

        <label for="exampleInputEmail1">Name</label>

        <input type="text" name="name" value="{{$cat->name}}">

    </div>

    <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
</form>

@endsection








