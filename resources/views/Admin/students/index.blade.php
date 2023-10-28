@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')

<div class="d-flex justify-content-between p-5 ">
    <h5 class="text-dark">S<span class="text-danger">T</span>U<span class="text-danger">D</span>E</span><span class="text-danger">N</span>T </h5>
    <a class="btn btn-sm btn-primary" href="{{route('admin.students.create')}}">Add New</a>
</div>

<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">email</th>
        <th scope="col">spec</th>
        <th scope="col">Acthions</th>
      </tr>
    </thead>
    <tbody class="text-white">
@foreach ( $students as $s )
            <tr scope="row" >
                <th scope="row">{{  $s->id }}</th>
                <td>{{$s->name}}</td>
                <td>{{$s->email}}</td>
                <td>{{$s->spec}}</td>
                <td>
                <a href="{{ route('admin.students.edit',$s->id) }}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{ route('admin.students.delete',$s->id) }}" class="btn btn-sm btn-danger">Delete</a>
                <a href="{{ route('admin.students.showCourses',$s->id) }}" class="btn btn-sm btn-primary">show Courses</a>
                </td>
      </tr>
@endforeach
    </tbody>
  </table>

   {{-- create paginate لم عدد الكورسات يبق اكتر من 6 هيعمل زي اسكرول كده لباقي الكورسات --}}

   <div class="d-flex justify-content-center w-100 mb-5 ">
    <ul class="pagination">
        @if ($students->currentPage() > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $students->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @endif

        @for ($i = 1; $i <= $students->lastPage(); $i++)
            <li class="page-item {{ $students->currentPage() == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $students->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($students->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $students->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @endif
    </ul>
</div>

</div>
</div>
</section>
<!--::blog_part end::-->
@endsection

