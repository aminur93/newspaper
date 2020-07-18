@extends('layouts.frontend.master')

@section('page')
Home
@stop

@push('css')
    @endpush

@section('content')
    <div class="p-b-20">
        @foreach($category as $cat)
        <div class="tab01 p-b-20">
            <div class="tab01-head how2 how2-cl1 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                <!-- Brand tab -->
                <h3 class="f1-m-2 cl12 tab01-title">
                    {{ $cat->category_name }}
                </h3>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#{{ $cat->category_name }}" role="tab">All</a>
                    </li>

                    @foreach($sub_category as $sub_cat)

                        @if ($cat->id == $sub_cat->category_id)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#{{ $sub_cat->sub_category_name }}-{{ $sub_cat->id }}" role="tab">{{ $sub_cat->sub_category_name }}</a>
                            </li>
                        @endif

                    @endforeach

                    <li class="nav-item-more dropdown dis-none">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-ellipsis-h"></i>
                        </a>

                        <ul class="dropdown-menu">

                        </ul>
                    </li>
                </ul>

                <!--  -->
                <a href="{{ route('category_post',$cat->id) }}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                    View all
                    <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                </a>
            </div>


            <!-- Tab panes -->
            <div class="tab-content p-t-35">
                <!-- - -->
                <div class="tab-pane fade show active" id="{{ $cat->category_name }}" role="tabpanel">


                    <div class="row">
                        @foreach($news_show as $sn)
                        @if ($cat->id == $sn->category_id)
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">

                            <div class="flex-wr-sb-s m-b-30">
                                <a href="" class="size-w-1 wrap-pic-w hov1 trans-03">
                                    <img src="{{ asset('assets/admin/uploads/News_small/'.$sn->image) }}" alt="IMG">
                                </a>

                                <div class="size-w-2">
                                    <h5 class="p-b-5">
                                        <a href="{{ route('details',$sn->id) }}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                            {{ $sn->title }}
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
                                            {!! \App\Helpers\Helper::date_convert($sn->date) !!}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">

                        </div>
                    </div>

                </div>

                <!-- - -->
                @foreach($sub_category as $sub_cat)

                    @if ($cat->id == $sub_cat->category_id)
                        <div class="tab-pane fade" id="{{ $sub_cat->sub_category_name }}-{{ $sub_cat->id }}" role="tabpanel">
                            <div class="row">
                                @forelse($main_news as $mn)
                                    @if ($sub_cat->id == $mn->sub_cat_id)
                                <div class="col-sm-6 p-r-25 p-r-15-sr991">


                                    <!-- Item post -->
                                    <div class="flex-wr-sb-s m-b-30">
                                        <a href="" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{ asset('assets/admin/uploads/News_small/'.$mn->image) }}" alt="IMG">
                                        </a>

                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {{ $mn->title }}
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                                <a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
                                                    {{ $mn->subCategory->sub_category_name }}
                                                </a>

                                                <span class="f1-s-3 m-rl-3">
                                                    -
                                                </span>

                                                <span class="f1-s-3">
                                                    {!! \App\Helpers\Helper::date_convert($mn->date) !!}
                                                </span>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                    @endif
                                    @endforeach

                                <div class="col-sm-6 p-r-25 p-r-15-sr991">

                                </div>
                            </div>
                        </div>
                    @endif

                @endforeach

            </div>
        </div>
        @endforeach
    </div>
@stop

@push('js')
    @endpush