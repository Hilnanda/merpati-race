@extends('admin.layouts.admin')
@section('title')
    Dashboard Panitia
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Module Content
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
                            <a href="#tambah_jenisstandar" class="btn btn-info" data-toggle="modal"
                                data-target="#tambah_jenisstandar">Tambah Data</a>
                            <div class="modal fade" id="tambah_jenisstandar" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Content</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/cms/content/create" method="POST"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="">Judul Content</label>
                                                    <input type="text" name="title_content" class="form-control"
                                                        placeholder="Isi Title Content" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Gambar Content</label>
                                                    <input type="file" name="image_content" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button"
                                                data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <th>No.</th>
                                    {{-- <th>UID Pigeon</th>
                                      <th>Long Lat</th>
                                      <th>Tanggal</th> --}}
                                      <th>Judul Content</th>
                                      <th>Gambar Content</th>
                                    <th>Tanggal Content</th>

                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($content as $value)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>

                                            <td>{{ $value->title_content }}</td>
                                            <td><a href="{{ asset('image/' . $value->image_content . '') }}"><img
                                                        style="max-width: 250px"
                                                        src="{{ asset('image/' . $value->image_content . '') }}"></a></td>

                                            <td>{{ date('d F Y  H:i:s', strtotime($value->updated_at)) }}</td>
                                            <td><a href="/admin/cms/content/{{$value->id}}" class="btn btn-warning btn-sm"><span class="font-weight-bold ml-1">Edit</span></a> 
                                              <a href="/admin/cms/content/delete/{{$value->id}}" class="btn btn-danger btn-sm delete-club"><span
                                                              class="font-weight-bold ml-1">Hapus</span></a></td>


                                        </tr>
                                    @endforeach
                                </tbody>

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