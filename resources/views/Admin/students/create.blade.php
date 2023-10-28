@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">
        <h6>students / Add New</h6>
        <a href="{{ route('admin.students.index') }}" class="btn btn-danger btn-sm">Back</a>
    </div>

    @include('admin.inc.errors')

    <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data" class="container">
        @csrf

        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name" class="form-control mb-2" id="Name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control mb-2" id="email">
        </div>

        <div class="form-group">
            <label for="spec">SPEC</label>
            <input type="text" name="spec" class="form-control mb-2" id="spec">
        </div>

        <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
    </form>
</div>
@endsection

