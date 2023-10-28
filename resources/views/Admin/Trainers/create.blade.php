@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')
<div class="container mt-5 vh-100">

    <div class="d-flex justify-content-between mb-3">
        <h6 class="text-dark">T<span class="text-danger">R</span>A<span class="text-danger">I</span>N</span><span class="text-danger">E</span>RS  / Add New</h6>
        <a href="{{ route('admin.trainers.index') }}" class="btn btn-danger btn-sm">Back</a>
    </div>

    @include('admin.inc.errors')

    <form action="{{ route('admin.trainers.store') }}" method="POST" enctype="multipart/form-data" class="form-control  mt-5">
        @csrf
        <div class="form-group">

            <label for="Name">Name</label>

            <input type="text" name="name" class="form-control mb-2 bg-white text-dark" id="Name">

        </div>
        <div class="form-group">

            <label for="phone">phone</label>

            <input type="text" name="phone" class="form-control mb-2 bg-white text-dark" id="phone">

        </div>
        <div class="form-group">

            <label for="spec">spec</label>

            <input type="text" name="spec" class="form-control mb-2 bg-white text-dark" id="spec">

        </div>
        <div class="form-group">

            <label for="img">img</label>

            <input type="file" name="img" class="form-control mb-2 text-dark" id="img">
        </div>
        <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
    </form>
</div>
@endsection

