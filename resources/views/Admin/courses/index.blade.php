@extends('Admin.layout')
@include('Admin.inc.nav')

@section('content')

<div class="d-flex justify-content-between p-5">
    <h5>courses</h5>
    <a class="btn btn-sm btn-primary" href="{{route('admin.courses.create')}}">Add New</a>
</div>

<table class="table table-dark w-100">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">img</th>
        <th scope="col">Name</th>
        <th scope="col">price</th>
        <th scope="col">Acthions</th>
      </tr>
    </thead>
    <tbody>
@foreach ( $courses as $c )
            <tr>
                <th scope="row">{{  $c->id }}</th>
                <td><img src="{{asset('uplods/corses/' . $c->img) }}" height="50px" alt=""></td>
                <td>{{$c->name}}</td>
                <td>{{$c->price}}</td>
                <td>
                    <a href="{{ route('admin.courses.edit',$c->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{ route('admin.courses.delete',$c->id) }}" class="btn btn-sm btn-danger">Delete</a>
                </td>
      </tr>
@endforeach
    </tbody>
  </table>

   {{-- create paginate لم عدد الكورسات يبق اكتر من 6 هيعمل زي اسكرول كده لباقي الكورسات --}}

   <div class="d-flex justify-content-center w-100 mb-5">
    <ul class="pagination">
        @if ($courses->currentPage() > 1)
            <li class="page-item">
                <a class="page-link" href="{{ $courses->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        @endif

        @for ($i = 1; $i <= $courses->lastPage(); $i++)
            <li class="page-item {{ $courses->currentPage() == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $courses->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        @if ($courses->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $courses->nextPageUrl() }}" aria-label="Next">
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

