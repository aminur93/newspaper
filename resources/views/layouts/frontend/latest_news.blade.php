<!-- Latest -->
<section class="bg0 p-t-60 p-b-35">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 p-b-20">
                <div class="how2 how2-cl4 flex-s-c m-r-10 m-r-0-sr991">
                    <h3 class="f1-m-2 cl3 tab01-title">
                        Latest Articles
                    </h3>
                </div>

                <div class="row p-t-35">
                    @forelse($latest_news as $ln)
                    <div class="col-sm-6 p-r-25 p-r-15-sr991">
                        <!-- Item latest -->
                        <div class="m-b-45">
                            <a href="" class="wrap-pic-w hov1 trans-03">
                                <img src="{{ asset('assets/admin/uploads/news_sub_medium/'.$ln->image) }}" alt="IMG">
                            </a>

                            <div class="p-t-16">
                                <h5 class="p-b-5">
                                    <a href="" class="f1-m-3 cl2 hov-cl10 trans-03">
                                        {{ $ln->headline }}
                                    </a>
                                </h5>

                                <span class="cl8">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
											by {{ $ln->author }}
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
                                            {!! \App\Helpers\Helper::date_convert($ln->date) !!}
										</span>
									</span>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>

            <div class="col-md-10 col-lg-4">
                <div class="p-l-10 p-rl-0-sr991 p-b-20">
                    <!-- Video -->
                    <div class="p-b-55">
                        <div class="how2 how2-cl4 flex-s-c m-b-35">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Featured Video
                            </h3>
                        </div>

                        <div>
                            {{--@foreach($news_videos as $nv)--}}

                            <div class="wrap-pic-w pos-relative">
                                <img src="" alt="IMG">

                                <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03 video"  data-video="" data-toggle="modal" data-target="#videoModal">
                                    <span class="fab fa-youtube"></span>
                                </button>
                            </div>

                            <div class="p-tb-16 p-rl-25 bg3">
                                <h5 class="p-b-5">
                                    <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">
                                        
                                    </a>
                                </h5>

                                <span class="cl15">
										<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
											by 
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											
										</span>
									</span>
                            </div>
                                {{--@endforeach--}}
                        </div>
                    </div>

                    <!-- Subscribe -->
                    <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
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

                    <!-- Tag -->
                    <div class="p-b-55">
                        <div class="how2 how2-cl4 flex-s-c m-b-30">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                Tags
                            </h3>
                        </div>

                        <div class="flex-wr-s-s m-rl--5">
                            @forelse($tags as $tag)
                            <a href="{{ route('tag_post',$tag->id) }}" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
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