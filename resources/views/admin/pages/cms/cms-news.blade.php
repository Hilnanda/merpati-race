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
              {{-- <h3 class="box-title">Data Table With Full Features</h3><br> --}}
              <a href="#tambah_jenisstandar" class="btn btn-info" data-toggle="modal" data-target="#tambah_jenisstandar">Tambah Data</a>
              <div class="modal fade" id="tambah_jenisstandar" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Berita</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="/admin/news/create" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="modal-body">
                           
                                <div class="form-group">
                                    <label for="">Judul Berita</label>
                                    <input type="text" name="title_news" class="form-control" placeholder="Isi nama club" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar Berita</label>
                                    <input type="file" name="image_news" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Isi Berita</label>
                                    {{-- <input type="text" name="desc_news" class="form-control" placeholder="Isi nama club" required> --}}
                                    <textarea id="editor1" name="desc_news" rows="10" cols="80">
                                    </textarea>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="">Alamat Club</label>
                                    <input type="date" name="date_news" class="form-control" placeholder="Isi nama club" required>
                                </div> --}}
                                
                                
                                
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Simpan" class="btn btn-primary">
                            <button class="btn btn-secondary" type="button"
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                    </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <th>No.</th>
                  <th>Judul Berita</th>
                  <th>Gambar Berita</th>
                  <th>Isi Berita</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                @foreach($news as $item)
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$item->title_news}}</td>
                    <td><a href="{{ asset('image/'.$item->image_news.'') }}"><img style="max-width: 250px" src="{{ asset('image/'.$item->image_news.'') }}"></a></td>
                    <td>{!! $item->desc_news !!}</td>
                    <td>{{date('d F Y  H:i:s', strtotime($item->created_at))}}</td>
                    <td><a href="#editModal{{$item->id}}" class="btn btn-warning btn-sm" data-toggle="modal"
                            data-target="#editModal{{$item->id}}"><span class="font-weight-bold ml-1">Edit</span></a> 
                        <a href="/admin/news/delete/{{$item->id}}" class="btn btn-danger btn-sm delete-club"><span
                                        class="font-weight-bold ml-1">Hapus</span></a></td>

                    <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Club</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/news/edit" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                            <div class="modal-body">
                                               
                                                    <div class="form-group">
                                                        <label for="">Judul Berita</label>
                                                        <input type="hidden" name="id" value="{{ $item->id }}" class="form-control">
                                                        <input type="text" name="title_news" class="form-control" value="{{ $item->title_news }}" placeholder="Isi nama club" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Gambar Berita</label>
                                                        <input type="file" name="image_news" class="form-control" value="{{ $item->desc_news }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Isi Berita</label>
                                                        <input type="text" name="desc_news" class="form-control" value="{{ $item->desc_news }}" placeholder="Isi nama club" required>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label for="">Tanggal</label>
                                                        <input type="datetime" name="date_news" class="form-control" value="{{ $item->date_news }}" placeholder="Isi nama club" required>
                                                    </div> --}}
                                                    
                                                    
                                                
                                            </div>
                                            <div class="modal-footer">
                                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <th>No.</th>
                    <th>Judul Berita</th>
                    <th>Gambar Berita</th>
                    <th>Isi Berita</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tfoot>
              </table>
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
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
  </script>
<script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
  
@endpush