<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Etrain</title>
    <link rel="icon" href="{{asset("uplods/sttings/" . $sett->favicon) }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset("Front/css/bootstrap.min.css")}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset("Front/css/animate.css")}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset("Front/css/owl.carousel.min.css")}}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset("Front/css/themify-icons.css")}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset("Front/css/flaticon.css")}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset("Front/css/magnific-popup.css")}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset("Front/css/slick.css")}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset("Front/css/style.css")}}">

    @yield('styles')
    {{-- //ف ملف ومضيفهوش ف باقي الملفات  styles لو عايز اضيف ملفات --}}

</head>

<body>
    <!--::header part start::-->
    <header class="main_menu @if (Route::currentRouteName() == 'front.homepage') home_menu @else single_page_menu @endif">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{Route('front.homepage')}}"> <img src="{{asset("uplods/sttings/" . $sett->logo) }} "class="w-25" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{Route('front.homepage')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{Route('front.homepage')}}">About</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Courses
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($cats  as $cat )

                                    <a class="dropdown-item" href="{{Route('front.cat',$cat->id)}}">{{$cat->name}}</a>

                                    @endforeach
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->
