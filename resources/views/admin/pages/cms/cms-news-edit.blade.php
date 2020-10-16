@extends('admin.layouts.admin')
@section('title')
    Dashboard Panitia
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Berita
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
                            {{-- <h3 class="box-title">Data Table With Full Features</h3><br>
                            --}}
                            
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="/admin/news/edit" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="modal-body">
                               
                                    <div class="form-group">
                                        <label for="">Judul Berita</label>
                                        <input type="hidden" name="id" value="{{ $news->id }}" class="form-control">
                                        <input type="text" name="title_news" class="form-control" value="{{ $news->title_news }}" placeholder="Isi nama club" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar Berita</label>
                                        <input type="file" name="image_news" class="form-control" value="{{ $news->desc_news }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Isi Berita</label>
                                        {{-- <input type="text" name="desc_news" class="form-control" value="" placeholder="Isi nama club" required> --}}
                                        <textarea id="editor1" name="desc_news" rows="10" cols="80">
                                            {!! $news->desc_news !!}
                                        </textarea>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="datetime" name="date_news" class="form-control" value="{{ $item->date_news }}" placeholder="Isi nama club" required>
                                    </div> --}}
                                    
                                    
                                
                            </div>
                            <div class="modal-footer">
                                    <input type="submit" value="Simpan" class="btn btn-success">
                                    <a href="/admin/news" class="btn btn-danger">Cancel</a>

                            </div>
                        </form>
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
    <script src="{{ url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- CK Editor -->
    <script src="{{ url('admin/bower_components/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function() {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })

    </script>

    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })

    </script>

@endpush
