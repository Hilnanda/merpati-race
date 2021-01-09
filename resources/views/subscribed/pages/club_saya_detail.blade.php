@extends('subscribed.layout.subscribed')

@section('title')
Detail Club
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
        <h2>Detail Club</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        {{-- <h4>Detail Club Saya</h4> --}}
        <div class="box-body">
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    @foreach ($clubku as $ite)
                    @if (count($pigeon) != 0)
                    <a href="#join_pigeon" data-toggle="modal" data-target="#join_pigeon"><button type="button"
                        class="btn btn-danger"><i class="fa fa-twitter"></i> Join Pigeon</button></a>
                        @endif
                        <div class="modal fade" id="join_pigeon" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Join Pigeon</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/club/join" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="">List Pigeon</label>
                                            <input type="hidden" name="id_club" value="{{ $ite->id }}">
                                            <input type="hidden" name="id_user" value="{{ $auth }}">
                                            <select name="id_pigeon" class="form-control" required>
                                                <option value="">-- Pilih Pigeon --</option>
                                                @foreach ($pigeon as $pigeons)
                                                @if ($ite->id != $pigeons->id_club)
                                                <option value="{{ $pigeons->id }}">
                                                    {{ $pigeons->uid_pigeon }} - {{ $pigeons->name_pigeon }}
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Simpan" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button"
                                    data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    @if (Auth::user()->id == $clubs->manager_club || $exist == 1)


                    <a href="#tambah_lomba_club" data-toggle="modal" data-target="#tambah_lomba_club"><button
                        type="button" class="btn btn-success">Buat Lomba Club</button></a>
                        {{-- <a href="/club/lihat_data/{{ $id }}"><button
                            type="button" class="btn btn-info">List Event Club</button></a>
                            --}}
                            <div class="modal fade" id="tambah_lomba_club" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Tambah Data Lomba</h4>
                                    </div>
                                    <form action="/club/add_lomba/{{ $id }}" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="name_event">Nama Lomba</label>
                                            <input type="text" name="name_event" class="form-control"
                                            placeholder="Isi nama lomba" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="logo_event">Logo Lomba</label>
                                            <input type="file" name="logo_event" class="form-control"
                                            placeholder="Isi logo lomba" required>
                                        </div>
                                        <div class="form-group">
                                            {{-- <label
                                                for="category_event">Kategori Lomba</label>
                                                --}}
                                                {{-- <select class="form-control"
                                                name="category_event">
                                                <option value="" disabled selected>-- Pilih kategori --</option>
                                                <option value="Individu">Lomba Individu</option>
                                                <option value="Team">Lomba Team</option>
                                            </select> --}}
                                            <input type="text" value="Individu" name="category_event"
                                            class="form-control" placeholder="Isi nama lomba" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Informasi Tentang Lomba</label>
                                            <textarea name="info_event" class="form-control" required=""
                                            placeholder="Isi informasi lomba"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Negara</label>
                                            <select name="country_event" class="form-control" required>
                                              <option value="">-- Pilih Negara --</option>
                                              @foreach($negara as $value)
                                                <option value="{{$value->nicename }}">{{$value->nicename}} ({{ $value->iso }}) </option>
                                              @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="form-group"> --}}
                                            {{-- <label for="">Jumlah Hotspot</label> --}}
                                            <input type="hidden" name="hotspot_length_event" value="1"
                                            {{-- class="form-control"
                                            placeholder="Isi jumlah hotspot lomba (minimal 1)" required
                                            min="1" --}}
                                            >
                                        {{-- </div> --}}
                                        <div class="form-group">
                                            <label for="">Waktu Mulai Lomba</label>
                                            <input type="datetime-local" step="1" id="release_time_event_add"
                                            name="release_time_event" class="form-control"
                                            placeholder="Isi waktu mulai lomba" required
                                            onchange="setMaxDueDateAdd()">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Harga Pendaftaran Lomba</label>
                                            <input type="number" name="price_event" class="form-control"
                                            placeholder="Isi harga pendaftaran lomba" required step=100>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Batas Waktu Pendaftaran</label>
                                            <input type="datetime-local" step="1" id="due_join_date_event_add"
                                            name="due_join_date_event" class="form-control"
                                            placeholder="Isi batas pendaftaran lomba">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="form-group d-flex justify-content-end">
                                            <input type="submit" value="Simpan" class="btn btn-primary">
                                            <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a href="/club/{{ $id }}/permintaan_gabung"><button type="button"
                        class="btn btn-primary">Permintaan Gabung
                        @if ($count_acc != 0)
                        <span class="badge">{{ $count_acc }}</span>
                        @endif
                    </button></a>

                    @if ($clubs->manager_club==$auth)
                    @if (count($operator) != 0 )
                    <a href="#tambah_jenisstandar" data-toggle="modal"
                    data-target="#tambah_jenisstandar"><button type="button" class="btn btn-warning">Tambah
                    Operator Club</button></a>
                    @endif
                    @endif

                    @endif
                    <div class="modal fade" id="tambah_jenisstandar" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Operator</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/club/join-operator" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Operator Club</label>
                                        <input type="hidden" name="id_club" value="{{ $clubs->id }}">

                                        <select name="id_user" class="form-control" required>
                                            <option value="">-- Pilih User --</option>
                                            @foreach ($operator as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                ({{ $item->username }})</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Simpan" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('image/favicon.ico') }}" style="width:220px;height:200px"
                            class="rounded float-left" alt="...">
                            {{-- bagian keterangan --}}

                        </div>
                        <div class="col-6">
                            <h4>Detail Club</h4>
                            {{-- <p>Nama club : <b style="color: red">{{ $clubs->id }}</b>
                            </p> --}}
                            <p>Nama club : <b style="color: red">{{ $clubs->name_club }}</b></p>
                            <p>Alamat club : <b style="color: red">{{ $clubs->address_club }}</b></p>
                            
                            <p>Negara : <b style="color: red">{{ $clubs->country_clubs }}</b> </p>
                            
                            {{-- <p>Jumlah Loft : <b style="color: red">{{ count($list_pigeons) }}</b></p> --}}
                            {{-- <p>Jumlah Pigeon : <b style="color: red">{{ $count_pigeon }}</b></p> --}}
                            <p>Jumlah Lomba : <b style="color: red">{{ count($events) }}</b></p>
                            
                                <p>Manager club : <b style="color: red">{{ $clubs->manager->name }}
                                    ({{ $clubs->manager->username }})</b></p>
                                    @if (count($join_operator) != 0)
                                    @foreach ($join_operator as $item)
                                    <p>Operator Club {{ $loop->index + 1 }} : <b style="color: red">{{ $item->name }}
                                        ({{ $item->username }})</b>
                                        @if (Auth::user()->id == $clubs->manager_club)
                                        | <a class="delete" href="/club/delete-operator/{{ $item->operator_id }}"><i
                                            class="fa fa-trash"></i> Delete</a>

                                            @endif
                                        </p>
                                        @endforeach
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-12">
                                {{-- bagian statistik --}}
                            </div>
                        </div>
                        {{-- <div class="row" style="margin-bottom: 20px">
                            <div class="col-12">
                                
                                <h4>List Loft</h4>
                                <div class="box-body">
                                    <table id="table_two" class="table table-bordered table-striped">
                                        <thead>
                                            <th>No.</th>
                                            <th>Nama Pemilik</th>
                                            <th>Nama Loft</th>
                                            <th>Tanggal Join</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            
                                                @foreach ($list_pigeons as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->user->name_loft }}</td>
                                                    <td>{{ date('d F Y  H:i:s', strtotime($item->updated_at)) }}</td>
                                                    <td class="action-link">
                                                       
                                                        <a href="/club/desc_loft/{{ $item->id_user }}/{{ $clubs->id }}"
                                                            title="Details" class="mx-1"><i class="fa fa-list-alt"
                                                            aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row" style="margin-bottom: 20px">
                                    <div class="col-12">
                                        <h4>List Event Club </h4>
                                        <div class="box-body">
                                            <div class="row" style="margin-bottom: 20px">
                                                <div class="col-12">
                                                    <table id="example1" class="table table-bordered table-striped">
                                                        <thead>
                                                            <th>No.</th>
                                                            <!-- <th>ID</th> -->
                                                            <th>Nama</th>
                                                            <th>Logo</th>
                                                            <!-- <th>Jenis Lomba</th> -->
                                                            <!-- <th>Kategori</th> -->
                                                            <th>Info</th>
                                                            <th>Negara</th>
                                                            <th>Lokasi Mulai</th>
                                                            <!-- <th>Lokasi Selesai</th> -->
                                                            <th>Alamat</th>
                                                            <th>Mulai</th>
                                                            <!-- <th>Selesai</th> -->
                                                            <th>Harga Pendaftaran</th>
                                                            <th>Batas Pendaftaran</th>
                                                            <th>Status</th>
                                                            {{-- <th>Hotspot</th> --}}
                                                            <th>Aksi</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($events as $event)
                                                            <tr>
                                                                <td>{{ $loop->index + 1 }}</td>
                                                                <!-- <td>{{ $event->id }}</td> -->
                                                                <td><a href="/club/event-club/{{ $event->id }}" class="text-info">{{ $event->name_event }}</a></td>
                                                                @php $path = Storage::url('image-logo/'.$event->logo_event); @endphp
                                                                <td><a href="/club/event-club/{{ $event->id }}"><img src="{{ asset('image/'.$event->logo_event.'') }}" style="max-height: 80px; height: auto; width: auto;"></a></td>
                                                                <!-- <td>{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</td> -->
                                                                <!-- <td>{{ $event->category_event }}</td> -->
                                                                <td>{{ $event->info_event }}</td>
                                                                <td>{{ $event->country_event }}</td>
                                                                <td>{{ $event->lat_event ? '(' . $event->lat_event . '), (' . $event->lng_event . ')' : '-' }}
                                                                </td>
                                                                <!-- <td>{{ $event->lat_event_end ? '(' . $event->lat_event_end . '), (' . $event->lng_event_end . ')' : '-' }} -->
                                                                </td>
                                                                <td>{{ $event->address_event ? $event->address_event : '-' }}</td>
                                                                @foreach($event->event_hotspot as $hotspot)
                                                                @if($hotspot->release_time_hotspot)
                                                                <td>{{ $hotspot ? str_replace('T', ' ', date('d F Y  H:i:s', strtotime($hotspot->release_time_hotspot))) : '-' }}</td>
                                                                <!-- <td>{{ $hotspot->expired_time_hotspot ? str_replace('T', ' ', date('d F Y  H:i:s', strtotime($hotspot->expired_time_hotspot))) : '-' }}</td> -->
                                                                @break
                                                                @endif
                                                                @endforeach 
                                                                <td>Rp {{ number_format($event->price_event, 2) }}</td>
                                                                <td>{{ $event ? str_replace('T', ' ', date('d F Y  H:i:s', strtotime($event->due_join_date_event))) : '-' }}</td>
                                                                <td style="color: {{ $event->color ? $event->color : '' }};">{{ $event ? $event->status : '-' }}</td>
                                                                {{-- <td>{{ $event->hotspot_length_event }}</td> --}}
                                                                <td class="action-link">
                                                                    @if (Auth::user()->id == $clubs->manager_club || $exist == 1)
                                                                    <div style="display: inline-flex;">
                                                                        <a href="#" title="Edit" data-toggle="modal" class="text-danger mx-1" data-target="#editModal{{ $event->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                                        <a href="#" title="Hapus" data-toggle="modal" class="text-danger mx-1" data-target="#deleteModal{{ $event->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                    </div>
                                                                    @endif
                                                                    <div style="display: inline-flex;">
                                                                        <a href="/club/events/{{$event->id}}/1/basket" title="Proses Inkorf" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                                        <a href="/club/events/{{$event->id}}/1/live-result" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                                                                        <a href="#" title="Set Titik Lokasi" class="mx-1" data-toggle="modal" data-target="#setPoint{{$event->id}}">
                                                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <!-- Modal Set Point -->
                                                                <div class="modal fade" id="setPoint{{$event->id}}" tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="exampleModalLabel">Set Titik Lokasi Lomba</h4>
                                                                            </div>
                                                                            <form action="">
                                                                                <div class="modal-body">
                                                                                    <h5>URL Titik Lokasi Mulai</h5>
                                                                                    <p class="text-info">http://pigeontime.live/event-start/{{$event->id}}/&lt;latitude&gt;/&lt;longitude&gt;</p>
                                                                                    <p>contoh:<br>http://pigeontime.live/event-start/{{$event->id}}/-7.893274649955687/112.67354622885584</p>
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

                                                                <!-- Hotspot Modal -->
                                                                <div class="modal fade" id="hotspotModal{{ $event->id }}" tabindex="-1"
                                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="exampleModalLabel">Daftar
                                                                                Hotspot</h4>
                                                                            </div>
                                                                            <form action="/club/event/update-hotspot" method="POST">
                                                                                <div class="modal-body">
                                                                                    {{ csrf_field() }}
                                                                                    @foreach ($event->event_hotspot as $hotspot)
                                                                                    <div class="h4">
                                                                                        <b>{{ 'Hotspot ' . ($loop->index + 1) }}</b>
                                                                                        @if (count($event->event_hotspot) > 1)
                                                                                        <a href="#" data-toggle="modal"
                                                                                        data-target="#deleteHotspot{{ $hotspot->id }}"
                                                                                        class="text-danger"><i
                                                                                        class="fa fa-trash"
                                                                                        aria-hidden="true"></i></a>
                                                                                        @endif
                                                                                    </div>
                                                                                    <input type="hidden" name="ids[]"
                                                                                    value="{{ $hotspot->id }}">
                                                                                    <div class="form-group">
                                                                                        <label for="">Waktu Mulai Lomba</label>
                                                                                        <input type="datetime-local" step="1"
                                                                                        name="release_time_hotspots[]"
                                                                                        class="form-control"
                                                                                        placeholder="Isi waktu mulai lomba"
                                                                                        required
                                                                                        value="{{ $hotspot->release_time_hotspot ? date('Y-m-d\TH:i:s', strtotime($hotspot->release_time_hotspot)) : '' }}">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Waktu Selesai Lomba</label>
                                                                                        <input type="datetime-local" step="1"
                                                                                        name="expired_time_hotspots[]"
                                                                                        class="form-control"
                                                                                        placeholder="Isi waktu selesai lomba"
                                                                                        value="{{ $hotspot->expired_time_hotspot ? date('Y-m-d\TH:i:s', strtotime($hotspot->expired_time_hotspot)) : '' }}">
                                                                                    </div>

                                                                                    <!-- Delete Hotspot -->
                                                                                    <div class="modal fade"
                                                                                    id="deleteHotspot{{ $hotspot->id }}"
                                                                                    tabindex="-1" role="dialog"
                                                                                    aria-labelledby="exampleModalLabel"
                                                                                    aria-hidden="true">
                                                                                    <div class="modal-dialog" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h4 class="modal-title"
                                                                                                id="exampleModalLabel">
                                                                                                Konfirmasi Hapus Data
                                                                                            Hotspot</h4>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            {{ csrf_field() }}
                                                                                            Apakah anda yakin ingin
                                                                                            menghapus Hotspot
                                                                                            {{ $loop->index + 1 }}?
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <div
                                                                                            class="form-group d-flex justify-content-end">
                                                                                            <a href="/club/event/delete-hotspot/{{ $hotspot->id }}/{{ $event->id }}"
                                                                                                class="btn btn-primary">Hapus</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- End Delete Hotspot -->
                                                                            @endforeach
                                                                        </div>
                                                                        <div
                                                                        class="modal-footer d-flex justify-content-between">
                                                                        <a href="#" class="btn btn-warning"
                                                                        data-toggle="modal"
                                                                        data-target="#addHotspot{{ $event->id }}"><span
                                                                        class="font-weight-bold ml-1">Tambah
                                                                    Hotspot</span></a>
                                                                    <input type="submit" value="Simpan"
                                                                    class="btn btn-primary">
                                                                    <button class="btn btn-secondary" type="button"
                                                                    data-dismiss="modal">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Hotspot Modal -->

                                                <!-- Add Hotspot Modal -->
                                                <div class="modal fade" id="addHotspot{{ $event->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Tambah
                                                                Hotspot</h4>
                                                            </div>
                                                            <form action="/club/event/add-hotspot" method="POST">
                                                                <div class="modal-body">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id_event"
                                                                    value="{{ $event->id }}">
                                                                    <div class="form-group">
                                                                        <label for="">Waktu Mulai Lomba</label>
                                                                        <input type="datetime-local" step="1"
                                                                        name="release_time_hotspot"
                                                                        class="form-control"
                                                                        placeholder="Isi waktu mulai lomba"
                                                                        required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Waktu Selesai Lomba</label>
                                                                        <input type="datetime-local" step="1"
                                                                        name="expired_time_hotspot"
                                                                        class="form-control"
                                                                        placeholder="Isi waktu selesai lomba">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="form-group d-flex justify-content-end">
                                                                        <input type="submit" value="Simpan"
                                                                        class="btn btn-primary">
                                                                        <button class="btn btn-secondary" type="button"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Add Hotspot Modal -->

                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="editModal{{ $event->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Edit Data
                                                                Lomba</h4>
                                                            </div>
                                                            <form action="/club/event/update/{{ $event->id }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    {{ csrf_field() }}
                                                                    <div class="form-group">
                                                                        <label for="">Nama Lomba</label>
                                                                        <input type="text" name="name_event"
                                                                        class="form-control"
                                                                        placeholder="Isi nama lomba" required
                                                                        value="{{ $event->name_event }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="logo_event">Logo Lomba</label>
                                                                        <input type="file" name="logo_event"
                                                                        class="form-control"
                                                                        placeholder="Isi logo lomba"
                                                                        value="{{ $event->logo_event }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="category_event">Kategori
                                                                        Lomba</label>
                                                                        <select class="form-control"
                                                                        name="category_event">
                                                                        <option value="" disabled selected>-- Pilih
                                                                        kategori --</option>
                                                                        @php
                                                                        $categories = array('Individu', 'Team');
                                                                        @endphp
                                                                        @foreach ($categories as $category)
                                                                        @if ($category == $event->category_event)
                                                                        <option value="{{ $category }}"
                                                                        selected>Lomba {{ $category }}
                                                                    </option>
                                                                    @else
                                                                    <option value="{{ $category }}">
                                                                    Lomba {{ $category }}</option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Informasi Tentang Lomba</label>
                                                                <textarea name="info_event" class="form-control"
                                                                required=""
                                                                placeholder="Isi informasi lomba">{{ $event->info_event }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Negara</label>
                                                                <select name="country_event" class="form-control" required>
                                                                  <option value="">-- Pilih Negara --</option>
                                                                  @foreach($negara as $value)
                                                                    <option value="{{$value->nicename }}" @if($event->country_event==$value->nicename) selected @endif>{{$value->nicename}} ({{ $value->iso }}) </option>
                                                                  @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Harga Pendaftaran Lomba</label>
                                                                <input type="number" name="price_event"
                                                                class="form-control"
                                                                placeholder="Isi harga pendaftaran lomba"
                                                                required step=100
                                                                value="{{ $event->price_event }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Batas Waktu Pendaftaran</label>
                                                                <input type="datetime-local" step="1"
                                                                id="due_join_date_event_update"
                                                                name="due_join_date_event"
                                                                class="form-control"
                                                                placeholder="Isi batas pendaftaran lomba"
                                                                value="{{ $event->due_join_date_event }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="form-group d-flex justify-content-end">
                                                                <input type="submit" value="Simpan"
                                                                class="btn btn-primary">
                                                                <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Edit Modal -->

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel">
                                                        Konfirmasi Hapus Data Lomba</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ csrf_field() }}
                                                        Apakah anda yakin ingin menghapus
                                                        {{ $event->name_event }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="form-group d-flex justify-content-end">
                                                            <a href="/club/event/delete/{{ $event->id }}"
                                                                class="btn btn-primary">Hapus</a>
                                                                <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Batal</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Delete Modal -->
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>

@endsection
@push('bottom-script')
<script src="{{ url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $('#example1').DataTable({
            'scrollX': true,
        })
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'scrollX': true,
        })
    })

</script>

<script>
    function setMaxDueDateAdd() {
        var release_time = document.getElementById("release_time_event_add").value;
        document.getElementById("due_join_date_event_add").max = release_time;
    }

</script>
<script>
	window.setTimeout("waktu()", 1000);
 
	function waktu() {
		var waktu = new Date();
		setTimeout("waktu()", 1000);
		document.getElementById("jam").innerHTML = waktu.getHours();
		document.getElementById("menit").innerHTML = waktu.getMinutes();
		document.getElementById("detik").innerHTML = waktu.getSeconds();
	}
</script>
@endpush
