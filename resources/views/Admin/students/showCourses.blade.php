@extends('Admin.layout')
@section('content')
    <div class="d-flex justify-content-between p-5 ">
        <h5>Students / Show Courses</h5>
        <a class="btn btn-sm btn-primary" href="{{ route('admin.students.create') }}">Add New</a>
    </div>
    @if ($course)
        @foreach ($course as $co)
            <p>{{ $co->name }}</p>
        @endforeach
    @else
        <p>No courses found for this student.</p>
    @endif
@endsection
