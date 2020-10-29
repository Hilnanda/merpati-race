@extends('subscribed.layout.subscribed')
@section('title')
    Lomba Umum
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Lomba Umum</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Daftar Lomba Umum</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jenis Lomba</th>
                    <th>Kategori</th>
                    <th>Titik Mulai</th>
                    <th>Waktu Mulai</th>
                    <th>Jarak</th>
                    <th>Status</th>
                    <!-- <th>Kedatangan</th> -->
                    <th></th>
                </thead>
                <tbody>
                    @if(count($events) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada lomba burung yang tersedia --</td>
                    </tr>
                    @endif
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $event->name_event }}</td>
                        <td>{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</td>
                        <td>{{ $event->category_event }}</td>
                        <td>({{ $event->lat_event }}), ({{ $event->lng_event }})</td>
                        <td>{{ str_replace('T', ' ', $event->release_time_event) . ':00 (GMT +7:00)' }}</td>
                        <td>{{ $event->lat_event_end ? round($event->distance) . ' Km' : '-' }}</td>
                        <td style="color: {{ $event->color }}">{{ $event->status }}</td>
                        <!-- <td></td> -->
                        <td class="action-link">
                            <a href="/events/{{ $event->id }}/basket" title="Basket List" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            @if($event->status == 'Terbang')
                            <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            @endif
                            <a href="/events/{{ $event->id }}/details" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
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