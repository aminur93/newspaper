@extends('layouts.admin.master')

@section('page')
News
@endsection

@push('css')
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="success_message"></div>

            <div id="error_message"></div>

            <div class="card">
                <div class="card-header">
                    <a href="{{ route('news.create') }}" class="btn btn-sm btn-primary  float-right"><i class="fas fa-plus"></i> Add News</a>
                    <h3 class="card-title">@yield('page')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="data-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#Sl NO</th>
                            <th>Image</th>
                            <th>HeadLine</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Tag</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Publish</th>
                            <th>Feature</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#Sl NO</th>
                            <th>Image</th>
                            <th>HeadLine</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Tag</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Publish</th>
                            <th>Feature</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush