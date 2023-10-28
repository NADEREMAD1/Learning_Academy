@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')
<div class="container p-5 vh-100">
    <div class="d-flex justify-content-between p-5 ">
        <h5 class="text-dark">S<span class="text-danger">T</span>U<span class="text-danger">D</span>E</span><span class="text-danger">N</span>T  / Show Courses</h5>
        <a class="btn btn-sm btn-info" href="{{ route('admin.students.addToCourse',$student_id) }}">Add To Course</a>
        <a class="btn btn-sm btn-primary" href="{{ route('admin.students.index') }}">BACK</a>
    </div>
    <table class="table w-100 container text-white">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">status</th>
                <th scope="col">Acthions</th>
            </tr>
        </thead>
        <tbody>
            @if ($courses)
                @foreach ($courses as $c)
                    <tr>
                        <td>
                            <p>{{ $c->id }}</p>

                        </td>
                        <td>
                            <p>{{ $c->name }}</p>
                        </td>
                        <td>
                            <p>{{ $c->status }}</p>
                        </td>
                        <td>
                    {{-- @if ($c->status !== "approve")
                    <a href="{{ route('admin.students.approveCourses',[ $student_id , $c->id]) }}" class="btn btn-sm btn-info">approve</a>
                     @endif

                    @if (!$c->status !== "reject")
                     <a href="{{ route('admin.students.rejectCourses',[ $student_id , $c->id]) }}" class="btn btn-sm btn-danger">reject</a>
                    @endif --}}
                @if ($c->status != "approve")
                    <a href="{{ route('admin.students.approveCourses', [$student_id, $c->id]) }}" class="btn btn-sm btn-info">approve</a>
                    @endif

                    @if ($c->status != "reject")
                    <a href="{{ route('admin.students.rejectCourses', [$student_id, $c->id]) }}" class="btn btn-sm btn-danger">reject</a>
                    @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <p>No courses available for this student.</p>
            @endif
        </tbody>
    </table>
@endsection
