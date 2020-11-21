@extends('subscribed.layout.subscribed')

@section('title')
    Pigeon Training Details
@endsection

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">   
        <h2>Training Details</h2>
    </div>
</div>
<div class="row mt-5 px-5 mb-5">
    <div class="col-lg-12">
        <div class="row">
            <div class="col d-flex justify-content-between">
                <h4>Detail Training "{{ $data->name_event }}"</h4>               
                {{-- @if($data->due_join_date_event >= $current_datetime && $data->release_time_event > $current_datetime)
                <a href="#" class="btn musica-btn" data-toggle="modal" data-target="#joinLomba">Join Lomba</a>
                @elseif($data->due_join_date_event < $current_datetime && $data->release_time_event > $current_datetime)
                <h5 style="color: #EB0000;">Pendaftaran ditutup</h5>
                @endif --}}
            </div>
            <div class="row my-2">
                <div class="col-2">
                    <img style="width: 100%;" src="{{ asset('image/'.$data->logo_event.'') }}">
                </div>
                <div class="col-7">
                    <p>Nama lomba : <b style="color: red">{{ $data->name_event }}</b></p>
                    <p>Jenis lomba : <b style="color: red">{{ $data->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</b></p>
                    <p>Kategori lomba : <b style="color: red">Lomba {{ $data->category_event }}</b></p>
                    <p>Info lomba : <b style="color: red">{{ $data->info_event }}</b></p>
                    <p>Posisi lomba : <b style="color: red">{{ $data->lat_event ? $data->lat_event . ', ' . $data->lng_event : '-' }}</b></p>
                    <p>Alamat lomba : <b style="color: red">{{ $data->address_event ? $data->address_event : '-' }}</b></p>
                    <p>Jadwal mulai : <b style="color: red">{{ \Carbon\Carbon::parse($data->release_time_event)->format('j F Y, H:i:s') }}</b></p>
                </div>
                <div class="col-3">
                    <a href="/loft/{{$data->id}}/details">
                        {{-- <img style="width: 100%;" src="{{ asset('image/'.$data->logo_loft.'') }}"> --}}
                    </a>
                </div>
            </div>
            {{-- <div class="box-body">
                <table id="table_one" class="table table-bordered table-striped">
                    <thead>
                        <th>Peringkat</th>
                        <th>Pemilik</th>
                        <!-- @if($data->category_event == 'Training')
                        <th>Team</th>
                        @endif
                        <th>Club</th> -->
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
                            <td>{{ $event_result->event_participant->pigeons->users->name ? $event_result->event_participant->pigeons->users->name : '-' }}</td>
                            <!-- @if($event->category_event == 'Team')
                            <td>{{ $event_result->event_participant->team->name_team ? $event_result->event_participant->team->name_team : '-' }}</td>
                            @endif
                            <td>{{ $event_result->event_participant->club->name_club ? $event_result->event_participant->club->name_club : '-' }}</td> -->
                            <td>{{ $event_result->event_participant->pigeons ? $event_result->event_participant->pigeons->uid_pigeon : '-' }}</td>
                            <td>{{ $event_result->event_participant->pigeons ? $event_result->event_participant->pigeons->name_pigeon : '-' }}</td>
                            <td>{{ $event_result->speed_event_result ? $event_result->updated_at : '-' }}</td>
                            @if($event_results[0]->speed_event_result)
                            <td>{{ $event_result->speed_event_result ? round($event_result->speed_event_result, 2) : round($unfinished_speed, 2) }}</td>
                            @else
                            <td>{{ '-' }}</td>
                            @endif
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div> --}}
        </div>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->


@endsection