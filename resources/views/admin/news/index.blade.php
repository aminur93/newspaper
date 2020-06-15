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
    <script>

        $(document).ready(function(){

            $('#data-table').DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                pagingType: "full_numbers",
                dom: "<'row'<'col-sm-2'l><'col-sm-4'i><'col-sm-3 text-center'B><'col-sm-3'f>>tp",
                ajax: {
                    url: '{!!  route('news.getData') !!}',
                    type: "GET",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'image', name: 'image'},
                    {data: 'author', name: 'author'},
                    {data: 'date', name: 'date'},
                    {data: 'status', name: 'status'},
                    {data: 'publish', name: 'publish'},
                    {data: 'feature', name: 'feature'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],

                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn-sm btn-info',
                        exportOptions: {
                            columns: ':visible'
                        },
                        header: false
                    },
                    {
                        extend: 'csv',
                        className: 'btn-sm btn-success',
                        exportOptions: {
                            columns: ':visible'
                        },
                        header: false
                    },
                    {
                        extend: 'excel',
                        className: 'btn-sm btn-warning',
                        exportOptions: {
                            columns: ':visible'
                        },
                        header: false
                    },
                    {
                        extend: 'pdf',
                        className: 'btn-sm btn-primary',
                        exportOptions: {
                            columns: ':visible'
                        },
                        header: false
                    },
                    {
                        extend: 'print',
                        autoPrint: true,
                        className: 'btn-sm btn-default',
                        exportOptions: {
                            columns: ':visible'
                        },
                        header: false
                    }
                ]
            });

        });
    </script>

    <script>
        $(document).on('click','.deleteRecord', function(e){
            e.preventDefault();
            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1');
            swal({
                    title: "Are You Sure?",
                    text: "You will not be able to recover this record again",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete It"
                },
                function(){
                    $.ajax({
                        type: "GET",
                        url: deleteFunction+'/'+id,
                        data: {id:id},
                        success: function (data) {

                            $('#data-table').DataTable().ajax.reload();

                            if(data.flash_message_success) {
                                $('#success_message').html('<div class="alert alert-success">\n' +
                                    '<button class="close" data-dismiss="alert">×</button>\n' +
                                    '<strong>Success! '+data.flash_message_success+'</strong> ' +
                                    '</div>');
                            }
                        }
                    });
                });
        });
    </script>

    <script>
        $(document).on("click",".approve",function (e) {
            e.preventDefault();

            var id = $(this).attr('rel2');
            var approveFunction = $(this).attr('rel3');

            $.ajax({
                type: "GET",
                url: approveFunction+'/'+id,
                data: {id:id},
                success: function (data) {
                    $('#data-table').DataTable().ajax.reload();

                    if(data.flash_message_success) {
                        $('#success_message').html('<div class="alert alert-success">\n' +
                            '<button class="close" data-dismiss="alert">×</button>\n' +
                            '<strong>Success! '+data.flash_message_success+'</strong> ' +
                            '</div>');
                    }
                }
            })

        });

        $(document).on("click",".publish",function (e) {
            e.preventDefault();

            var id = $(this).attr('rel4');
            var publishFunction = $(this).attr('rel5');

            $.ajax({
                type: "GET",
                url: publishFunction+'/'+id,
                data: {id:id},
                success: function (data) {
                    $('#data-table').DataTable().ajax.reload();

                    if(data.flash_message_success) {
                        $('#success_message').html('<div class="alert alert-success">\n' +
                            '<button class="close" data-dismiss="alert">×</button>\n' +
                            '<strong>Success! '+data.flash_message_success+'</strong> ' +
                            '</div>');
                    }
                }
            })

        });

        $(document).on("click",".feature",function (e) {
            e.preventDefault();

            var id = $(this).attr('rel6');
            var featureFunction = $(this).attr('rel7');

            $.ajax({
                type: "GET",
                url: featureFunction+'/'+id,
                data: {id:id},
                success: function (data) {
                    $('#data-table').DataTable().ajax.reload();

                    if(data.flash_message_success) {
                        $('#success_message').html('<div class="alert alert-success">\n' +
                            '<button class="close" data-dismiss="alert">×</button>\n' +
                            '<strong>Success! '+data.flash_message_success+'</strong> ' +
                            '</div>');
                    }
                }
            })

        });
    </script>
@endpush