<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="topbar">
            <div class="content-topbar container h-100">
                <div class="left-topbar">
						<span class="left-topbar-item flex-wr-s-c">
							<span>
								New York, NY
							</span>

							<img class="m-b-1 m-rl-8" src="{{ asset('assets/frontend/images/icons/icon-night.png') }}" alt="IMG">

							<span>
								HI 58° LO 56°
							</span>
						</span>

                    <a href="#" class="left-topbar-item">
                        About
                    </a>

                    <a href="#" class="left-topbar-item">
                        Contact
                    </a>

                    <a href="#" class="left-topbar-item">
                        Sing up
                    </a>

                    <a href="{{ route('login') }}" class="left-topbar-item">
                        Log in
                    </a>
                </div>

                <div class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-pinterest-p"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-vimeo-v"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-youtube"></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.html"><img src="{{ asset('assets/frontend/images/icons/logo-01.png') }}" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li class="left-topbar">
						<span class="left-topbar-item flex-wr-s-c">
							<span>
								New York, NY
							</span>

							<img class="m-b-1 m-rl-8" src="{{ asset('assets/frontend/images/icons/icon-night.png') }}" alt="IMG">

							<span>
								HI 58° LO 56°
							</span>
						</span>
                </li>

                <li class="left-topbar">
                    <a href="#" class="left-topbar-item">
                        About
                    </a>

                    <a href="#" class="left-topbar-item">
                        Contact
                    </a>

                    <a href="#" class="left-topbar-item">
                        Sing up
                    </a>

                    <a href="{{ route('login') }}" class="left-topbar-item">
                        Log in
                    </a>
                </li>

                <li class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-pinterest-p"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-vimeo-v"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-youtube"></span>
                    </a>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="{{ url('/') }}">Home</a>
                </li>

                <li>
                    <a href="">News</a>
                </li>

                <li>
                    <a href="">Entertainment </a>
                </li>

            </ul>
        </div>

        <!--  -->
        <div class="wrap-logo container">
            <!-- Logo desktop -->
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('assets/frontend/images/icons/logo-01.png') }}" alt="LOGO"></a>
            </div>

            <!-- Banner -->
            <div class="banner-header">
                <a href="#"><img src="{{ asset('assets/frontend/images/banner-01.jpg') }}" alt="IMG"></a>
            </div>
        </div>

        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">
                    <a class="logo-stick" href="{{ url('/') }}">
                        <img src="{{ asset('assets/frontend/images/icons/logo-01.png') }}" alt="LOGO">
                    </a>

                    <ul class="main-menu">
                        <li class="main-menu-active">
                            <a href="{{ url('/') }}">Home</a>
                        </li>

                        <li class="mega-menu-item">
                            <a href="">News</a>

                            <div class="sub-mega-menu">
                                <div class="nav flex-column nav-pills" role="tablist">
                                    <a class="nav-link active" data-toggle="pill" href="#news-0" role="tab">All</a>
                                    @foreach($category as $value)
                                    <a class="nav-link" data-toggle="pill" href="#{{ $value->category_name }}" role="tab">{{ $value->category_name }}</a>
                                        @endforeach
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane show active" id="news-0" role="tabpanel">
                                        <div class="row">
                                            @forelse($all_news as $an)
                                            <div class="col-3">
                                                <!-- Item post -->
                                                <div>
                                                    <a href="" class="wrap-pic-w hov1 trans-03">
                                                        <img src="{{ asset('assets/admin/uploads/News_small/'.$an->image) }}" alt="IMG">
                                                    </a>

                                                    <div class="p-t-10">
                                                        <h5 class="p-b-5">
                                                            <a href="" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                {{ $an->title }}
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
																<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
																	{{ $an->category->category_name }}
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
                                                                    {!! \App\Helpers\Helper::date_convert($an->date) !!}
																</span>
															</span>
                                                    </div>
                                                </div>
                                            </div>
                                                @endforeach
                                        </div>
                                    </div>

                                    @foreach($category as $cat)

                                    <div class="tab-pane" id="{{ $cat->category_name }}" role="tabpanel">
                                        <div class="row">
                                            @foreach($news as $ns)
                                                @if($cat->id == $ns->category_id)
                                                    <div class="col-3">
                                                        <!-- Item post -->
                                                        <div>
                                                            <a href="" class="wrap-pic-w hov1 trans-03">
                                                                <img src="{{ asset('assets/admin/uploads/News_small/'.$ns->image) }}" alt="IMG">
                                                            </a>

                                                            <div class="p-t-10">
                                                                <h5 class="p-b-5">
                                                                    <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                        {{ $ns->title }}
                                                                    </a>
                                                                </h5>

                                                                <span class="cl8">
                                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                           {{ $cat->category_name }}
                                                                        </a>

                                                                        <span class="f1-s-3 m-rl-3">
                                                                            -
                                                                        </span>

                                                                        <span class="f1-s-3">
                                                                            {!! \App\Helpers\Helper::date_convert($ns->date) !!}
                                                                        </span>
                                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                        @endforeach
                                </div>
                            </div>
                        </li>


                        @forelse($category as $cat)
                        <li class="mega-menu-item">
                            <a href="">{{ $cat->category_name }} </a>

                            <div class="sub-mega-menu">
                                <div class="nav flex-column nav-pills" role="tablist">

                                    @forelse($sub_category as $sc)
                                        @if ($sc->category_id == $cat->id)
                                            <a class="nav-link" data-toggle="pill" href="#{{ $sc->sub_category_name }}" role="tab">{{ $sc->sub_category_name }}</a>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="tab-content">

                                    @forelse($sub_category as $sc)
                                        @if ($sc->category_id == $cat->id)
                                            <div class="tab-pane" id="{{ $sc->sub_category_name }}" role="tabpanel">
                                                <div class="row">
                                                    @forelse($all_news as $anews)
                                                        @if ($sc->id == $anews->sub_cat_id)
                                                            <div class="col-3">
                                                                <!-- Item post -->
                                                                <div>
                                                                    <a href="" class="wrap-pic-w hov1 trans-03">
                                                                        <img src="{{ asset('assets/admin/uploads/News_small/'.$anews->image) }}" alt="IMG">
                                                                    </a>

                                                                    <div class="p-t-10">
                                                                        <h5 class="p-b-5">
                                                                            <a href="" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                                {{ $anews->title }}
                                                                            </a>
                                                                        </h5>

                                                                        <span class="cl8">
                                                                        <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                                            {{ $anews->subCategory->sub_category_name }}
                                                                        </a>

                                                                        <span class="f1-s-3 m-rl-3">
                                                                            -
                                                                        </span>

                                                                        <span class="f1-s-3">

                                                                            {!! \App\Helpers\Helper::date_convert($anews->date) !!}
                                                                        </span>
                                                                    </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </li>
                            @endforeach

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>