@extends('subscribed.layout.subscribed')
@section('title')
Hasil {{$event->branch_event == 'Club' ? 'Public Race' : $event->branch_event}}
@endsection

@push('top-style')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1Vi4LTFNx_jZR7G3UQ7p-b7XDkaQ1lRQ&libraries=&v=weekly" defer></script>
@endpush

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Hasil {{$event->branch_event == 'Club' ? 'Public Race' : $event->branch_event}}</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5 mb-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <div class="row">
            <div class="col d-flex justify-content-between">
                <h4>Hasil {{$event->branch_event == 'Club' ? 'Public Race' : $event->branch_event}} "{{ $event->name_event }}"</h4>
            </div>
        </div>
        <hr>
        <div class="row my-2">
            <div class="col-2">
                <img style="width: 220px" src="{{ asset('image/'.$event->logo_event.'') }}">
            </div>
            <div class="col-10">
                <p>Jenis lomba : <b style="color: red">{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</b></p>
                <p>Kategori lomba : <b style="color: red">Lomba {{ $event->category_event }}</b></p>
                <p>Info lomba : <b style="color: red">{{ $event->info_event }}</b></p>
                <p>Posisi mulai lomba : <b style="color: red">{{ $event->lat_event ? $event->lat_event . ', ' . $event->lng_event : '-' }}</b></p>
                <p>Posisi selesai lomba : <b style="color: red">{{ $event->lat_event ? $event->lat_event_end . ', ' . $event->lng_event_end : '-' }}</b></p>
                <p>Jadwal mulai : <b style="color: red">{{ \Carbon\Carbon::parse($event->release_time_event)->format('j F Y') }}</b></p>
                <p>Pigeon di basket : <b style="color: red">{{ count($event_results) }}</b></p>
                <p>Pigeon sudah datang : <b style="color: red">{{ count($arrived_pigeons) }}</b></p>
                <p>Pigeon belum datang : <b style="color: red">{{ count($event_results) - count($arrived_pigeons) }}</b></p>
            </div>
        </div>
        @if($event->hotspot_length_event > 1)
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-end">
                
            </div>
        </div>
        @endif
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>Peringkat</th>
                    <th>Pemilik</th>
                    <th>UID Pigeon</th>
                    <th>Nama Pigeon</th>
                    <th>Kedatangan</th>
                    <th>Kecepatan [m/mnt]</th>
                </thead>
                <tbody>
                    @if(count($event_results) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Hasil belum bisa ditampilkan --</td>
                    </tr>
                    @else
                    @php
                    $rank = 1;
                    @endphp
                    @foreach($event_results as $event_result)
                    <tr>
                        <td>{{ $rank++ }}</td>
                        <td>
                            {{ $event_result->event_participant->pigeons->users->name }}
                            <!-- <a href="" class="text-info">
                                {{ $event_result->event_participant->pigeons->users->name }}
                            </a> -->
                        </td>
                        <td>
                            <a href="/pigeon/detail/{{$event_result->event_participant->pigeons->id_user}}/{{$event_result->event_participant->pigeons->id}}" class="text-info">
                                {{ $event_result->event_participant->pigeons->uid_pigeon }}
                            </a>
                        </td>
                        <td>{{ $event_result->event_participant->pigeons->name_pigeon }}</td>
                        <td>{{ $event_result->speed_event_result ? $event_result->updated_at : '-' }}</td>
                        @if($event_results[0]->speed_event_result)
                        <td>
                            <a href="#" title="Detail" class="text-info" data-toggle="modal" data-target="#showDistance{{$rank-1}}" onclick="showMap(<?php echo $rank-1; ?>)">
                                {{ $event_result->speed_event_result ? round($event_result->speed_event_result, 2) : round($event_result->unfinished_speed, 2) }}
                            </a>
                        </td>
                        @else
                        <td>{{ '-' }}</td>
                        @endif
                    </tr>

                    <!-- Modal Show Distance -->
                    <div class="modal fade" id="showDistance{{$rank-1}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Jarak Perlombaan {{$rank-1}}</h4>
                                </div>
                                <div class="modal-body" style="height: 400px;">
                                    <div id="map{{$rank-1}}" style="width: 100%; height: 100%;"></div>
                                </div>
                                <div class="modal-footer text-left">
                                    <h5>Jarak : {{ round($event_result->distance, 2) }} meter</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Set Point -->


                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->

</div>
</div>
@endsection
@push('bottom-script')
<script>
function showMap(rank) {
    let idMap = "map" + rank;

    var event_results = JSON.parse('<?php echo json_encode($event_results) ?>');
    var event = JSON.parse('<?php echo json_encode($event) ?>');

    const map = new google.maps.Map(document.getElementById(idMap), {
        zoom: 6,
        center: { lat: ((event_results[rank-1].event_participant.pigeons.users.lat_loft + event.lat_event) / 2), lng: ((event_results[rank-1].event_participant.pigeons.users.lng_loft + event.lng_event) / 2) },
        mapTypeId: "terrain",
    });
    const flightPlanCoordinates = [
        { lat: event.lat_event, lng: event.lng_event },
        { lat: event_results[rank-1].event_participant.pigeons.users.lat_loft, lng: event_results[rank-1].event_participant.pigeons.users.lng_loft }
    ];
    const flightPath = new google.maps.Polyline({
        path: flightPlanCoordinates,
        geodesic: false,
        strokeColor: "#FF0000",
        strokeOpacity: 1.0,
        strokeWeight: 2,
    });
    flightPath.setMap(map);
}
</script>
@endpush