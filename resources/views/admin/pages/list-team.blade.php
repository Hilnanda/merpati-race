@extends('admin.layouts.admin')
@section('title')
    Dashboard Panitia
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Team
                {{-- <small>advanced tables</small> --}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
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
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Team</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/team/create" method="POST">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="">Nama Team</label>
                                                    <input type="text" name="name_team" class="form-control"
                                                        placeholder="Isi nama team" required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="">Deskripsi Team</label>
                                                    <textarea name="desc_team" class="form-control" required=""
                                                        placeholder="Isi nama team"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">User</label>
                                                    <select name="id_user" class="form-control" required>
                                                        <option value="">-- Pilih User --</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->username }}</option>
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
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <th>No.</th>
                                    <th>Nama Team</th>
                                    <th>Deskripsi Team</th>
                                    
                                    <th>User</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($team as $value)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $value->name_team }}</td>
                                            
                                            <td>{{ $value->desc_team }}</td>
                                            <td>{{ $value->user->username }}</td>
                                            <td><a href="#editModal{{ $value->id }}" class="btn btn-warning btn-sm"
                                                    data-toggle="modal" data-target="#editModal{{ $value->id }}"><span
                                                        class="font-weight-bold ml-1">Edit</span></a>
                                                <a href="/admin/team/delete/{{ $value->id }}"
                                                    class="btn btn-danger btn-sm delete-club"><span
                                                        class="font-weight-bold ml-1">Hapus</span></a>
                                            </td>

                                            <div class="modal fade" id="editModal{{ $value->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Team
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/admin/team/edit" method="POST">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <label for="">Nama Team</label>
                                                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                                                    <input type="text" name="name_team" class="form-control"
                                                                        placeholder="Isi Nama Team" required
                                                                        value="{{ $value->name_team }}">
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                    <label for="">Deskripsi Team</label>
                                                                    <textarea name="desc_team" class="form-control"
                                                                        required=""
                                                                        placeholder="Isi Deskripsi Team">{{ $value->desc_team }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">User</label>
                                                                    <select name="id_user" class="form-control" required>
                                                                        <option value="">-- Pilih User --</option>
                                                                        @foreach ($users as $user)
                                                                            <option value="{{ $user->id }}" @if ($value->id_user == $user->id)
                                                                                selected
                                                                        @endif>{{ $user->username }}
                                                                        </option>
                                                                            @endforeach
                                                                            </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                                                </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
        <th>No.</th>
                                    <th>Nama Team</th>
                                    <th>Deskripsi Team</th>
                                    
                                    <th>User</th>
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
