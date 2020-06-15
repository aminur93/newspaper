@extends('layouts.admin.master')

@section('page')
News View
@endsection

@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div id="success_message"></div>

            <div id="error_message"></div>

            <div class="card card-default">
                <div class="card-header">@yield('page')</div>

                <div class="card-body" id="edit_form_body">
                    <form action="" method="post" id="news_edit" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="news_id" id="news_id" value="{{ $news->id }}">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="types" class="control-label">Types</label>
                                    <select name="types_id" id="types_id" class="form-control" readonly="">
                                        <option value="">Select Types</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}" @if ($news->types_id == $type->id)
                                            selected
                                                    @endif>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="division" class="control-label">Division</label>
                                    <select name="division_id" id="division_id" class="form-control" readonly>
                                        <option value="">Select Division</option>
                                        @foreach($divisions as $division)
                                            <option value="{{ $division->id }}" @if ($news->division_id == $division->id)
                                            selected
                                                    @endif>{{ $division->division_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="upzilla" class="control-label">UpZilla</label>
                                    <select name="upzilla_id" id="upzilla_id" class="form-control" readonly>
                                        <option value="">Select Upzilla</option>
                                        @foreach($upzilla as $upz)
                                            <option value="{{ $upz->id }}" @if ($news->upzilla_id == $upz->id)
                                            selected
                                                    @endif>{{ $upz->upzilla_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="Sub-category" class="control-label">Sub Category</label>
                                    <select name="sub_cat_id" id="sub_cat_id" class="form-control" readonly>
                                        <option value="">Select Sub category</option>
                                        @foreach($sub_categories as $sub_cat)
                                            <option value="{{ $sub_cat->id }}" @if ($news->sub_cat_id == $sub_cat->id)
                                            selected
                                                    @endif>{{ $sub_cat->sub_category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="head line" class="control-label">Head Line</label>
                                    <input readonly type="text" value="{{ $news->headline }}" name="headline" id="headline" class="form-control" placeholder="Head Line">
                                </div>

                                <div class="form-group">
                                    <label for="author" class="control-label">Author</label>
                                    <input readonly type="text" readonly value="{{ Auth::user()->name }}" name="author" id="author" class="form-control" placeholder="News Author">
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="Country" class="control-label">Country</label>
                                    <select name="country_id" id="country_id" class="form-control" readonly>
                                        <option value="">Select Country</option>
                                        @foreach($country as $coun)
                                            <option value="{{ $coun->id }}" @if ($news->country_id == $coun->id)
                                            selected
                                                    @endif>{{ $coun->country_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="zilla" class="control-label">Zilla</label>
                                    <select name="zilla_id" id="zilla_id" class="form-control" readonly>
                                        <option value="">Select Zilla</option>
                                        @foreach($zilla as $zi)
                                            <option value="{{ $zi->id }}" @if ($news->zilla_id == $zi->id)
                                            selected
                                                    @endif>{{ $zi->zilla_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="category" class="control-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-control" readonly>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" @if ($news->category_id == $category->id)
                                            selected
                                                    @endif>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tag" class="control-label">Tag</label>
                                    <select name="tag_id" id="tag_id" class="form-control" readonly>
                                        <option value="">Select Tag</option>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" @if ($news->tag_id == $tag->id)
                                            selected
                                                    @endif>{{ $tag->tah_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title" class="control-label">News Title</label>
                                    <input readonly type="text" value="{{ $news->title }}" name="title" id="title" class="form-control" placeholder="News Title">
                                </div>

                                <div class="form-group">
                                    <label for="date" class="control-label">News Date</label>
                                    <input readonly type="date" value="{{ $news->date }}" name="date" id="date" class="form-control" placeholder="News Date">
                                </div>

                            </div>

                            <div class="form-group col-md-12">
                                <label for="Description" class="control-label">News Description</label>
                                <textarea readonly name="description" id="description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $news->description }}</textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="image" class="control-label">News Image</label>
                                @if (!empty($news->image))
                                    <div>
                                        <img src="{{ asset('assets/admin/uploads/news_small/'.$news->image) }}" alt="">
                                    </div>

                                @endif



                            </div>

                            <div class="form-group col-md-4">
                                <label for="status">Status</label>
                                <input readonly type="checkbox" name="status" id="status" @if ($news->status == 1)
                                checked
                                        @endif>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="publish">News Publish</label>
                                <input readonly type="checkbox" name="publish" id="publish"  @if ($news->publish == 1)
                                checked
                                        @endif>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="feature">News Feature</label>
                                <input readonly type="checkbox" name="feature" id="feature"  @if ($news->feature == 1)
                                checked
                                        @endif>
                            </div>

                        </div>


                        <div class="form-group">
                            <a href="{{ route('news') }}" class="btn btn-warning">Back</a>
                            <a href="{{ route('news.edit',$news->id) }}" class="btn btn-info">Go Edit</a>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
@endpush