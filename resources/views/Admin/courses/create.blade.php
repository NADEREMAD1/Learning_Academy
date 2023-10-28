@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">
        <h6 class="text-dark">C<span class="text-danger">O</span>U<span class="text-danger">R</span>S</span><span class="text-danger">E</span>S  / Add New</h6>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-danger btn-sm">Back</a>
    </div>

    @include('admin.inc.errors')

    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data" class="form-control">
        @csrf
        <div class="form-group">

            <label for="Name">Name</label>
            <input placeholder="ENTER YOUR name" type="text" name="name" class="form-control bg-white text-dark  mb-2" id="Name">
        </div>

        <label class="input-group" for="inputGroupSelect01">Select Your  Catogries </label>
        <div class="input-group mb-3 ">
            <label class="input-group-text text-danger" for="inputGroupSelect01">Options</label>
            <select class="form-select bg-white text-dark" id="inputGroupSelect01" name="cat_id">
                <option selected>Choose...</option>
                @foreach ( $cats as $c )
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
          </div>

          <label class="input-group" for="inputGroupSelect02">Select Your  Trainer </label>
          <div class="input-group mb-3">
            <label class="input-group-text text-danger" for="inputGroupSelect02">Options</label>
            <select class="form-select bg-white text-dark" id="inputGroupSelect02" name="cat_id">
                <option selected>Choose...</option>
                @foreach ( $trainer as $tr )
                <option value="{{$tr->id}}">{{$tr->name}}</option>
                @endforeach
            </select>
          </div>
        <div class="form-group">
            <label for="small_desc">small_desc</label>
            <input placeholder="ENTER YOUR small_desc" type="text" name="small_desc" class="form-control bg-white text-dark mb-2" id="small_desc">

        </div>
        <div class="form-group">

            <label for="desc">desc</label>
           <textarea name="desc" id=""  class="form-control bg-white text-dark mb-2"  cols="30" rows="10"></textarea>

        </div>
        <div class="form-group">

            <label for="price">price</label>
            <input placeholder="ENTER YOUR price" type="number" name="price" class="form-control bg-white text-dark mb-2" id="price">

        </div>
        <div class="form-group">
`
            <label for="img">img</label>

            <input placeholder="ENTER YOUR img" type="file" name="img" class="form-control bg-white text-dark mb-2" id="img">
        </div>

        <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
    </form>
</div>
@endsection

