@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">
        <h6>courses / Add New</h6>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-danger btn-sm">Back</a>
    </div>

    @include('admin.inc.errors')

    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data" class="container">
        @csrf
        <div class="form-group">

            <label for="Name">Name</label>
            <input type="text" name="name" class="form-control mb-2" id="Name">
        </div>

        <label class="input-group" for="inputGroupSelect01">Select Your  Catogries </label>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Options</label>
            <select class="form-select" id="inputGroupSelect01" name="cat_id">
                <option selected>Choose...</option>
                @foreach ( $cats as $c )
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach
            </select>
          </div>

          <label class="input-group" for="inputGroupSelect02">Select Your  Trainer </label>
          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect02">Options</label>
            <select class="form-select" id="inputGroupSelect02" name="trainer_id">
                <option selected>Choose...</option>
                @foreach ( $trainer as $tr )
                <option value="{{$tr->id}}">{{$tr->name}}</option>
                @endforeach
            </select>
          </div>
        <div class="form-group">
            <label for="small_desc">small_desc</label>
            <input type="text" name="small_desc" class="form-control mb-2" id="small_desc">

        </div>
        <div class="form-group">

            <label for="desc">desc</label>
           <textarea name="desc" id=""  class="form-control mb-2"  cols="30" rows="10"></textarea>

        </div>
        <div class="form-group">

            <label for="price">price</label>
            <input type="number" name="price" class="form-control mb-2" id="price">

        </div>
        <div class="form-group">

            <label for="img">img</label>

            <input type="file" name="img" class="form-control mb-2" id="img">
        </div>

        <button class="btn btn-primary btn-sm " type="Submit">Submit</button>
    </form>
</div>
@endsection

