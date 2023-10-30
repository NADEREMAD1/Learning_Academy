@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')
<div class="container mt-5 p-3">

    <div class="d-flex justify-content-between mb-3">
        <h6 class="text-dark">S<span class="text-danger">T</span>U<span class="text-danger">D</span>E</span><span class="text-danger">N</span>T  / Edit / <span class="text-danger">{{ $students->name }}</span></h6>

        <a href="{{ route('admin.students.index') }}" class="btn btn-danger btn-sm">Back</a>

    </div>

    @include('admin.inc.errors')

    <form class="form-control p-4" action="{{ route('admin.students.update') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="id" value="{{ $students->id }}">

        <div class="form-group">

            <label for="exampleInputEmail1">Name</label>

            <input type="text" name="name" class="form-control mb-2 bg-white text-dark" value="{{ $students->name }}">
        </div>

        <div class="form-group">

            <label for="exampleInputEmail1">email</label>

            <input type="text" name="email" class="form-control mb-2 bg-white text-dark" value="{{ $students->email }}">
        </div>
        <div class="form-group">

            <label for="spec">spec</label>
            <textarea name="spec" id="spec" class="form-control mb-2 bg-white text-dark" cols="30" rows="10" >{{ $students->spec }}</textarea>
        </div>
        <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
    </form>
</div>
@endsection
