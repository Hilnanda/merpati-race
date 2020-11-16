@extends('subscribed.layout.subscribed')

@section('title')
    Detail Club
@endsection

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
        <div class="bradcumbContent">
            <h2>Detail Loft</h2>
        </div>
    </div>
    <!-- bg gradients -->
    <div class="bg-gradients"></div>
    <!-- ##### Breadcumb Area End ##### -->

    <div class="row mt-5 px-5">
        <div class="col-lg-12">
            <!-- /.box-header -->
            {{-- <h4>Detail Club Saya</h4> --}}
            <div class="box-body">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-12">


                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-12">
                        @if (Auth::user()->id==$clubs->manager_club)
                        <button class="btn musica-btn mb-3" data-toggle="modal" data-target="#tambah_burung">Daftarkan
                            Burung</button>
                            @endif
                        <div class="modal fade" id="tambah_burung" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Daftar Burung Baru</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/pigeons/create" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id_user" value="{{ $get_loft->user->id }}">
                                            <input type="hidden" name="id_club" value="{{ $get_loft->id_club }}">
                                            <div class="form-group">
                                                <label for="">UID Burung</label>
                                                <input type="text" name="uid_pigeon" class="form-control"
                                                    placeholder="Isi uid burung" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Ukuran Cincin</label>
                                                <input type="number" name="ring_size_pigeon" class="form-control"
                                                    placeholder="Isi ukuran cincin" required step=0.01>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama Burung</label>
                                                <input type="text" name="name_pigeon" class="form-control"
                                                    placeholder="Isi nama burung" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Jenis Kelamin</label>
                                                <select name="sex_pigeon" class="form-control">
                                                    <option value="Jantan">Jantan</option>
                                                    <option value="Betina">Betina</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Warna</label>
                                                <input type="text" name="color_pigeon" class="form-control"
                                                    placeholder="Isi warna burung" required>
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
                        <div class="row">

                            <div class="col-6">
                                <h4>Loft Details</h4>
                                <p>Nama Loft : <b style="color: red">{{ $get_loft->user->name_loft }}</b></p>
                                <p>Nama Club : <b style="color: red">{{ $get_loft->club->name_club }}</b></p>
                                <p>Nama Pemilik : <b style="color: red">{{ $get_loft->user->name }}
                                        ({{ $get_loft->user->username }})</b></p>
                                <p>Posisi Loft : <b style="color: red">{{ $get_loft->user->lat_loft }} ,
                                        {{ $get_loft->user->lng_loft }}</b></p>
                                <p>Jumlah Pigeon : <b style="color: red">{{ $count_pigeon }}</b></p>
                                {{-- <p>Manager club : <b
                                        style="color: red">{{ $clubs->manager->name }} ({{ $clubs->manager->username }})</b>
                                </p> --}}


                            </div>

                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-12">
                        {{-- bagian statistik --}}
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-12">
                        {{-- bagian list burung --}}
                        <h4>List Pigeons</h4>
                        <div class="box-body">
                            <table id="table_two" class="table table-bordered table-striped">
                                <thead>
                                    <th>No.</th>
                                    <th>ID Pigeon</th>
                                    <th>Nama Pigeon</th>
                                    <th>Ring Size Pigeon</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Warna</th>
                                    <th>Tanggal Join</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    {{-- @if (count($list_pigeons) == 0)
                                        <tr class="text-center">
                                            <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                                        </tr>
                                    @endif --}}
                                    @foreach ($list_pigeon as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->uid_pigeon }}</td>
                                            <td>{{ $item->name_pigeon }}</td>
                                            <td>{{ $item->ring_size_pigeon }}</td>
                                            <td>{{ $item->sex_pigeon }}</td>
                                            <td>{{ $item->color_pigeon }}</td>
                                            <td>{{ date('d F Y  H:i:s', strtotime($item->updated_at)) }}</td>
                                            <td class="action-link">

                                                <a href="#" title="Details" class="mx-1"><i class="fa fa-list-alt"
                                                        aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
        </div>
    </div>

@endsection
@push('bottom-script')
    <script src="{{ url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $('#example1').DataTable({
                'scrollX': true,
            })
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false,
                'scrollX': true,
            })
        })

    </script>

    <script>
        function setMaxDueDateAdd() {
            var release_time = document.getElementById("release_time_event_add").value;
            document.getElementById("due_join_date_event_add").max = release_time;
        }

    </script>
@endpush
