<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }} - News Tag</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon.png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/fonts/fontawesome-5.0.8/css/fontawesome-all.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/util.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/main.css') }}">
    <!--===============================================================================================-->
</head>
<body class="animsition">

@include('layouts.frontend.header')

<!-- Breadcrumb -->
<div class="container">
    <div class="bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                Home
            </a>

            <a href="" class="breadcrumb-item f1-s-3 cl9">
                News Tag
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
					{{ $tags->tah_name }}
				</span>
        </div>

        <div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
            <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search">
            <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                <i class="zmdi zmdi-search"></i>
            </button>
        </div>

    </div>
</div>

<!-- Page heading -->
<div class="container p-t-4 p-b-40">
    <h2 class="f1-l-1 cl2">
        {{ $tags->tah_name }}
    </h2>
</div>

<section class="bg0 p-t-70 p-b-55">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-80">

                <div class="row">
                    @foreach($tag_post as $value)
                        {{--@foreach($catp->newsposts as $value)--}}
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/admin/uploads/news_medium/'.$value->image) }}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            {{ $value->title }}
                                        </a>
                                    </h5>

                                    <span class="cl8">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $value->author }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											{!! \App\Helpers\Helper::date_convert($value->date) !!}
										</span>
									</span>
                                </div>
                            </div>
                        </div>
                        {{--@endforeach--}}
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="flex-wr-s-c m-rl--7 p-t-15 justify-content-center">

                    {{ $tag_post->links() }}
                </div>
            </div>

            <div class="col-md-10 col-lg-4 p-b-80">
                <div class="p-l-10 p-rl-0-sr991">
                    <!-- Subscribe -->
                    <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-50">
                        <h5 class="f1-m-5 cl0 p-b-10">
                            Subscribe
                        </h5>

                        <p class="f1-s-1 cl0 p-b-25">
                            Get all latest content delivered to your email a few times a month.
                        </p>

                        <div id="success_message"></div>

                        <div id="error_message"></div>

                        <input type="hidden" value="{{ route('email.subscribes') }}" id="action_route">

                        <form class="size-a-9 pos-relative" id="email_subscribe" method="post">
                            @csrf
                            <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" id="email" placeholder="Email">

                            <button type="submit" class="size-a-10 flex-c-c ab-t-r fs-16 cl9 hov-cl10 trans-03">
                                <i class="fa fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Most Popular -->
                    <div class="p-b-23">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Most Popular
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @php $i = 1; @endphp
                            @foreach($popular_news as $pn)
                                <li class="flex-wr-sb-s p-b-22">
                                    <div class="size-a-8 flex-c-c borad-3 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                        {{ $i++ }}
                                    </div>

                                    <a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                        {{ $pn->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!--  -->
                    <div class="flex-c-s p-b-50">
                        <a href="#">
                            <img class="max-w-full" src="{{ asset('assets/frontend/images/banner-02.jpg') }}" alt="IMG">
                        </a>
                    </div>

                    <!-- Tag -->
                    <div>
                        <div class="how2 how2-cl4 flex-s-c m-b-30">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Tags
                            </h3>
                        </div>

                        <div class="flex-wr-s-s m-rl--5">
                            @forelse($tagss as $tag)
                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    {{ $tag->tah_name }}
                                </a>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.frontend.footer')

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <span class="fas fa-angle-up"></span>
    </span>
</div>

<!--===============================================================================================-->
<script src="{{ asset('assets/frontend/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/frontend/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/frontend/vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

<script>
    $(function() {
        $(".video").click(function () {
            var theModal = $(this).data("target"),
                videoSRC = $(this).attr("data-video"),
                videoSRCauto = videoSRC + "";
            $(theModal + ' source').attr('src', videoSRCauto);
            $(theModal + ' video').attr('src', videoSRCauto);
            $(theModal + ' button.close').click(function () {
                $(theModal + ' source').attr('src', videoSRCauto);
            });
        });
    });
</script>

</body>
</html>