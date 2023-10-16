@extends('front.layout')
@section('content')

        <!-- breadcrumb start-->
        <section class="breadcrumb breadcrumb_bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb_iner text-center">
                            <div class="breadcrumb_iner_item">
                                <h2>Our Courses</h2>
                                <p>Home<span>/</span>Courses<span>/</span>Category<span>/</span>{{$cat->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb start-->
        <!--::review_part start::-->
        <section class="special_cource padding_top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section_tittle text-center">
                            <p>popular courses</p>
                            <h2>Special Courses</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ( $courses as $c )

                    <div class="col-sm-6 col-lg-4">
                        <div class="single_special_cource">
                            <img src="{{asset('uplods/corses/' . $c->img ) }} " class="special_img" alt="">
                            <div class="special_cource_text">

                                <a href="{{Route('front.cat',$c->cat->id)}}" class="btn_4">{{$c->cat->name}}</a>
                                <h4>${{$c->price}}</h4>

                                <a href="{{Route('front.show',[$c->cat->id,$c->id])}}"><h3>{{$c->name}}</h3></a>
                                
                                {{-- Araay هحطها ف  param لو عايز ابعت اكتر من  --}}
                                <p>{{$c->small_desc}}</p>
                                <div class="author_info">
                                    <div class="author_img">
                                        <img src="{{asset("uplods/Trainers/" . $c->Trainer->img ) }}" class="w-25" alt="">
                                        <div class="author_info_text">
                                            <p>Conduct by:</p>
                                            <h5>{{$c->trainer->name}}</h5>
                                        </div>
                                    </div>
                                    <div class="author_rating">
                                        <div class="rating">
                                            <a href="#"><img src="{{asset("Front/img/icon/color_star.svg") }} " alt=""></a>
                                            <a href="#"><img src="{{asset("Front/img/icon/color_star.svg") }} " alt=""></a>
                                            <a href="#"><img src="{{asset("Front/img/icon/color_star.svg") }} " alt=""></a>
                                            <a href="#"><img src="{{asset("Front/img/icon/color_star.svg") }} " alt=""></a>
                                            <a href="#"><img src="{{asset("Front/img/icon/star.svg") }}" alt=""></a>
                                        </div>
                                        <p>3.8 Ratings</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                @endforeach
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














