@extends('one_loft_race.layout.app_one')

@section('title')
{{ $title }}
@endsection

@section('content')
<style>
    .badge {
        position: absolute;
        top: -10px;
        right: -10px;
        padding: 5px 10px;
        border-radius: 50%;
        background: red;
        color: white;
    }

</style>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Detail Loft</h2>
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
                <h4>Detail Loft "{{ $loft->name_loft }}"</h4>
                @if($loft->id_user == $current_user->id)
                <div>
                    <a href="#" class="btn musica-btn" data-toggle="modal" data-target="#createEvent">Buat Lomba</a>
                    <a href="#" class="btn musica-btn btn-2" data-toggle="modal" data-target="#createTraining">Buat Training</a>
                    <a href="/loft/{{$loft->id}}/details/join-list" class="btn musica-btn btn-primary">
                        Permintaan Join
                        @if ($count_acc != 0)
                        <span class="badge">{{ $count_acc }}</span>
                        @endif</a>
                </div>
                @else
                <a href="#" class="btn musica-btn" data-toggle="modal" data-target="#joinLoft">Join Loft</a>
                @endif
            </div>
        </div>
        <div class="row my-2">
            <div class="col-3">
                <img style="width: 100%;" src="{{ asset('image/'.$loft->logo_loft.'') }}">
            </div>
            <div class="col-9">
                <p>Pemilik Pigeon Terdaftar : <b style="color: red">{{ $loft->fanciers ? count($loft->fanciers) : 0 }}</b></p>
                <p>Pigeon Terdaftar : <b style="color: red">{{ $loft->loft_member ? count($loft->loft_member) : 0 }}</b></p>
                <p>Pemilik Loft : <b style="color: red">{{ $loft->user->name }}</b></p>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-3">
                <button class="btn musica-btn btn-primary" style="width: 100%;" id="participant_loft_button" onclick="showHideParticipants()">Tampilkan Partisipan</button>
            </div>
        </div>
        <!-- Participants Table -->
        <div id="participant_loft" style="display: none;">
            <h4>Partisipan Loft</h4>
            <div class="box-body">
                <table id="table_one" class="table table-bordered table-striped">
                    <thead>
                        <th>No.</th>
                        <th>Pemilik</th>
                        <th>Jumlah Pigeon</th>
                    </thead>
                    <tbody>
                        @php
                        $row = 1;
                        @endphp
                        @foreach($participants as $participant)
                        <tr>
                            <td>{{ $row++ }}</td>
                            <td>{{ $participant->name }}</td>
                            <td>{{ $participant->count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Participants Table -->

        <!-- Race Table -->
        <h4 class="mt-3">One Loft Race</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Waktu Mulai</th>
                    <th>Titik Mulai</th>
                    <th>Titik Selesai</th>
                    <th>Jarak</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody>
                    @php
                    $row = 1;
                    @endphp
                    @foreach($loft->event as $event)
                    @if($event->branch_event == 'One Loft Race')
                    <tr>
                        <td>{{ $row++ }}</td>
                        <td><a href="/loft/events/{{$event->id}}/1/details" class="text-info">{{ $event->name_event }}</a></td>
                        <td>{{ $event->event_hotspot[0]->release_time_hotspot }}</td>
                        <td>{{ $event->lng_event ? $event->lng_event . ', ' . $event->lat_event : '-' }}</td>
                        <td>{{ $event->lng_event_end ? $event->lng_event_end . ', ' . $event->lat_event_end : '-' }}</td>
                        <td>{{ $event->distance ? round($event->distance, 2) . ' Km' : '-' }}</td>
                        <td style="color: {{ $event->color ? $event->color : '' }};">{{ $event->status ? $event->status : '-' }}</td>
                        <td class="action-link">
                            <a href="/loft/events/{{$event->id}}/1/basket" title="Basket List" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="/loft/events/{{$event->id}}/1/live-result" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <a href="#" title="Set Titik Lokasi" class="text-danger mx-1" data-toggle="modal" data-target="#setPoint{{$event->id}}">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </a>
                            <!-- <a href="/events/{{$event->id}}/1/details" title="Detail Lomba" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a> -->
                        </td>
                    </tr>

                    <!-- Modal Set Point -->
                    <div class="modal fade" id="setPoint{{$event->id}}" tabindex="-1" role="dialog"
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
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Race Table -->

        <!-- Training Table -->
        <h4 class="mt-3">Training</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Waktu Mulai</th>
                    <th>Titik Mulai</th>
                    <th>Titik Selesai</th>
                    <th>Jarak</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody>
                    @php
                    $row = 1;
                    @endphp
                    @foreach($loft->event as $event)
                    @if($event->branch_event == 'Training')
                    <tr>
                        <td>{{ $row++ }}</td>
                        <td><a href="/loft/events/{{$event->id}}/1/details" class="text-info">{{ $event->name_event }}</a></td>
                        <td>{{ $event->event_hotspot[0]->release_time_hotspot }}</td>
                        <td>{{ $event->lng_event ? $event->lng_event . ', ' . $event->lat_event : '-' }}</td>
                        <td>{{ $event->lng_event_end ? $event->lng_event_end . ', ' . $event->lat_event_end : '-' }}</td>
                        <td>{{ $event->distance ? round($event->distance, 2) . ' Km' : '-' }}</td>
                        <td style="color: {{ $event->color ? $event->color : '' }};">{{ $event->status ? $event->status : '-' }}</td>
                        <td class="action-link">
                            <a href="/loft/events/{{$event->id}}/1/basket" title="Basket List" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="/loft/events/{{$event->id}}/1/live-result" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <a href="#" title="Set Titik Lokasi" class="text-danger mx-1" data-toggle="modal" data-target="#setPoint{{$event->id}}">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </a>
                            <!-- <a href="/events/{{$event->id}}/1/details" title="Detail Lomba" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a> -->
                        </td>
                    </tr>

                    <!-- Modal Set Point -->
                    <div class="modal fade" id="setPoint{{$event->id}}" tabindex="-1" role="dialog"
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
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Training Table -->

        <!-- /.box-body -->

        <!-- Modal Join Loft -->
        <div class="modal fade" id="joinLoft" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Join Loft</h4>
                    </div>
                    <form action="/loft/{{$loft->id}}/join_loft" method="POST">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="id_pigeon">Pigeon yang ingin join</label>
                                <select class="form-control" name="id_pigeon" required>
                                    <option value="" selected disabled>-- Pilih Pigeon --</option>
                                    @foreach($pigeons as $pigeon)
                                    <option value="{{ $pigeon->id }}">({{ $pigeon->uid_pigeon }}) {{ $pigeon->name_pigeon }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group d-flex justify-content-end">
                                <button class="btn musica-btn btn-2" type="button"
                                data-dismiss="modal">Cancel</button>
                                <input type="submit" value="Daftarkan" class="btn musica-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Join Loft -->

        <!-- Modal Create Event -->
        <div class="modal fade" id="createEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Buat Lomba</h4>
                    </div>
                    <form action="/loft/events" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group" hidden>
                                <label for="id_loft">ID Loft</label>
                                <input type="text" name="id_loft" class="form-control" value="{{$loft->id}}" required>
                            </div>
                            <div class="form-group" hidden>
                                <label for="branch_event">Branch Event</label>
                                <input type="text" name="branch_event" class="form-control" value="One Loft Race" required>
                            </div>
                            <div class="form-group">
                                <label for="name_event">Nama Lomba</label>
                                <input type="text" name="name_event" class="form-control" placeholder="Isi nama lomba" required>
                            </div>
                            <div class="form-group">
                                <label for="logo_event">Logo Lomba</label>
                                <input type="file" name="logo_event" class="form-control" placeholder="Isi logo lomba" required>
                            </div>
                            <!-- <div class="form-group">
                                <label for="category_event">Kategori Lomba</label>
                                <select class="form-control" name="category_event">
                                    <option value="" disabled selected>-- Pilih kategori --</option>
                                    <option value="Individu">Lomba Individu</option>
                                    <option value="Team">Lomba Team</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label for="">Informasi Tentang Lomba</label>
                                <textarea name="info_event" class="form-control" required="" placeholder="Isi informasi lomba"></textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Jumlah Hotspot</label>
                                <input type="number" name="hotspot_length_event" class="form-control" placeholder="Isi jumlah hotspot lomba (minimal 1)" required min="1">
                            </div> -->
                            <div class="form-group">
                                <label for="">Waktu Mulai Lomba</label>
                                <input type="datetime-local" step="1" id="release_time_event_add" name="release_time_event" class="form-control" placeholder="Isi waktu mulai lomba" required onchange="setMaxDueDateAdd()">
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Harga Pendaftaran Lomba</label>
                                <input type="number" name="price_event" class="form-control" placeholder="Isi harga pendaftaran lomba" required step=100>
                            </div> -->
                            <div class="form-group">
                                <label for="">Batas Waktu Pendaftaran</label>
                                <input type="datetime-local" step="1" id="due_join_date_event_add" name="due_join_date_event" class="form-control" placeholder="Isi batas pendaftaran lomba">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group d-flex justify-content-end">
                                <button class="btn musica-btn btn-2" type="button"
                                data-dismiss="modal">Cancel</button>
                                <input type="submit" value="Simpan" class="btn musica-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Create Event -->

        <!-- Modal Create Training -->
        <div class="modal fade" id="createTraining" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Buat Training</h4>
                    </div>
                    <form action="/loft/events" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group" hidden>
                                <label for="id_loft">ID Loft</label>
                                <input type="text" name="id_loft" class="form-control" value="{{$loft->id}}" required>
                            </div>
                            <div class="form-group" hidden>
                                <label for="branch_event">Branch Event</label>
                                <input type="text" name="branch_event" class="form-control" value="Training" required>
                            </div>
                            <div class="form-group">
                                <label for="name_event">Nama Training</label>
                                <input type="text" name="name_event" class="form-control" placeholder="Isi nama training" required>
                            </div>
                            <div class="form-group">
                                <label for="logo_event">Logo Training</label>
                                <input type="file" name="logo_event" class="form-control" placeholder="Isi logo training" required>
                            </div>
                            <div class="form-group">
                                <label for="">Informasi Tentang Training</label>
                                <textarea name="info_event" class="form-control" required="" placeholder="Isi informasi training"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Waktu Mulai Training</label>
                                <input type="datetime-local" step="1" id="release_time_event_add_training" name="release_time_event" class="form-control" placeholder="Isi waktu mulai training" required onchange="setMaxDueDateAddTraining()">
                            </div>
                            <div class="form-group">
                                <label for="">Batas Waktu Pendaftaran</label>
                                <input type="datetime-local" step="1" id="due_join_date_event_add_training" name="due_join_date_event" class="form-control" placeholder="Isi batas pendaftaran training">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group d-flex justify-content-end">
                                <button class="btn musica-btn btn-2" type="button"
                                data-dismiss="modal">Cancel</button>
                                <input type="submit" value="Simpan" class="btn musica-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Create Training -->

    </div>
</div>
@endsection
@push('bottom-script')
<script>
    function setMaxDueDateAdd() {
        var release_time = document.getElementById("release_time_event_add").value;
        document.getElementById("due_join_date_event_add").max = release_time;
    }
</script>
<script>
    function setMaxDueDateAddTraining() {
        var release_time = document.getElementById("release_time_event_add_training").value;
        document.getElementById("due_join_date_event_add_training").max = release_time;
    }
</script>
<script>
    function showHideParticipants() {
        var button = document.getElementById("participant_loft_button");
        var participan_loft = document.getElementById("participant_loft");

        if (button.textContent == "Tampilkan Partisipan") {
            participant_loft.style.display = "block";
            button.textContent = "Sembunyikan Partisipan";
        } else {
            participant_loft.style.display = "none";
            button.textContent = "Tampilkan Partisipan";
        }
    }
</script>
@endpush