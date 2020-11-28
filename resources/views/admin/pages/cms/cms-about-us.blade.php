@extends('admin.layouts.admin')
@section('title')
    Dashboard Panitia
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data About Us
                {{-- <small>advanced tables</small> --}}
            </h1>
            {{-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol> --}}
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <!-- /.box -->

                    <div class="box">
                        <div class="box-header">
                            {{-- <h3 class="box-title">About Us</h3><br><br> --}}
                            {{-- <button class="btn btn-success"></button>
                            --}}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    @if (count($about) != 1)
                                        <a id="modal-515165" href="#modal-container-515165" role="button"
                                            class="btn btn-success" data-toggle="modal">+ About Us</a>
                                    @else

                                    @endif
                                    <div class="modal fade" id="modal-container-515165" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel">
                                                        Add About Us
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <form action="/admin/about-us/create" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="modal-body">
                                                        <div class="form-group">

                                                            <div class="row">
                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                    <label for="name" class="control-label">Judul About Us</label>
                                                                    <input type="text" class="form-control" name="title_about" placeholder="Judul About Us">
                                                                    <br>
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                                    <label for="name" class="control-label">Deskripsi About Us</label>
                                                                    <textarea id="editor1" name="desc_about" rows="10"
                                                                        cols="80">
                                                                        </textarea><br>
                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" class="btn btn-primary" value="Simpan">

                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($about as $item)
                                <form action="{{ route('about-us-edit') }}" method="POST">
                                    {{ csrf_field() }}
                                    @if (count($about) == 1)
                                            <div class="col-xs-6 col-sm-6 col-md-6" style="text-align: right">
                                                
                                                <input type="submit" class="btn btn-primary" value="Simpan">
                                                {{-- <a id="" href="" role="button"
                                                    class="btn btn-primary">Simpan</a> --}}
                                                <a id="" href="/admin/about-us/delete/{{ $item->id }}" role="button"
                                                    class="btn btn-danger delete-club">Delete</a>
                                            </div>
                                        
                                        @else

                                    @endif

                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                @if (count($about) == 1)
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="row">
                                                {{-- <a style="margin-left: 5px;color: blue"
                                                    id="footer" href="#footer-container" role="button"
                                                    data-toggle="modal"><i class="fa fa-pencil"></i> Edit</a> |
                                                <a style=";color: red" class="delete-club" href="footer-delete/"><i
                                                        class="fa fa-trash"></i>
                                                    Delete</a> --}}


                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <label for="name" class="control-label">Judul About Us</label>
                                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                                    <input type="text" class="form-control" name="title_about" value="{{ $item->title_about }}">
                                                    <br>
                                                    
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12">
                                                    <label for="name" class="control-label">Deskripsi About Us</label>

                                                    <textarea id="editor4" name="desc_about" rows="10" cols="80">
                                                    {{ $item->desc_about }}
                                                    </textarea><br>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                @else

                                @endif
                                </form>
                                @endforeach


                            </div>



                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('admin-bottom-script')
    <script src="{{ url('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function() {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
        $(function() {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor2')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
        $(function() {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor3')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
        $(function() {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor4')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })

    </script>
@endpush
