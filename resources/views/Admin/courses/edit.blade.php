@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">
        <h6>categrouis / Edit / <span class="text-dark"> {{ $course->name }}</span></h6>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-danger btn-sm">Back</a>
    </div>

    @include('admin.inc.errors')

    <form class="container" action="{{ route('admin.courses.update') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="id" value="{{ $course->id }}">

        <div class="form-group">

            <label for="exampleInputEmail1">Name</label>

            <input type="text" name="name" class="form-control text-white mb-2 text-white" value="{{ $course->name }}">

        </div>

        <label class="input-group" for="inputGroupSelect01">Select Your  Catogries </label>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Options</label>
            <select class="form-select" id="inputGroupSelect01" name="cat_id">
                <option class="text-white" selected>Choose...</option>
                @foreach ( $cats as $c )
                <option class="text-white" value="{{$c->id}}" @if ($course->cat_id == $c->id) Selected @endif>
                    {{$c->name}}</option>
                @endforeach
            </select>
          </div>

          <label class="input-group" for="inputGroupSelect02">Select Your  Trainer </label>
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect02">Options</label>
            <select class="form-select " id="inputGroupSelect02" name="trainer_id">
                <option class="text-white" selected>Choose...</option>
                @foreach ( $trainer as $tr )
                <option class="text-white" value="{{$tr->id}}"  @if ($course->trainer_id == $tr->id) Selected @endif>{{$tr->name}}</option>
                @endforeach
            </select>
          </div>


        <div class="form-group">

            <label for="exampleInputEmail1">small_desc</label>

            <input type="text" name="small_desc" class="form-control text-white mb-2" value="{{ $course->small_desc }}">

        </div>

        <div class="form-group">

            <label for="desc">desc</label>
            <textarea name="desc" id="" class="form-control text-white mb-2" cols="30" rows="10" >{{ $course->desc }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">price</label>
            <input type="number" name="price" class="form-control text-white mb-2" id="price" value="{{ $course->price }}">
        </div>
        <div class="form-group">
            <img src="{{ asset('uplods/corses/' . $course->img) }}" height="100px" alt=""><br>

            <label for="exampleInputEmail1">img</label>

            <input type="file" name="img" class="form-control text-dark mb-2">
        </div>
        <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
    </form>
</div>
@endsection
