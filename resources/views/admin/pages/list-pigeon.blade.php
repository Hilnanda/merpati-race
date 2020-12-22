@extends('admin.layouts.admin')
@section('title')
    Dashboard Panitia
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pigeon
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
              <h3 class="box-title">Data Pigeon</h3><br>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <th>No.</th>
                  <th>UID Pigeon</th>
                  {{-- <th>Lat Club</th>
                  <th>Long Club</th> --}}
                  <th>Ring Size Pigeon</th>
                  <th>Name Pigeon</th>
                  <th>User</th>
                  <th>Sex Pigeon</th>
                  <th>Color Pigeon</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                @foreach($pigeons as $pigeon)
                
                  <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$pigeon->uid_pigeon}}</td>
                    {{-- <td>{{$pigeon->lat_pigeon}}</td>
                    <td>{{$pigeon->lng_pigeon}}</td> --}}
                    <td>{{$pigeon->ring_size_pigeon}}</td>
                    <td>{{$pigeon->name_pigeon}}</td>
                    <td>{{ (isset($pigeon->users->username)) ? $pigeon->users->username : ' ' }}</td>
                    <td>{{$pigeon->sex_pigeon}}</td>
                    <td>{{$pigeon->color_pigeon}}</td>
                    <td>
                        @if ($pigeon->name_pigeon=='')
                        <a href="#addModal{{$pigeon->id}}" class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#addModal{{$pigeon->id}}"><span class="font-weight-bold ml-1">Input Pigeon</span></a> 
                            
                        @else
                        <a href="#editModal{{$pigeon->id}}" class="btn btn-warning btn-sm" data-toggle="modal"
                            data-target="#editModal{{$pigeon->id}}"><span class="font-weight-bold ml-1">Edit</span></a> 
                        <a href="/admin/pigeon/delete/{{$pigeon->id}}" class="btn btn-danger btn-sm delete-club"><span
                                        class="font-weight-bold ml-1">Hapus</span></a>
                        @endif
                        </td>
                        <div class="modal fade" id="addModal{{$pigeon->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Lengkapi Data Pigeon</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/pigeon/edit" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="">UID Pigeon</label>
                                                <input type="hidden" name="id" value="{{$pigeon->id}}">
                                                <input type="text" name="uid_pigeon" class="form-control" placeholder="Isi Nama club" disabled value="{{$pigeon->uid_pigeon}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama Pigeon</label>
                                                <input type="text" name="name_pigeon" class="form-control" placeholder="Isi Nama Pigeon" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nomor Ring Pigeon</label>
                                                <input type="number" name="ring_size_pigeon" class="form-control" placeholder="Isi Nomor Ring Pigeon" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin Pigeon</label>
                                                <input type="text" name="sex_pigeon" class="form-control" placeholder="Jenis Kelamin Pigeon" required >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Warna Pigeon</label>
                                                <input type="text" name="color_pigeon" class="form-control" placeholder="Warna Pigeon" required >
                                            </div>
    
                                            <div class="form-group">
                                                <label for="">Pemilik Pigeon</label>
                                                <select name="id_user" class="form-control" required>
                                                  <option value="">-- Pilih User --</option>
                                                  @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->username}}</option>
                                                  @endforeach
                                                </select>
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
                    <div class="modal fade" id="editModal{{$pigeon->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pigeon</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/pigeon/edit" method="POST">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="">UID Pigeon</label>
                                                    <input type="hidden" name="id" value="{{$pigeon->id}}">
                                                    <input type="text" name="uid_pigeon" class="form-control" placeholder="Isi Nama club" disabled value="{{$pigeon->uid_pigeon}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nama Pigeon</label>
                                                    <input type="text" name="name_pigeon" class="form-control" placeholder="Isi Nama Pigeon" required value="{{$pigeon->name_pigeon}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nomor Ring Pigeon</label>
                                                    <input type="number" name="ring_size_pigeon" class="form-control" placeholder="Isi Nomor Ring Pigeon" required value="{{$pigeon->ring_size_pigeon}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Jenis Kelamin Pigeon</label>
                                                    <input type="text" name="sex_pigeon" class="form-control" placeholder="Jenis Kelamin Pigeon" required value="{{$pigeon->sex_pigeon}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Warna Pigeon</label>
                                                    <input type="text" name="color_pigeon" class="form-control" placeholder="Warna Pigeon" required value="{{$pigeon->color_pigeon}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Pemilik Pigeon</label>
                                                    <select name="id_user" class="form-control" required>
                                                      <option value="">-- Pilih User --</option>
                                                      @foreach($users as $user)
                                                        <option value="{{$user->id}}" @if($pigeon->id_user==$user->id) selected @endif>{{$user->username}}</option>
                                                      @endforeach
                                                    </select>
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
<script>
    $(function () {
      $('#example1').DataTable()
      $('#example3').DataTable()
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