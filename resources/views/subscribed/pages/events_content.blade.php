@extends('subscribed.layout.subscribed')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>{{ $title }}</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5 mb-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Daftar {{ $title }}</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    @if($title == 'Lomba Club')
                    <th>Nama Club</th>
                    @endif
                    <th>Nama Lomba</th>
                    <th>Jenis Lomba</th>
                    <th>Kategori</th>
                    <th>Titik Mulai</th>
                    <th>Waktu Mulai</th>
                    <th>Jarak</th>
                    <th>Hotspot</th>
                    <th>Status</th>
                    <!-- <th>Kedatangan</th> -->
                    <th></th>
                </thead>
                <tbody>
                    @if(count($events) == 0)
                    <tr class="text-center">
                        <td colspan="9">-- Tidak ada {{ $title }} yang tersedia --</td>
                    </tr>
                    @endif
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        @if($title == 'Lomba Club')
                        <td>{{ $event->club->name_club }}</td>
                        @endif
                        <td>{{ $event->name_event }}</td>
                        <td>{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</td>
                        <td>{{ $event->category_event }}</td>
                        <td>{{ $event->lat_event ? '(' . $event->lat_event . '), (' . $event->lng_event . ')' : '-' }}</td>
                        <td>{{ str_replace('T', ' ', $event->release_time_event) . ':00 (GMT +7:00)' }}</td>
                        <td>{{ $event->lat_event_end ? round($event->distance) . ' Km' : '-' }}</td>
                        <td>{{ $event->hotspot_length_event }}</td>
                        <td style="color: {{ $event->color }}">{{ $event->status }}</td>
                        <!-- <td></td> -->
                        <td class="action-link">
                            <a href="/events/{{$event->id}}/1/basket" title="Basket List" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            @if(explode(' ', $event->status)[0] == 'Terbang')
                            <a href="/events/{{$event->id}}/1/live-result" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            @endif
                            <a href="/events/{{$event->id}}/1/details" title="Detail Lomba" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
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