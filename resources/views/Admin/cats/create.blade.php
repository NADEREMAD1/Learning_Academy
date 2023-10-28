@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')
<div class="container mt-5 vh-100">

    <div class="d-flex justify-content-between mb-3">
        <h6 class="text-dark">C<span class="text-danger">A</span>T<span class="text-danger">E</span>G<span class="text-danger">R</span>I<span class="text-danger">E</span>S  /<span class="text-danger"> Add New</span></h6>
        <a href="{{ route('admin.cats.index') }}" class="btn btn-danger btn-sm">Back</a>
    </div>

    @include('admin.inc.errors')

    <form action="{{ route('admin.cats.store') }}" method="POST" class="form-control">
        @csrf
        <div class="form-group">

            <label for="exampleInputEmail1">Name</label>

            <input type="text" name="name" class="form-control mb-2 bg-white text-dark" id="exampleInputEmail1">

        </div>
        <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
    </form>

</div>

    @endsection
