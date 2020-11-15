@extends('one_loft_race.layout.app_one')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>One Loft Race</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>List Loft Saya</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Logo</th>
                    <th>Lomba</th>
                    <th>Waktu mulai</th>
                    <th>Titik mulai</th>
                    <th>Jarak</th>
                    <th>Status</th>
                    <th>Sudah sampai</th>
                    <th></th>
                </thead>
                <tbody>
                    @if(count($loft_owns) == 0)
                    <tr class="text-center">
                        <td colspan="10">-- Tidak ada Club yang belum Diikuti --</td>
                    </tr>
                    @endif
                    @foreach($loft_owns as $loft)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $loft->name_loft }}</td>
                        <td><img style="height: 80px" src="{{ asset('image/'.$loft->logo_loft.'') }}"></td>
                        <td>{{ count($loft->event) > 0 ? $loft->event[0]->name_event : '-' }}</td>
                        <td>{{ count($loft->event) > 0 && $loft->event[0] ? $loft->event[0]->event_hotspot[0]->release_time_hotspot : '-' }}</td>
                        <td>{{ count($loft->event) > 0 && $loft->event[0] ? $loft->event[0]->address_event : '-' }}</td>
                        <td>{{ $loft->distance ? round($loft->distance, 2) . ' Km' : '-' }}</td>
                        <td class="action-link">
                            <a href="/club/lihat_data/{{$loft->id}}" title="Event Club" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <a href="club/{{$loft->id}}/detail_saya" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
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
        <h4>Loft Yang Di Ikuti</h4>
        <div class="box-body">
            <table id="table_two" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Club</th>
                    <th>Pemilik Club</th>
                    <th>Lokasi Mulai</th>
                    <th>Alamat</th>
                    <th>ID</th>
                    <th>Pigeon</th>                   
                    <th>Aksi</th>
                </thead>
                <tbody>                   
                    {{-- @if(count($club_ikut) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                    </tr>
                    @endif --}}
                    {{-- @foreach($club_ikut as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->club->name_club }}</td>
                        <td>{{ $item->club->user->name }}</td>
                        <td>({{ $item->club->lat_club }}), ({{ $item->club->lng_club }})</td>
                        <td>{{ $item->club->address_club }}</td>
                        <td>{{ $item->pigeon->uid_pigeon }}</td>
                        <td>{{ $item->pigeon->name_pigeon }}</td>
                        <td class="action-link">
                            <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <a href="club/{{$item->id_club}}/detail_ikut" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="row mt-5 px-5 mb-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Loft Yang Belum Di Ikuti</h4>
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
                    
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection