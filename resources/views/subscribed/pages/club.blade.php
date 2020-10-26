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
                    
                    @foreach($club_ikut as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->name_club }}</td>
                        <td>({{ $item->lat_club }}), ({{ $item->lng_club }})</td>
                        <td>{{ $item->address_club }}</td>
                        <td>{{ $item->name_pigeon }}</td>
                        <td class="action-link">
                            <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <a href="#" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
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
                    {{-- @if(count($events_soon) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada lomba yang belum berlangsung --</td>
                    </tr>
                    @endif
                    @foreach($events_soon as $event)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $event->name_event }}</td>
                        <td>{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</td>
                        <td>{{ $event->info_event }}</td>
                        <td>({{ $event->lat_event }}), ({{ $event->lng_event }})</td>
                        <td>{{ $event->lat_event_end ? '(' . $event->lat_event_end . '), (' . $event->lng_event_end . ')' : '-' }}</td>
                        <td>{{ str_replace('T', ' ', $event->release_time_event) . ':00 (GMT +7:00)' }}</td>
                        <td class="action-link">
                            <a href="#" title="Basketed List" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection