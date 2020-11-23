@extends('one_loft_race.layout.app_one')

@section('title')
Detail {{$event->branch_event}}
@endsection

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Detail {{$event->branch_event}}</h2>
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
                <h4>Detail {{$event->branch_event}} "{{ $event->name_event }}"</h4>
                @if($event->due_join_date_event >= $current_datetime && $event->release_time_event > $current_datetime)
                <a href="#" class="btn musica-btn" data-toggle="modal" data-target="#joinLomba">Join {{$event->branch_event}}</a>
                @elseif($event->due_join_date_event < $current_datetime && $event->release_time_event > $current_datetime)
                <h5 style="color: #EB0000;">Pendaftaran ditutup</h5>
                @endif
            </div>
        </div>
        <hr>
        <div class="row my-2">
            <div class="col-2">
                <img style="width: 100%;" title="Logo {{$event->branch_event}}" src="{{ asset('image/'.$event->logo_event.'') }}">
            </div>
            <div class="col-7">
                <p>Nama lomba : <b style="color: red">{{ $event->name_event }}</b></p>
                <p>Jenis lomba : <b style="color: red">{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</b></p>
                <p>Kategori lomba : <b style="color: red">Lomba {{ $event->category_event }}</b></p>
                <p>Info lomba : <b style="color: red">{{ $event->info_event }}</b></p>
                <p>Posisi lomba : <b style="color: red">{{ $event->lat_event ? $event->lat_event . ', ' . $event->lng_event : '-' }}</b></p>
                <p>Alamat lomba : <b style="color: red">{{ $event->address_event ? $event->address_event : '-' }}</b></p>
                <p>Jadwal mulai : <b style="color: red">{{ \Carbon\Carbon::parse($event->release_time_event)->format('j F Y, H:i:s') }}</b></p>
            </div>
            <div class="col-3">
                <a href="/loft/{{$event->loft->id}}/details">
                    <img style="width: 100%;" title="Logo Loft (Click to go to detail loft)" src="{{ asset('image/'.$event->loft->logo_loft.'') }}">
                </a>
                <div class="d-flex justify-content-between my-2" style="overflow-y: auto;">
                    <a href="#" style="font-size: 20pt;" title="Set Titik Lokasi" class="text-danger mx-5" data-toggle="modal" data-target="#setPoint">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </a>
                    <a href="/loft/events/{{$event->id}}/1/basket" style="font-size: 20pt;" title="Proses Inkorf" class="text-danger mx-5">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="/loft/events/{{$event->id}}/1/live-result" style="font-size: 20pt;" title="Hasil {{$event->branch_event}}" class="text-danger mx-5">
                        <i class="fa fa-list-ol" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
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
                        <td>{{ $event_result->event_participant->pigeons->users->name ? $event_result->event_participant->pigeons->users->name : '-' }}</td>
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
        </div>
        <!-- /.box-body -->

        <!-- Modal Join Lomba -->
        <div class="modal fade" id="joinLomba" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Join {{$event->branch_event}} {{ $event->name_event }}</h4>
                </div>
                <form action="/events/{{ $event->id }}/join_event" method="POST">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="id_pigeon">Pigeon yang ingin join</label>
                            <select class="form-control" name="id_pigeon" required>
                                <option value="" selected disabled>-- Pilih Pigeon --</option>
                                @foreach($pigeons as $pigeon)
                                @if($event->category_event == 'Team')
                                @if($pigeon->name_team)
                                <option value="{{ $pigeon->pigeon_id }}">({{ $pigeon->uid_pigeon }}) {{ $pigeon->name_pigeon }} [{{ $pigeon->name_team }}]</option>
                                @endif
                                @else
                                <option value="{{ $pigeon->pigeon_id }}">({{ $pigeon->uid_pigeon }}) {{ $pigeon->name_pigeon }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        @if($event->category_event == 'Team')
                        <div class="form-group">
                            <label for="is_core">Peran sebagai</label>
                            <select class="form-control" name="is_core" required>
                                <option value="" disabled selected>-- Pilih peran --</option>
                                <option value="1">Inti</option>
                                <option value="0">Cadangan</option>
                            </select>
                        </div>
                        @else
                        <input type="hidden" name="is_core" value="1">
                        @endif
                        @if($event->price_event > 0)
                        <h5>Harga untuk mendaftar {{$event->branch_event}} sebesar Rp.{{ number_format($event->price_event, 2) }}</h5>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <div class="form-group d-flex justify-content-end">
                            <button class="btn musica-btn btn-2" type="button"
                            data-dismiss="modal">Cancel</button>
                            <input type="submit" value="Lanjut Pembayaran" class="btn musica-btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Join Lomba -->

    <!-- Modal Set Point -->
    <div class="modal fade" id="setPoint" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Set Titik Lokasi {{$event->branch_event}}</h4>
                </div>
                <form action="">
                    <div class="modal-body">
                        <h5>URL Titik Lokasi Mulai</h5>
                        <p class="text-info">http://pigeontime.live/event-start/{{$event->id}}/&lt;latitude&gt;/&lt;longitude&gt;</p>
                        <p>contoh:<br>http://pigeontime.live/event-start/{{$event->id}}/-7.893274649955687/112.67354622885584</p>
                        <h5>URL Titik Lokasi Selesai</h5>
                        <p class="text-info">http://pigeontime.live/event-end/{{$event->id}}/&lt;latitude&gt;/&lt;longitude&gt;</p>
                        <p>contoh:<br>http://pigeontime.live/event-end/{{$event->id}}/-7.893274649955687/112.67354622885584</p>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group d-flex justify-content-end">
                            <button class="btn musica-btn btn-2" type="button"
                            data-dismiss="modal">Cancel</button>
                            <input type="submit" value="Selesai" class="btn musica-btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Set Point -->
</div>
</div>
@endsection