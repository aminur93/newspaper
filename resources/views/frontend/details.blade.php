<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }} - Details</title>
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
    <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
        <div class="f2-s-1 p-r-30 m-tb-6">
            <a href="{{ url('/') }}" class="breadcrumb-item f1-s-3 cl9">
                Home
            </a>

            <a href="" class="breadcrumb-item f1-s-3 cl9">
                {{ $news_details->category->category_name }}
            </a>

            <span class="breadcrumb-item f1-s-3 cl9">
					 {{ $news_details->headline }}
				</span>
        </div>

        <div class="pos-relative size-a-2 bo-1-rad-22 bocl11 m-tb-6">
            <input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" id="search" placeholder="Search">
            <button class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
                <i class="zmdi zmdi-search"></i>
            </button>

            <div id="news_list"></div>
        </div>
    </div>
</div>

<!-- Content -->
<section class="bg0 p-b-70 p-t-5">
    <!-- Title -->
    <div class="bg-img1 size-a-18 how-overlay1" style="background-image: url({{ asset('assets/admin/uploads/news_large/'.$news_details->image) }});">
        <div class="container h-full flex-col-e-c p-b-58">
            <a href="#" class="f1-s-10 cl0 hov-cl10 trans-03 text-uppercase txt-center m-b-33">
                {{ $news_details->category->category_name }}
            </a>

            <h3 class="f1-l-5 cl0 p-b-16 txt-center respon2">
                {{ $news_details->title }}
            </h3>

            <div class="flex-wr-c-s">
					<span class="f1-s-3 cl8 m-rl-7 txt-center">
						<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
							by {{ $news_details->author }}
						</a>

						<span class="m-rl-3">-</span>

						<span>
							{{ \App\Helpers\Helper::date_convert($news_details->date) }}
						</span>
					</span>

                <span class="f1-s-3 cl8 m-rl-7 txt-center">
						{{ $news_details->news_count }} Views
					</span>

                <a href="" class="f1-s-3 cl8 m-rl-7 txt-center hov-cl10 trans-03">
                    0 Comment
                </a>
            </div>
        </div>
    </div>

    <!-- Detail -->
    <div class="container p-t-82">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-100">
                <div class="p-r-10 p-r-0-sr991">
                    <!-- Blog Detail -->
                    <div class="p-b-70">
                        <p class="f1-s-11 cl6 p-b-25">
                            {!! $news_details->description !!}

                        </p>


                        <!-- Tag -->
                        <div class="flex-s-s p-t-12 p-b-15">
								<span class="f1-s-12 cl5 m-r-8">
									Tags:
								</span>

                            <div class="flex-wr-s-s size-w-0">
                                <a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
                                    {{ $news_details->tag->tah_name }}
                                </a>
                            </div>
                        </div>

                        <!-- Share -->
                        <div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									Share:
								</span>

                            <div class="flex-wr-s-s size-w-0">
                                <a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-facebook-f m-r-7"></i>
                                    Facebook
                                </a>

                                <a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-twitter m-r-7"></i>
                                    Twitter
                                </a>

                                <a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-google-plus-g m-r-7"></i>
                                    Google+
                                </a>

                                <a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                    <i class="fab fa-pinterest-p m-r-7"></i>
                                    Pinterest
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Leave a comment -->
                    <div>
                        <h4 class="f1-l-4 cl3 p-b-12">
                            Leave a Comment
                        </h4>

                        <p class="f1-s-13 cl8 p-b-40">
                            Your email address will not be published. Required fields are marked *
                        </p>

                        <form>
                            <textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="msg" placeholder="Comment..."></textarea>

                            <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Name*">

                            <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="Email*">

                            <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="website" placeholder="Website">

                            <button type="submit" class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
                                Post Comment
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-10 col-lg-4 p-b-100">
                <div class="p-l-10 p-rl-0-sr991">
                    <!-- Banner -->
                    <div class="flex-c-s">
                        <a href="#">
                            <img class="max-w-full" src="{{ asset('assets/frontend/images/banner-02.jpg') }}" alt="IMG">
                        </a>
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

<script>
    $(document).ready(function () {
        $("#search").on('keyup',function () {

            var search = $("#search").val();

            $.ajax({
                url: "{{ route('autocomplete') }}",
                type: "GET",
                data: {search:search},
                success: function (data) {
                    $("#news_list").html(data);
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
        });

    });


</script>

</body>
</html>