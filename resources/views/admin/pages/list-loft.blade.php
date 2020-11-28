@extends('admin.layouts.admin')
@section('title')
Dashboard Panitia - Loft
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Club
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
                        <a href="#tambah_loft" class="btn btn-info" data-toggle="modal" data-target="#tambah_loft">Tambah Loft</a>
                        <div class="modal fade" id="tambah_loft" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Loft</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form action="/admin/loft/create" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="id_user">Pemilik Loft</label>
                                            <select class="form-control" name="id_user">
                                                <option value="" disabled selected>-- Pilih pemilik --</option>
                                                @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ '[' . $user->username . '] ' . $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name_loft">Nama Loft</label>
                                            <input type="text" name="name_loft" class="form-control" placeholder="Isi nama loft" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="logo_loft">Logo Loft</label>
                                            <input type="file" name="logo_loft" class="form-control" placeholder="Isi logo loft" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Negara Loft</label>
                                            <select name="country_loft" class="form-control" required>
                                                <option value="">-- Pilih Negara --</option>
                                                @foreach($countries as $country)
                                                <option value="{{$country->name }}">{{$country->name}} ({{ $country->alpha2Code }}) </option>
                                                @endforeach
                                            </select>
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
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <th>No.</th>
                            <th>Pemilik</th>
                            <th>Nama</th>
                            <th>Logo</th>
                            <th>Negara</th>
                            <th>Dibuat pada</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($lofts as $loft)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $loft->user->name }}</td>
                                <td>{{ $loft->name_loft }}</td>
                                <td><img style="max-height: 80px; height: auto; width: auto;" src="{{ asset('image/'.$loft->logo_loft.'') }}"></td>
                                <td>{{ $loft->country_loft ? $loft->country_loft : '-' }}</td>
                                <td>{{ $loft->created_at }}</td>
                                <td><a href="#editModal{{$loft->id}}" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#editModal{{$loft->id}}"><span class="font-weight-bold ml-1">Edit</span></a> 
                                    <a href="#" class="btn btn-danger btn-sm delete-loft" data-toggle="modal" data-target="#deleteModal{{$loft->id}}"><span class="font-weight-bold ml-1">Hapus</span></a>
                                </td>

                                <!-- Create Modal -->
                                <div class="modal fade" id="editModal{{$loft->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Loft</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form action="/admin/loft/update/{{$loft->id}}" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="id_user">Pemilik Loft</label>
                                                        <select class="form-control" name="id_user">
                                                            <option value="" disabled selected>-- Pilih pemilik --</option>
                                                            @foreach($users as $user)
                                                            <option value="{{ $user->id }}" {{ $user->id == $loft->id_user ? 'selected' : '' }}>{{ '[' . $user->username . '] ' . $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name_loft">Nama Loft</label>
                                                        <input type="text" name="name_loft" class="form-control" placeholder="Isi nama loft" required value="{{ $loft->name_loft }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="logo_loft">Logo Loft</label>
                                                        <input type="file" name="logo_loft" class="form-control" placeholder="Isi logo loft" value="{{ $loft->logo_loft }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Negara Loft</label>
                                                        <select name="country_loft" class="form-control" required>
                                                            <option value="">-- Pilih Negara --</option>
                                                            @foreach($countries as $country)
                                                            <option value="{{$country->name }}" {{ $loft->country_loft == $country->name ? 'selected' : '' }}>{{$country->name}} ({{ $country->alpha2Code }}) </option>
                                                            @endforeach
                                                        </select>
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
                                <!-- End Create Modal -->

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{$loft->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data Loft</h4>
                                            </div>
                                            <div class="modal-body">
                                                {{ csrf_field() }}
                                                Apakah anda yakin ingin menghapus {{ $loft->name_loft }}?
                                            </div>
                                            <div class="modal-footer">
                                                <div class="form-group d-flex justify-content-end">
                                                    <a href="/admin/loft/delete/{{$loft->id}}" class="btn btn-primary">Hapus</a>
                                                    <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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