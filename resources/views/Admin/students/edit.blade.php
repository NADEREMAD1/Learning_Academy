@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')
<div class="container mt-5 p-3">

    <div class="d-flex justify-content-between mb-3">
        <h6>Student / Edit / <span class="text-danger">{{ $students->name }}</span></h6>

        <a href="{{ route('admin.courses.create') }}" class="btn btn-danger btn-sm">Back</a>

    </div>

    @include('admin.inc.errors')

    <form class="container" action="{{ route('admin.students.update') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="id" value="{{ $students->id }}">

        <div class="form-group">

            <label for="exampleInputEmail1">Name</label>

            <input type="text" name="name" class="form-control mb-2 text-white" value="{{ $students->name }}">
        </div>

        <div class="form-group">

            <label for="exampleInputEmail1">small_desc</label>

            <input type="text" name="small_desc" class="form-control mb-2 text-white" value="{{ $students->email }}">
        </div>
        <div class="form-group">

            <label for="desc">desc</label>
            <textarea name="desc" id="" class="form-control mb-2 text-white" cols="30" rows="10" >{{ $students->spec }}</textarea>
        </div>
        <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
    </form>
</div>
@endsection
