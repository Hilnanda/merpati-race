@extends('subscribed.layout.subscribed')

@section('title')
    Club
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
                    @if(count($clubku) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                    </tr>
                    @endif
                    @foreach($clubku as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->name_club }}</td>
                        <td>{{ $item->manager->username }}</td>
                        <td>({{ $item->lat_club }}), ({{ $item->lng_club }})</td>
                        <td>{{ $item->address_club }}</td>
                        <td class="action-link">
                            <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
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
                    @if(count($club_ikut) == 0)
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
                    @if(count($club_belum_ikut) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                    </tr>
                    @endif
                    <tr>
                        @foreach($club_belum_ikut as $items)

                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $items->name_club }}</td>
                        <td>{{ date('d F Y  H:i:s', strtotime($items->created_at)) }}</td>
                        <td class="action-link">
                            <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                        <a href="club/{{$items->id}}/detail_belum_ikut" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
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