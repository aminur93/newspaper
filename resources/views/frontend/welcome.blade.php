@extends('layouts.frontend.master')

@section('page')
Home
@stop

@push('css')
    @endpush

@section('content')
    <div class="p-b-20">
        <!-- Entertainment -->
        <div class="tab01 p-b-20">
            <div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                <!-- Brand tab -->
                <h3 class="f1-m-2 cl12 tab01-title">
                    Entertainment
                </h3>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab1-1" role="tab">All</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab1-2" role="tab">Celebrity</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab1-3" role="tab">Movies</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab1-4" role="tab">Music</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab1-5" role="tab">Games</a>
                    </li>

                    <li class="nav-item-more dropdown dis-none">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>

                        <ul class="dropdown-menu">

                        </ul>
                    </li>
                </ul>

                <!--  -->
                <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                    View all
                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                </a>
            </div>


            <!-- Tab panes -->
            <div class="tab-content p-t-35">
                <!-- - -->
                <div class="tab-pane fade show active" id="tab1-1" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-05.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            American live music lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
														<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
															Music
														</a>

														<span class="f1-s-3 m-rl-3">
															-
														</span>

														<span class="f1-s-3">
															Feb 18
														</span>
													</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-06.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Music
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-07.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Game
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-08.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Celebrity
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="tab1-2" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-09.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            American live music lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Music
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-08.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Celebrity
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-06.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Music
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-07.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Game
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="tab1-3" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-08.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            American live music lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Music
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-07.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Celebrity
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-06.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Music
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-05.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Game
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="tab1-4" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-06.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            American live music lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Music
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-09.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Celebrity
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-07.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Music
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-08.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Game
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="tab1-5" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-07.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            American live music lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Music
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-08.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Celebrity
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-06.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Music
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-09.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Game
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Business -->
        <div class="tab01 p-b-20">
            <div class="tab01-head how2 how2-cl2 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                <!-- Brand tab -->
                <h3 class="f1-m-2 cl13 tab01-title">
                    Business
                </h3>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab2-1" role="tab">All</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab2-2" role="tab">Finance</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab2-3" role="tab">Money & Markets</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab2-4" role="tab">Small Business</a>
                    </li>

                    <li class="nav-item-more dropdown dis-none">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>

                        <ul class="dropdown-menu">

                        </ul>
                    </li>
                </ul>

                <!--  -->
                <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                    View all
                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                </a>
            </div>


            <!-- Tab panes -->
            <div class="tab-content p-t-35">
                <!-- - -->
                <div class="tab-pane fade show active" id="tab2-1" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-10.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            Bitcoin lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Finance
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-11.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Small Business
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-12.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Economy
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-13.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Money & Markets
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="tab2-2" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-13.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            Bitcoin lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Finance
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-12.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Small Business
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-11.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Economy
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-10.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Money & Markets
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="tab2-3" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-11.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            Bitcoin lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Finance
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-12.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Small Business
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-13.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Economy
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-10.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Money & Markets
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="tab2-4" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-12.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            Bitcoin lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Finance
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-13.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Small Business
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-10.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Economy
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-11.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Money & Markets
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Travel -->
        <div class="tab01 p-b-20">
            <div class="tab01-head how2 how2-cl3 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                <!-- Brand tab -->
                <h3 class="f1-m-2 cl14 tab01-title">
                    Travel
                </h3>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab3-1" role="tab">All</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab3-2" role="tab">Hotels</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab3-3" role="tab">Flight</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab3-4" role="tab">Beachs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab3-5" role="tab">Culture</a>
                    </li>

                    <li class="nav-item-more dropdown dis-none">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>

                        <ul class="dropdown-menu">

                        </ul>
                    </li>
                </ul>

                <!--  -->
                <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                    View all
                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                </a>
            </div>


            <!-- Tab panes -->
            <div class="tab-content p-t-35">
                <!-- - -->
                <div class="tab-pane fade show active" id="tab3-1" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-14.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            You wish lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Hotels
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-15.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Beachs
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-16.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Flight
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-17.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Culture
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="tab3-2" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-15.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            You wish lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Hotels
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-16.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Beachs
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-17.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Flight
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-18.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Culture
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="tab3-3" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-16.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            You wish lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Hotels
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-17.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Beachs
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-18.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Flight
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-14.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Culture
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="tab3-4" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-17.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            You wish lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Hotels
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-18.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Beachs
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-14.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Flight
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-15.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Culture
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- - -->
                <div class="tab-pane fade" id="tab3-5" role="tabpanel">
                    <div class="row">
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="m-b-30">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-18.jpg') }}" alt="IMG">
                                </a>

                                <div class="p-t-20">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            You wish lorem ipsum dolor sit amet consectetur
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                                            Hotels
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 18
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-17.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Beachs
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 17
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-16.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Flight
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 16
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <!-- Item post -->
                            <div class="flex-wr-sb-s m-b-30">
                                <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/frontend/images/post-15.jpg') }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            Donec metus orci, malesuada et lectus vitae
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                            Culture
                                        </a>

                                        <span class="f1-s-3 m-rl-3">
                                            -
                                        </span>

                                        <span class="f1-s-3">
                                            Feb 12
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    @endpush