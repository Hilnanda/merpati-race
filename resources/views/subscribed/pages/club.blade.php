@extends('subscribed.layout.subscribed')

@section('title')
    Club
@endsection

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
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
        <h4>List Club Saya</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Club</th>
                    <th>Manajer Club</th>
                    <th>Lokasi Mulai</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    {{-- @if(count($clubku) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                    </tr>
                    @endif --}}
                    @foreach($clubku as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->name_club }}</td>
                        <td>{{ $item->manager->name }}</td>
                        <td>({{ $item->lat_club }}), ({{ $item->lng_club }})</td>
                        <td>{{ $item->address_club }}</td>
                        <td class="action-link">
                            <a href="/club/lihat_data/{{$item->id}}" title="Event Club" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <a href="club/{{$item->id}}/detail_saya" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
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
        <h4>Club Yang Di Ikuti</h4>
        <div class="box-body">
            <table id="table_two" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Club</th>
                    <th>Pemilik Club</th>
                    <th>Lokasi Mulai</th>
                    <th>Alamat</th>
                    <th>Loft Saya</th>
                    <th>Tgl Join</th>
                    <th>Aksi</th>
                </thead>
                <tbody>                   
                    {{-- @if(count($club_ikut) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                    </tr>
                    @endif --}}
                    @foreach($club_ikut as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->club->name_club }}</td>
                        <td>{{ $item->club->user->name }}</td>
                        <td>({{ $item->club->lat_club }}), ({{ $item->club->lng_club }})</td>
                        <td>{{ $item->club->address_club }}</td>
                        <td>{{ $item->user->name_loft }}</td>
                        <td>{{ date('d F Y  H:i:s', strtotime($item->created_at)) }}</td>                        @if ($item->is_active == 0)
                        <td>Pending</td>
                        @else
                        <td class="action-link">
                            <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <a href="club/{{$item->id_club}}/detail_ikut" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                        </td>
                        @endif
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="row mt-5 px-5 mb-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Club Yang Belum Di Ikuti</h4>
        <div class="box-body">
            <table id="table_three" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Club</th>
                    <th>Tanggal Club</th>
                    
                                      
                    <th>Aksi</th>
                </thead>
                <tbody>
                    {{-- @if(count($club_id) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                    </tr>
                    @endif --}}
                    @foreach($club_id as $items)
                    <tr>
                        <td>{{ $loop->index+1 }} </td>
                        <td>{{ $items->name_club }}</td>
                        <td>{{ date('d F Y  H:i:s', strtotime($items->created_at)) }}</td>
                        <td class="action-link">

                                {{-- <a href="/club/{{$items->id}}/detail_belum_ikut" title="Details" class="mx-1"><i class="fa fa-list-alt"
                                    aria-hidden="true"></i></a> --}}
                                    <a href="#tambah_jenisstandar{{ $items->id }}"  data-toggle="modal"
                                        data-target="#tambah_jenisstandar{{ $items->id }}"><i class="fa fa-list-alt"
                                        aria-hidden="true"></i></a>
                            {{-- <a href="#" title="Join" class="mx-1"><i class="fa fa-sign-in"
                                    aria-hidden="true"></i></a> --}}
                                    <a href="/club/join_loft_club/{{$items->id}}/{{ $auth }}" title="Join" class="mx-1"><i class="fa fa-sign-in"
                                        aria-hidden="true"></i></a>
                                    
                            
                            
                        </td>
                    </tr>

                    <div class="modal fade" id="tambah_jenisstandar{{ $items->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Club Detail</h5>
                                    <button class="close" type="button" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {{-- <form action="/club/join" method="POST">
                                        {{ csrf_field() }} --}}
                                        <div class="form-group">
                                            <p>Nama Club : <b style="color: red">{{ $items->name_club }}</b></p>
                                            <p>Alamat Club : <b style="color: red">{{ $items->address_club }}</b></p>
                                            <p>Pemilik Club : <b style="color: red">{{ $items->manager->name }} ({{ $items->manager->username }})</b></p>
                                        </div>
            
                                        
                                    {{-- </form> --}}
                                </div>
                                <div class="modal-footer">
                                    <a href="/club/join_loft_club/{{$items->id}}/{{ $auth }}" title="Join" class="btn btn-success mx-1">Join</a>

                                    <button class="btn btn-secondary" type="button"
                                        data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection