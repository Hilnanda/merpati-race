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
                    <th>Nama Loft</th>
                    <th>Logo Loft</th>
                    <th>Lomba</th>
                    <th>Waktu Mulai</th>
                    <th>Titik Mulai</th>
                    <th>Jarak</th>
                    <th>Status</th>
                    <th>Sudah Sampai</th>
                </thead>
                <tbody>
                    @foreach($loft_owns as $loft)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                            <a href="/loft/{{$loft->id}}/details" class="text-info">
                                {{ $loft->name_loft }}
                            </a>
                        </td>
                        <td>
                            <a href="/loft/{{$loft->id}}/details">
                                <img style="height: 80px; display: block;" src="{{ asset('image/'.$loft->logo_loft.'') }}">
                            </a>
                        </td>
                        <td>
                            @if(count($loft->event) > 0)
                            <a href="/loft/events/{{$loft->event[0]->id}}/1/details" class="text-info">{{ $loft->event[0]->name_event }}</a>
                            @else
                            -
                            @endif
                        </td>
                        <td>{{ count($loft->event) > 0 && $loft->event[0] ? $loft->event[0]->event_hotspot[0]->release_time_hotspot : '-' }}</td>
                        <td>{{ count($loft->event) > 0 && $loft->event[0] ? $loft->event[0]->address_event : '-' }}</td>
                        <td>{{ $loft->distance ? round($loft->distance, 2) . ' Km' : '-' }}</td>
                        <td style="color: {{ $loft->color ? $loft->color : '' }};">{{ $loft->status ? $loft->status : '-' }}</td>
                        <td>{{ count($loft->event) > 0 ? ($loft->arrived ? $loft->arrived : 0) : '-' }}</td>
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
                    <th>Nama Loft</th>
                    <th>Logo Loft</th>
                    <th>Lomba</th>
                    <th>Waktu Mulai</th>
                    <th>Titik Mulai</th>
                    <th>Jarak</th>
                    <th>Status</th>
                    <th>Sudah Sampai</th>
                </thead>
                <tbody>                   
                    @foreach($loft_follows as $loft)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                            <a href="/loft/{{$loft->id}}/details" class="text-info">
                                {{ $loft->name_loft }}
                            </a>
                        </td>
                        <td>
                            <a href="/loft/{{$loft->id}}/details">
                                <img style="height: 80px; display: block;" src="{{ asset('image/'.$loft->logo_loft.'') }}">
                            </a>
                        </td>
                        <td>
                            @if(count($loft->event) > 0)
                            <a href="/loft/events/{{$loft->event[0]->id}}/1/details" class="text-info">{{ $loft->event[0]->name_event }}</a>
                            @else
                            -
                            @endif
                        </td>
                        <td>{{ count($loft->event) > 0 && $loft->event[0] ? $loft->event[0]->event_hotspot[0]->release_time_hotspot : '-' }}</td>
                        <td>{{ count($loft->event) > 0 && $loft->event[0] ? $loft->event[0]->address_event : '-' }}</td>
                        <td>{{ $loft->distance ? round($loft->distance, 2) . ' Km' : '-' }}</td>
                        <td style="color: {{ $loft->color ? $loft->color : '' }};">{{ $loft->status ? $loft->status : '-' }}</td>
                        <td>{{ count($loft->event) > 0 ? ($loft->arrived ? $loft->arrived : 0) : '-' }}</td>
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
        <h4>Loft Yang Belum Di Ikuti</h4>
        <div class="box-body">
            <table id="table_three" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Loft</th>
                    <th>Logo Loft</th>
                    <th>Lomba</th>
                    <th>Waktu Mulai</th>
                    <th>Titik Mulai</th>
                    <th>Jarak</th>
                    <th>Status</th>
                    <th>Sudah Sampai</th>
                </thead>
                <tbody>                   
                    @foreach($loft_others as $loft)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                            <a href="/loft/{{$loft->id}}/details" class="text-info">
                                {{ $loft->name_loft }}
                            </a>
                        </td>
                        <td>
                            <a href="/loft/{{$loft->id}}/details">
                                <img style="height: 80px; display: block;" src="{{ asset('image/'.$loft->logo_loft.'') }}">
                            </a>
                        </td>
                        <td>
                            @if(count($loft->event) > 0)
                            <a href="/loft/events/{{$loft->event[0]->id}}/1/details" class="text-info">{{ $loft->event[0]->name_event }}</a>
                            @else
                            -
                            @endif
                        </td>
                        <td>{{ count($loft->event) > 0 && $loft->event[0] ? $loft->event[0]->event_hotspot[0]->release_time_hotspot : '-' }}</td>
                        <td>{{ count($loft->event) > 0 && $loft->event[0] ? $loft->event[0]->address_event : '-' }}</td>
                        <td>{{ $loft->distance ? round($loft->distance, 2) . ' Km' : '-' }}</td>
                        <td style="color: {{ $loft->color ? $loft->color : '' }};">{{ $loft->status ? $loft->status : '-' }}</td>
                        <td>{{ count($loft->event) > 0 ? ($loft->arrived ? $loft->arrived : 0) : '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection