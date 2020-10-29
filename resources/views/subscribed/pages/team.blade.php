@extends('subscribed.layout.subscribed')
@section('title')
    Team
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url(image/breadcumb-1.jpg);">
        <div class="bradcumbContent">
            <h2>Team</h2>
        </div>
    </div>
    <!-- bg gradients -->
    <div class="bg-gradients"></div>
    <!-- ##### Breadcumb Area End ##### -->

    <div class="row mt-5 px-5">
        <div class="col-lg-12">
            <!-- /.box-header -->

            <h4>List Team Saya</h4>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
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
                                    <form action="/team/create" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="">Nama Team</label>
                                            <input type="text" name="name_team" class="form-control"
                                                placeholder="Isi nama team" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Deskripsi Team</label>
                                            <textarea name="desc_team" class="form-control" required=""
                                                placeholder="Isi Deskripsi team"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="id_user" value="{{ $auth }}">
                                            <input type="hidden" name="is_active" value="0">

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
                </div>
            </div>
            <div class="box-body">
                <table id="table_one" class="table table-bordered table-striped">
                    <thead>
                        <th>No.</th>
                        <th>Nama Team</th>
                        <th>Pemilik</th>
                        <th>Tanggal Team</th>

                        {{-- <th>Mulai</th> --}}
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        {{-- @if (count($teamku) == 0)
                            <tr class="text-center">
                                <td colspan="8">-- Tidak ada Team yang Diikuti --</td>
                            </tr>
                        @endif --}}
                        @foreach ($teamku as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name_team }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ date('d F Y  H:i:s', strtotime($item->created_at)) }}</td>
                                <td class="action-link">

                                    <a href="/team/details-teamku/{{ $item->id }}" title="Details" class="mx-1"><i
                                            class="fa fa-list-alt" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="row mt-5 px-5">
        <div class="col-lg-12">
            <!-- /.box-header -->
            <h4>List Team yang Diikuti</h4>
            <div class="box-body">
                <table id="table_two" class="table table-bordered table-striped">
                    <thead>
                        <th>No.</th>
                        <th>Nama Team</th>
                        <th>Nama Club</th>
                        <th>ID</th>
                        <th>Pigeon</th>
                        <th>Tanggal Team</th>

                        {{-- <th>Mulai</th> --}}
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        {{-- @if (count($team_ikut) == 0)
                            <tr class="text-center">
                                <td colspan="8">-- Tidak ada Team yang Diikuti --</td>
                            </tr>
                        @endif --}}
                        @foreach ($team_ikut as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name_team }}</td>
                                <td>{{ $item->name_club }}</td>
                                <td>{{ $item->uid_pigeon }}</td>
                                <td>{{ $item->name_pigeon }}</td>
                                {{-- <td>{{ $item->username }}</td>
                                --}}
                                <td>{{ date('d F Y  H:i:s', strtotime($item->created_at)) }}</td>
                                <td class="action-link">

                                    <a href="/team/details/{{ $item->id_team }}" title="Details" class="mx-1"><i
                                            class="fa fa-list-alt" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="row mt-5 px-5">
        <div class="col-lg-12">
            <!-- /.box-header -->
            <h4>List Team yang Terdaftar</h4>
            <div class="box-body">
                <table id="table_three" class="table table-bordered table-striped">
                    <thead>
                        <th>No.</th>
                        <th>Nama Team</th>
                        <th>User</th>
                        <th>Tanggal Team</th>
                        {{-- <th>Mulai</th> --}}
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        {{-- @if (count($team) == 0)
                            <tr class="text-center">
                                <td colspan="8">-- Tidak ada Team yang Terdaftar --</td>
                            </tr>
                        @endif --}}
                        @foreach ($team as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name_team }}</td>
                                <td>{{ $item->user->username }}</td>
                                <td>{{ date('d F Y  H:i:s', strtotime($item->created_at)) }}</td>
                                <td class="action-link">
                                    <a href="#" title="Details" class="mx-1"><i class="fa fa-list-alt"
                                            aria-hidden="true"></i></a>
                                    {{-- <a href="#" title="Join" class="mx-1"><i class="fa fa-sign-in"
                                            aria-hidden="true"></i></a> --}}
                                    <a href="#tambah_jenisstandar{{ $item->id }}"  data-toggle="modal"
                                        data-target="#tambah_jenisstandar{{ $item->id }}"><i class="fa fa-sign-in"
                                        aria-hidden="true"></i></a>
                                    <div class="modal fade" id="tambah_jenisstandar{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Team</h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/team/join-team" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="">Pigeon</label>
                                                            <input type="hidden" name="id_team" value="{{ $item->id }}">
                                                            <select name="id_pigeon" class="form-control" required>
                                                                <option value="">-- Pilih Pigeon --</option>
                                                                @foreach($pigeon as $pigeons)
                                                                @if ($item->id!=$pigeons->id_team)
                                                                <option value="{{$pigeons->id}}">{{$pigeons->uid_pigeon}} - {{$pigeons->name_pigeon}}</option>
                                                                @endif
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
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
@endsection
