@extends('subscribed.layout.subscribed')

@section('title')
    Detail Club
@endsection
@section('content')
 <!-- ##### Breadcumb Area Start ##### -->
 <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url(image/breadcumb-1.jpg);">
    <div class="bradcumbContent">
        <h2>List Club</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Detail Club Belum Di ikuti</h4>
        <div class="box-body">
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    <a href="#tambah_jenisstandar"  data-toggle="modal"
                    data-target="#tambah_jenisstandar"><button type="button" class="btn btn-primary">Join club</button></a>
                    @foreach ($club_ikut as $item)                        
                    <div class="modal fade" id="tambah_jenisstandar" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Join club</h5>
                                <button class="close" type="button" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>                        </div>
                                <div class="modal-body">
                                    <form action="/club/join" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="">Pigeon</label>
                                            <input type="hidden" name="id_club" value="{{ $item->id_user }}">
                                            <select name="id_pigeon" class="form-control" required>
                                                <option value="">-- Pilih Pigeon --</option>
                                                @foreach($pigeon as $pigeons)
                                                {{-- @if ($item->id!=$pigeons->id_club) --}}
                                                <option value="{{$pigeons->id}}">{{$pigeons->uid_pigeon}} - {{$pigeons->name_pigeon}}</option>
                                                {{-- @endif --}}
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
                    @endforeach
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('image/favicon.ico') }}" style="width:220px;height:200px" class="rounded float-left" alt="...">
                            {{-- bagian keterangan  --}}
                            {{-- @foreach ($clubs as $item)
                            <h4>Club Details</h4>
                            <h5>Nama club : <b style="color: red">{{ $item->name_club }}</b></h5>
                            <h5>Alamat club: <b style="color: red">{{ $item->address_club }}</b></h5>
                            @endforeach --}}
                            <h4>Club Details</h4>
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
        <h4>List Burung</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Club</th>
                    <th>Lokasi Mulai</th>
                    <th>Alamat</th>
                    <th>Nama Burung</th>                   
                    <th>Aksi</th>
                </thead>
                <tbody>                   
                    {{-- @if(count($club_ikut) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                    </tr>
                    @endif
                    @foreach($club_ikut as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->name_club }}</td>
                        <td>({{ $item->lat_club }}), ({{ $item->lng_club }})</td>
                        <td>{{ $item->address_club }}</td>
                        <td>{{ $item->name_pigeon }}</td>
                        <td class="action-link">
                            <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <a href="club/{{$item->id}}/detail_ikut" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    {{-- bagian list lomba --}}
                    <h4>List Hasil Lomba</h4>
                    <div class="box-body">
                        <table id="table_two" class="table table-bordered table-striped">
                            <thead>
                                <th>No.</th>
                                <th>Nama Club</th>
                                <th>Lokasi Mulai</th>
                                <th>Alamat</th>
                                <th>Nama Burung</th>                   
                                <th>Aksi</th>
                            </thead>
                            <tbody>                   
                                {{-- @if(count($club_ikut) == 0)
                                <tr class="text-center">
                                    <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                                </tr>
                                @endif
                                @foreach($club_ikut as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item->name_club }}</td>
                                    <td>({{ $item->lat_club }}), ({{ $item->lng_club }})</td>
                                    <td>{{ $item->address_club }}</td>
                                    <td>{{ $item->name_pigeon }}</td>
                                    <td class="action-link">
                                        <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                                        <a href="club/{{$item->id}}/detail_ikut" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach --}}
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