<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }} - @yield('page')</title>
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

@include('layouts.frontend.headline')

@include('layouts.frontend.feature_news')

<!-- Post -->
<section class="bg0 p-t-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                @yield('content')
            </div>

            <div class="col-md-10 col-lg-4">
                <div class="p-l-10 p-rl-0-sr991 p-b-20">
                    <!--  -->
                    <div>
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
                    <div class="flex-c-s p-t-8">
                        <a href="#">
                            <img class="max-w-full" src="{{ asset('assets/frontend/images/banner-02.jpg') }}" alt="IMG">
                        </a>
                    </div>

                    <!--  -->
                    <div class="p-t-50">
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Stay Connected
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            <li class="flex-wr-sb-c p-b-20">
                                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                                    <span class="fab fa-facebook-f"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											6879 Fans
										</span>

                                    <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Like
                                    </a>
                                </div>
                            </li>

                            <li class="flex-wr-sb-c p-b-20">
                                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                                    <span class="fab fa-twitter"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											568 Followers
										</span>

                                    <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Follow
                                    </a>
                                </div>
                            </li>

                            <li class="flex-wr-sb-c p-b-20">
                                <a href="#" class="size-a-8 flex-c-c borad-3 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                                    <span class="fab fa-youtube"></span>
                                </a>

                                <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											5039 Subscribers
										</span>

                                    <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                        Subscribe
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Banner -->
<div class="container">
    <div class="flex-c-c">
        <a href="#">
            <img class="max-w-full" src="{{ asset('assets/frontend/images/banner-01.jpg') }}" alt="IMG">
        </a>
    </div>
</div>

@include('layouts.frontend.latest_news')

@include('layouts.frontend.footer')

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
        <span class="fas fa-angle-up"></span>
    </span>
</div>

<!-- Modal Video 01-->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <video controls width="100%">
                    <source src="" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
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

<script>
    $(document).ready(function () {
        $("#search").on('keyup blur',function () {

            var search = $("#search").val();

            $.ajax({
                url: "{{ route('autocomplete') }}",
                type: "GET",
                data: {search:search},
                success: function (data) {

                    var he = $("#search").val();

                    if (he.length === 0 )
                    {
                        //$('#news_list').html("");
                        $('#news_list').fadeOut();
                    }else {
                        $("#news_list").html(data);
                        $("#news_list").fadeIn();
                    }

                }
            });
        });


        $(document).on('click', 'li', function(){
            // declare the value in the input field to a variable
            var value = $(this).text();
            // assign the value to the search box
            $('#search').val(value);
            // after click is done, search results segment is made empty
            $('#news_list').html("");
            $('#news_list').fadeOut();
            loadnews();

        });

        function loadnews() {
            $("#news_list").load(' #news_list')
        }

    });


</script>

</body>
</html>