<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }} - Contact</title>
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

            <span class="breadcrumb-item f1-s-3 cl9">
					 Contact Us
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

<!-- Page heading -->
<div class="container p-t-4 p-b-40">
    <h2 class="f1-l-1 cl2">
        Contact Us
    </h2>
</div>

<!-- Content -->
<section class="bg0 p-b-60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-8 p-b-80">

                <div id="success_message"></div>
                <div id="error_message"></div>

                <div class="p-r-10 p-r-0-sr991">
                    <form method="post" id="contact">
                        @csrf
                        <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="name" placeholder="Name*">

                        <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="email" placeholder="Email*">

                        <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" name="website" placeholder="Website">

                        <textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="message" placeholder="Your Message"></textarea>

                        <button type="submit" class="size-a-20 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20">
                            Send
                        </button>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-5 col-lg-4 p-b-80">
                <div class="p-l-10 p-rl-0-sr991">
                    <!-- Popular Posts -->
                    <div>
                        <div class="how2 how2-cl4 flex-s-c">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Popular Post
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @foreach ($footer_popular as $fp)
                            <li class="flex-wr-sb-s p-b-30">
                                <a href="#" class="size-w-10 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/admin/uploads/News_small/'.$fp->image) }}" alt="IMG">
                                </a>

                                <div class="size-w-11">
                                    <h6 class="p-b-4">
                                        <a href="blog-detail-02.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            {{ $fp->title }}
                                        </a>
                                    </h6>

                                    <span class="cl8 txt-center p-b-24">
											<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
												{{ $fp->category->category_name }}
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												{{ \App\Helpers\Helper::date_convert($fp->date) }}
											</span>
										</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
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

    $(document).ready(function () {
        $("#comments").on("submit",function (e) {
            e.preventDefault();

            var formData = $("#comments").serializeArray();

            $.ajax({
                url : "{{ route('comment') }}",
                type: "post",
                data: $.param(formData),
                dataType: "json",
                success: function (data) {
                    if(data.flash_message_success) {
                        $('#success_message').html('<div class="alert alert-success">\n' +
                            '<button class="close" data-dismiss="alert">×</button>\n' +
                            '<strong>Success! '+data.flash_message_success+'</strong> ' +
                            '</div>');
                    }else {

                        $('#error_message').html('<div class="alert alert-error">\n' +
                            '<button class="close" data-dismiss="alert">×</button>\n' +
                            '<strong>Error! '+data.error+'</strong>' +
                            '</div>');
                    }

                    $("form").trigger("reset");
                }
            });
        });

        $("#contact").on("submit",function (e) {
            e.preventDefault();

            var formData = $("#contact").serializeArray();

            $.ajax({
                url : "{{ route('contact.message_store') }}",
                type: "post",
                data: $.param(formData),
                dataType: "json",
                success: function (data) {
                    if(data.flash_message_success) {
                        $('#success_message').html('<div class="alert alert-success">\n' +
                            '<button class="close" data-dismiss="alert">×</button>\n' +
                            '<strong>Success! '+data.flash_message_success+'</strong> ' +
                            '</div>');
                    }else {

                        $('#error_message').html('<div class="alert alert-error">\n' +
                            '<button class="close" data-dismiss="alert">×</button>\n' +
                            '<strong>Error! '+data.error+'</strong>' +
                            '</div>');
                    }

                    $("form").trigger("reset");
                }
            });
        });
    })
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