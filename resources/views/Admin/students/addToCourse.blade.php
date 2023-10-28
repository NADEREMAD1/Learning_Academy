@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')
<div class="container mt-5 p-3 vh-100">

    <div class="d-flex justify-content-between mb-3">
        <h6 class="text-dark">S<span class="text-danger">T</span>U<span class="text-danger">D</span>E</span><span class="text-danger">N</span>T  / Edit / <span class="text-danger">Add Course</span></h6>

        <a href="{{ route('admin.students.index') }}" class="btn btn-danger btn-sm">Back</a>

    </div>

    @include('admin.inc.errors')
        <form class="form-control" action="{{ route('admin.students.storeCourse',$student_id) }}" method="POST" >
        @csrf
        <input type="hidden" name="id" value="{{ $student_id }}">
        <label class="input-group" for="inputGroupSelect01">Select Your  Catogries </label>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Options</label>
            <select class="form-select bg-white text-dark" id="inputGroupSelect01" name="course_id">
                <option selected>Choose...</option>

                @foreach ( $courses as $c )

                <option class="bg-white text-dark" value="{{$c->id}}">{{$c->name}}</option>

                @endforeach
            </select>
          </div>

        <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
    </form>
</div>
@endsection
