@extends('one_loft_race.layout.app_one')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>List Loft</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Running One Loft Race Saya</h4>
        <div class="box-body" style="overflow-y: auto;">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Loft</th>
                    <th>Logo Loft</th>
                    <th>Lomba</th>
                    <th>Waktu Mulai</th>
                    <th>Titik Mulai</th>
                    <th>Titik Selesai</th>
                    <th>Jarak</th>
                    <th>Batas Pendaftaran</th>
                    <th>Status</th>
                    <th>Sudah Sampai</th>
                    <th></th>
                </thead>
                <tbody>
                    @php
                    $number = 1;
                    @endphp
                    @foreach($event_owns as $event)
                    @if($event->status == 'Terbang')
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>
                            <a href="/loft/{{$event->loft_id}}/details" class="text-info">
                                {{ $event->name_loft }}
                            </a>
                        </td>
                        <td>
                            <a href="/loft/{{$event->loft_id}}/details">
                                <img style="display: block; max-height: 80px; height: auto; width: auto;" src="{{ asset('image/'.$event->logo_loft.'') }}">
                            </a>
                        </td>
                        <td>
                            <a href="/loft/events/{{$event->id}}/1/details" class="text-info">{{ $event->name_event }}</a>
                        </td>
                        <td>{{ $event->event_hotspot[0] ? $event->event_hotspot[0]->release_time_hotspot : '-' }}</td>
                        <td>{{ $event->lat_event ? $event->lat_event . ', ' . $event->lng_event : '-' }}</td>
                        <td>{{ $event->lat_event ? $event->lat_event_end . ', ' . $event->lng_event_end : '-' }}</td>
                        <td>{{ $event->distance ? round($event->distance, 2) . ' Km' : '-' }}</td>
                        <td>{{ $event->due_join_date_event ? $event->due_join_date_event : '-' }}</td>
                        <td style="color: {{ $event->color ? $event->color : '' }};">{{ $event->status ? $event->status : '-' }}</td>
                        <td>{{ $event->arrived ? $event->arrived : 0 }}</td>
                        <td class="action-link">
                            <a href="/loft/events/{{$event->id}}/1/basket" title="Proses Inkorf" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="/loft/events/{{$event->id}}/1/live-result" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    <!-- @foreach($loft_owns as $loft)
                    @if(count($loft->event) == 0)
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>
                            <a href="/loft/{{$loft->id}}/details" class="text-info">
                                {{ $loft->name_loft }}
                            </a>
                        </td>
                        <td>
                            <a href="/loft/{{$loft->id}}/details">
                                <img style="display: block; max-height: 80px; height: auto; width: auto;" src="{{ asset('image/'.$loft->logo_loft.'') }}">
                            </a>
                        </td>
                        @for ($i=0; $i < 8; $i++)
                        <td>-</td>
                        @endfor
                        <td></td>
                    </tr>
                    @endif
                    @endforeach -->
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>One Loft Race Yang Di Ikuti</h4>
        <div class="box-body" style="overflow-y: auto;">
            <table id="table_two" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Loft</th>
                    <th>Logo Loft</th>
                    <th>Lomba</th>
                    <th>Waktu Mulai</th>
                    <th>Titik Mulai</th>
                    <th>Titik Selesai</th>
                    <th>Jarak</th>
                    <th>Batas Pendaftaran</th>
                    <th>Status</th>
                    <th>Sudah Sampai</th>
                    <th></th>
                </thead>
                <tbody>
                    @php
                    $number = 1;
                    @endphp
                    @foreach($event_follows as $event)
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>
                            <a href="/loft/{{$event->loft_id}}/details" class="text-info">
                                {{ $event->name_loft }}
                            </a>
                        </td>
                        <td>
                            <a href="/loft/{{$event->loft_id}}/details">
                                <img style="display: block; max-height: 80px; height: auto; width: auto;" src="{{ asset('image/'.$event->logo_loft.'') }}">
                            </a>
                        </td>
                        <td>
                            <a href="/loft/events/{{$event->id}}/1/details" class="text-info">{{ $event->name_event }}</a>
                        </td>
                        <td>{{ $event->event_hotspot[0]->release_time_hotspot }}</td>
                        <td>{{ $event->lat_event ? $event->lat_event . ', ' . $event->lng_event : '-' }}</td>
                        <td>{{ $event->lat_event ? $event->lat_event_end . ', ' . $event->lng_event_end : '-' }}</td>
                        <td>{{ round($event->distance, 2) . ' Km' }}</td>
                        <td>{{ $event->due_join_date_event ? $event->due_join_date_event : '-' }}</td>
                        <td style="color: {{ $event->color ? $event->color : '' }};">{{ $event->status }}</td>
                        <td>{{ $event->arrived ? $event->arrived : 0 }}</td>
                        <td class="action-link">
                            <a href="/loft/events/{{$event->id}}/1/basket" title="Proses Inkorf" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="/loft/events/{{$event->id}}/1/live-result" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    <!-- @foreach($loft_follows as $loft)
                    @if(count($loft->event) == 0)
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>
                            <a href="/loft/{{$loft->id}}/details" class="text-info">
                                {{ $loft->name_loft }}
                            </a>
                        </td>
                        <td>
                            <a href="/loft/{{$loft->id}}/details">
                                <img style="display: block; max-height: 80px; height: auto; width: auto;" src="{{ asset('image/'.$loft->logo_loft.'') }}">
                            </a>
                        </td>
                        @for ($i=0; $i < 8; $i++)
                        <td>-</td>
                        @endfor
                        <td></td>
                    </tr>
                    @endif
                    @endforeach -->
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="row mt-5 px-5 mb-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Semua One Loft Race</h4>
        <div class="box-body" style="overflow-y: auto;">
            <table id="table_three" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Loft</th>
                    <th>Logo Loft</th>
                    <th>Lomba</th>
                    <th>Waktu Mulai</th>
                    <th>Titik Mulai</th>
                    <th>Titik Selesai</th>
                    <th>Jarak</th>
                    <th>Batas Pendaftaran</th>
                    <th>Status</th>
                    <th>Sudah Sampai</th>
                    <th></th>
                </thead>
                <tbody>                   
                    @foreach($all_events as $event)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                            <a href="/loft/{{$event->loft_id}}/details" class="text-info">
                                {{ $event->name_loft }}
                            </a>
                        </td>
                        <td>
                            <a href="/loft/{{$event->loft_id}}/details">
                                <img style="display: block; max-height: 80px; height: auto; width: auto;" src="{{ asset('image/'.$event->logo_loft.'') }}">
                            </a>
                        </td>
                        <td>
                            <a href="/loft/events/{{$event->id}}/1/details" class="text-info">{{ $event->name_event }}</a>
                        </td>
                        <td>{{ $event->event_hotspot[0]->release_time_hotspot }}</td>
                        <td>{{ $event->lat_event ? $event->lat_event . ', ' . $event->lng_event : '-' }}</td>
                        <td>{{ $event->lat_event ? $event->lat_event_end . ', ' . $event->lng_event_end : '-' }}</td>
                        <td>{{ round($event->distance, 2) . ' Km' }}</td>
                        <td>{{ $event->due_join_date_event ? $event->due_join_date_event : '-' }}</td>
                        <td style="color: {{ $event->color ? $event->color : '' }};">{{ $event->status }}</td>
                        <td>{{ $event->arrived ? $event->arrived : 0 }}</td>
                        <td class="action-link">
                            <a href="/loft/events/{{$event->id}}/1/basket" title="Proses Inkorf" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="/loft/events/{{$event->id}}/1/live-result" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
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