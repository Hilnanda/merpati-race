@extends('admin.layouts.admin')
@section('title')
Dashboard Panitia
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data User
      {{-- <small>advanced tables</small> --}}
    </h1>
    
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <!-- /.box -->

        <div class="box">
          <div class="box-header">
            {{-- <h3 class="box-title">Data Table With Full Features</h3><br> --}}
            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambah_jenisstandar">Tambah Data</a>
            <div class="modal fade" id="tambah_jenisstandar" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel">Tambah Data Lomba</h4>
                </div>
                <div class="modal-body">
                  <form action="/admin/user/create" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Nama </label>
                        <input type="text" name="name" class="form-control" placeholder="Isi Nama" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Isi Username" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Isi Email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Isi Password" required>
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
              <th>Username</th>
              <th>Email</th>
              <th>Name</th>
              <th>Active</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach($user as $value)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $value->username }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ ($value->is_active==0) ? 'Tidak Aktif':'Aktif' }}</td>
                <td>{{ date('d F Y  H:i:s', strtotime($value->created_at)) }}</td>
                
                <td><a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                  data-target="#editModal{{$value->id}}"><span class="font-weight-bold ml-1">Edit</span></a> 
                  <a href="user/delete/{{ $value->id }}" class="btn btn-danger btn-sm delete-club" 
                  >Hapus</a></td>

                  <!-- Edit Modal -->
                  <div class="modal fade" id="editModal{{$value->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Edit Data User</h4>
                        </div>
                        <form action="/admin/user/edit" method="POST">
                          <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                              
                              <label for="">Nama </label>
                              <input type="hidden" name="id" value="{{ $value->id }}">
                              <input type="text" name="name" class="form-control" placeholder="Isi Nama" value="{{ $value->name }}" >
                          </div>
                          
                          <div class="form-group">
                              <label for="">Username</label>
                              <input type="text" name="username" class="form-control" value="{{ $value->username }}" placeholder="Isi Username" >
                          </div>
                          <div class="form-group">
                              <label for="">Email</label>
                              <input type="email" name="email" class="form-control" value="{{ $value->email }}" placeholder="Isi Email" >
                          </div>
                          <div class="form-group">
                              <label for="">Password</label>
                              <input type="password" name="password" class="form-control" value="{{ $value->password }}" placeholder="Isi Password" >
                          </div>
                          </div>
                          <div class="modal-footer">
                            <div class="form-group d-flex justify-content-end">
                              <input type="submit" value="Simpan" class="btn btn-primary">
                              <button class="btn btn-secondary" type="button"
                              data-dismiss="modal">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- End Edit Modal -->

                  <!-- Delete Modal -->
                  {{-- <div class="modal fade" id="deleteModal{{$event->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data Lomba</h4>
                        </div>
                        <form action="/admin/event/delete/{{$event->id}}" method="POST">
                          <div class="modal-body">
                            {{ csrf_field() }}
                            Apakah anda yakin ingin menghapus {{ $event->name_event }}
                          </div>
                          <div class="modal-footer">
                            <div class="form-group d-flex justify-content-end">
                              <input type="submit" value="Hapus" class="btn btn-primary">
                              <button class="btn btn-secondary" type="button"
                              data-dismiss="modal">Batal</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div> --}}
                  <!-- End Delete Modal -->
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