@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')
<div class="container mt-5 vh-100">

    <div class="d-flex justify-content-between mb-3">
        <h6>categrouis / Add New</h6>
        <a href="{{ route('admin.cats.index') }}" class="btn btn-danger btn-sm">Back</a>
    </div>

    @include('admin.inc.errors')

    <form action="{{ route('admin.cats.store') }}" method="POST">
        @csrf
        <div class="form-group">

            <label for="exampleInputEmail1">Name</label>

            <input type="text" name="name" class="form-control mb-2 bg-white" id="exampleInputEmail1">

        </div>
        <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
    </form>

</div>

    @endsection
