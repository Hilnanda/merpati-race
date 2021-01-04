@extends('admin.layouts.admin')
@section('title')
    Dashboard Panitia
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Data Hardware
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
                            {{-- <h3 class="box-title">Data Table With Full Features</h3><br>
                            --}}
                            <a href="#tambah_jenisstandar" class="btn btn-info" data-toggle="modal"
                                data-target="#tambah_jenisstandar">Tambah Data</a>
                            <div class="modal fade" id="tambah_jenisstandar" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Hardware</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/hardware/create" method="POST">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="">UID Hardware</label>
                                                    <input type="text" name="uid_hardware" class="form-control"
                                                        placeholder="Isi UID Hardware" required>
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
                                    <th>UID Hardware</th>
                                    <th>UID Pigeon</th>
                                    <th>Long Lat</th>
                                    <th>Tanggal</th>
                                    {{-- <th>Pemilik Hardware</th> --}}
                                    {{-- <th>Label Hardware</th> --}}
                                    {{-- <th>Tanggal Kepemilikan</th> --}}
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($hardware as $value)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $value->uid_hardware }}</td>
                                            <td>{{ $value->uid_pigeon }}</td>
                                            <td>{{ $value->longlat_hardware }}</td>
                                            <td>{{ $value->tanggal_hardware }}</td>
                                            {{-- <td>{{ $value->user->name }} ({{ $value->user->username }})</td> --}}
                                            {{-- <td>{{ $value->label_hardware }}</td> --}}
                                            {{-- <td>{{ $value->created_at }}</td> --}}
                                            <td>
                                                    <a href="#editModal{{ $value->id }}" class="btn btn-warning btn-sm"
                                                        data-toggle="modal" data-target="#editModal{{ $value->id }}"><span
                                                            class="font-weight-bold ml-1">Edit</span></a>
                                                    <a href="/admin/hardware/delete/{{ $value->id }}"
                                                        class="btn btn-danger btn-sm delete-club"><span
                                                            class="font-weight-bold ml-1">Hapus</span></a>
                                                
                                            </td>

                                            <div class="modal fade" id="editModal{{ $value->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Hardware
                                                            </h5>
                                                            <button class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/admin/hardware/edit" method="POST">
                                                                {{ csrf_field() }}
                                                                <div class="form-group">
                                                                    <label for="">UID Hardware</label>
                                                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                                                    <input type="text" name="uid_hardware" class="form-control"
                                                                        placeholder="Isi UID Hardware" value="{{ $value->uid_hardware }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">User</label>
                                                                    <select name="id_user" class="form-control" >
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
