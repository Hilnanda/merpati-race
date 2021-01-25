@extends('subscribed.layout.subscribed')

@section('title')
    Club
@endsection

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>List Club</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->
<div class="row mt-5 px-5">
    <div class="col-12">
        @if ($id_user->lat_loft == '' && $id_user->lng_loft == '')
        <a href="#edit_user" data-toggle="modal" data-target="#edit_user"><button type="button"
            class="btn elementor-button-red elementor-size-md elementor-animation-grow mb-2"> Input Lokasi</button></a>
        @else
        <a href="#edit_user_lokasi" data-toggle="modal" data-target="#edit_user_lokasi"><button type="button"
            class="btn elementor-button-red elementor-size-md elementor-animation-grow mb-2"> Edit Lokasi</button></a>
        @endif
        
            <div class="modal fade" id="edit_user" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Lokasi</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/club/latlong" method="GET">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $auth }}">
                                <label for="">Lattitude</label>
                                <input type="text" name="lat_loft" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label for="">Longtitude</label>
                                <input type="text" name="lng_loft" class="form-control">
                                
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Simpan" class="btn elementor-button-blue elementor-size-md elementor-animation-grow">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
                        data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit_user_lokasi" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Lokasi</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/club/latlong" method="GET">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $auth }}">
                                <label for="">Lattitude</label>
                                <input type="text" name="lat_loft" class="form-control" value="{{ $id_user->lat_loft }}">
                                
                            </div>
                            <div class="form-group">
                                <label for="">Longtitude</label>
                                <input type="text" name="lng_loft" class="form-control" value="{{ $id_user->lng_loft }}">
                                
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Simpan" class="btn elementor-button-blue elementor-size-md elementor-animation-grow">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
                        data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-12">        <!-- /.box-header -->       
        <div class="box-body">
            <h4>Users Details</h4>           
                <p>Nama : <b style="color: red">{{ $id_user->name }}
                        </b></p>
                <p>Username : <b style="color: red">{{ $id_user->username }}</b></p>
                @if ($id_user->lat_loft != '' && $id_user->lng_loft != '')
                <p>Posisi : <b style="color: red">{{ $id_user->lat_loft }} ,
                    {{ $id_user->lng_loft }}</b></p>
                @endif
                
                <p>Email : <b style="color: red">{{ $id_user->email }}</b></p>
                <p>Negara : <b style="color: red">{{ $id_user->country_user }}</b></p>                
        </div>
    </div>
</div>
<div class="row mt-5 px-5">
    <div class="col-lg-12"> 
        <h4>List Pigeons</h4>       <!-- /.box-header -->       
        <div class="box-body">
            <table id="table_four" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>                           
                    <th>UID Pigeon</th>
                    <th>Nama Pigeon</th>
                    <th>Ring Size Pigeon</th>
                    <th>Jenis Kelamin</th>
                    <th>Warna</th>
                    <th>Tanggal Join</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    {{-- @if (count($list_pigeons) == 0)
                        <tr class="text-center">
                            <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                        </tr>
                    @endif --}}
                    @foreach ($id_pigeon as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>                                  
                            <td>{{ $item->uid_pigeon }}</td>
                            <td>{{ $item->name_pigeon }}</td>
                            <td>{{ $item->ring_size_pigeon }}</td>
                            <td>{{ $item->sex_pigeon }}</td>
                            <td>{{ $item->color_pigeon }}</td>
                            <td>{{ date('d F Y  H:i:s', strtotime($item->updated_at)) }}</td>
                            <td class="action-link">
                            <a href="/pigeon/detail/{{$item->id_user}}/{{$item->id_pigeon}}" title="Details" class="mx-1"><i class="fa fa-list-alt"
                                        aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        
    </div>
</div>

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>List Club</h4>
        <div class="box-body">
            <table id="list_club" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Club</th>
                    <th>Pemilik Club</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    {{-- @if(count($clubku) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                    </tr>
                    @endif --}}
                    
                    @foreach($clubku as $item)
                    <tr>
                        <td></td>
                        <td>{{ $item->name_club }}</td>
                        <td>{{ $item->manager->name }}</td>
                        {{-- <td>({{ $item->lat_club }}), ({{ $item->lng_club }})</td> --}}
                        <td>{{ $item->address_club }}</td>
                        <td><b style="color: #0a9421">Manajer Club</b></td>
                        <td class="action-link">
                            {{-- <a href="/club/lihat_data/{{$item->id}}" title="Event Club" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a> --}}
                            <a href="club/{{$item->id}}/detail_saya" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @foreach($club_ikut as $item)
                    <tr>
                        <td></td>
                        <td>{{ $item->club->name_club }}</td>
                        <td>{{ $item->club->user->name }}</td>
                        {{-- <td>({{ $item->club->lat_club }}), ({{ $item->club->lng_club }})</td> --}}
                        <td>{{ $item->club->address_club }}</td>
                        <td><b style="color: #0105e2">Anggota</b></td>
                        @if ($item->is_active == 0)
                        <td>Pending</td>
                        @else
                        <td class="action-link">
                            {{-- <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a> --}}
                            <a href="club/{{$item->id_club}}/detail_saya" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>

                            {{-- <a href="club/{{$item->id_club}}/detail_ikut" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a> --}}
                        </td>
                        @endif
                        
                    </tr>
                    @endforeach
                    @foreach($club_id as $items)
                    <tr>
                        <td> </td>
                        <td>{{ $items->name_club }}</td>
                        <td>{{ $items->manager->name }}</td>
                        <td>{{ $items->address_club }}</td>
                        <td><b style="color: #e20101">Belum Gabung</b></td>
                        <td class="action-link">

                                <a href="/club/{{$items->id}}/detail_belum_ikut" title="Details" class="mx-1"><i class="fa fa-list-alt"
                                    aria-hidden="true"></i></a>
                                    {{-- <a href="#tambah_jenisstandar{{ $items->id }}"  data-toggle="modal"
                                        data-target="#tambah_jenisstandar{{ $items->id }}"><i class="fa fa-list-alt"
                                        aria-hidden="true"></i></a> --}}
                            {{-- <a href="#" title="Join" class="mx-1"><i class="fa fa-sign-in"
                                    aria-hidden="true"></i></a> --}}
                                    {{-- <a href="/club/join_loft_club/{{$items->id}}/{{ $auth }}" title="Join" class="mx-1 join"><i class="fa fa-sign-in"
                                        aria-hidden="true"></i></a> --}}
                                    
                            
                            
                        </td>
                    </tr>

                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
{{-- <div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Club Yang Di Ikuti</h4>
        <div class="box-body">
            <table id="table_two" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Club</th>
                    <th>Pemilik Club</th>
                    <th>Alamat</th>
                    <th>Loft Saya</th>
                    <th>Tgl Join</th>
                    <th>Aksi</th>
                </thead>
                <tbody>                   
                    
                    @foreach($club_ikut as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->club->name_club }}</td>
                        <td>{{ $item->club->user->name }}</td>
                        <td>{{ $item->club->address_club }}</td>
                        <td>{{ $item->user->name_loft }}</td>
                        <td>{{ date('d F Y  H:i:s', strtotime($item->created_at)) }}</td>                        
                        @if ($item->is_active == 0)
                        <td>Pending</td>
                        @else
                        <td class="action-link">
                            <a href="club/{{$item->id_club}}/detail_saya" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>

                        </td>
                        @endif
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div> --}}
{{-- <div class="row mt-5 px-5 mb-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Club Yang Belum Di Ikuti</h4>
        <div class="box-body">
            <table id="table_three" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Club</th>
                    <th>Pemilik Club</th>
                    <th>Tanggal Club</th>                   
                    
                    <th>Aksi</th>
                </thead>
                <tbody>
                    
                    @foreach($club_id as $items)
                    <tr>
                        <td>{{ $loop->index+1 }} </td>
                        <td>{{ $items->name_club }}</td>
                        <td>{{ $items->manager->name }}</td>
                        <td>{{ date('d F Y  H:i:s', strtotime($items->created_at)) }}</td>
                        <td class="action-link">

                                <a href="/club/{{$items->id}}/detail_belum_ikut" title="Details" class="mx-1"><i class="fa fa-list-alt"
                                    aria-hidden="true"></i></a>
                                    
                                    <a href="/club/join_loft_club/{{$items->id}}/{{ $auth }}" title="Join" class="mx-1 join"><i class="fa fa-sign-in"
                                        aria-hidden="true"></i></a>
                                    
                            
                            
                        </td>
                    </tr>

                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div> --}}
<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>List Event</h4>
        <div class="box-body" style="overflow-x:auto;">
            <table id="table_two" class="table table-bordered table-striped" >
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
                        <td class="action-link"><a href="/club/event-club/{{ $event->id }}" style="font-size: 14px;">{{ $event->name_event }}</a></td>
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
                        <td style="color: {{ $event->color ? $event->color : '' }};">
                            <strong>{{ $event ? $event->status : '-' }}</strong>
                            @if($event->status != 'Terbang')
                            <br>
                            <br>
                            <a href="#" title="Mulai Lomba" data-toggle="modal" class="btn-sm btn-warning" data-target="#startRace{{ $event->id }}">Mulai</a>
                            @endif
                        </td>
                        {{-- <td>{{ $event->hotspot_length_event }}</td> --}}
                        <td class="action-link">
                            @if (Auth::user()->id == $event->club->manager_club)
                            <div style="display: inline-flex;">
                                <a href="#" title="Edit" data-toggle="modal" class="text-danger mx-1" data-target="#editModal{{ $event->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="#" title="Hapus" data-toggle="modal" class="text-danger mx-1" data-target="#deleteModal{{ $event->id }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                            @endif
                            <div style="display: inline-flex;">
                                @if($event->lng_event && $event->lat_event)
                                <a href="/club/events/{{$event->id}}/1/basket" title="Proses Inkorf" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                @endif
                                @if($event->status == 'Terbang')
                                <a href="/club/events/{{$event->id}}/1/live-result" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                                @endif
                                <!-- <a href="#" title="Set Titik Lokasi" class="mx-1" data-toggle="modal" data-target="#setPoint{{$event->id}}">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                </a> -->
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
                                            {{-- <h5>URL Titik Lokasi Mulai</h5>
                                            <p class="text-info">http://pigeontime.live/event-start/{{$event->id}}/&lt;latitude&gt;/&lt;longitude&gt;</p>
                                            <p>contoh:<br>http://pigeontime.live/event-start/{{$event->id}}/-7.893274649955687/112.67354622885584</p> --}}
                                        </div>
                                        <div class="modal-footer">
                                            <div class="form-group d-flex justify-content-end">
                                                <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
                                                data-dismiss="modal">Cancel</button>
                                                <input type="submit" value="Selesai" class="btn elementor-button-red elementor-size-md elementor-animation-grow">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Set Point -->

                        <!-- Modal Start Race -->
                        <div class="modal fade" id="startRace{{$event->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Set Mulai Lomba</h4>
                                    </div>
                                    <form action="">
                                        <div class="modal-body">
                                            <div class="form-group d-flex justify-content-between">
                                                <a href="/club/event/close-join/{{$event->id}}" title="Tutup pendaftaran sekarang" class="btn elementor-button-red elementor-size-md elementor-animation-grow">Tutup Pendaftaran</a>
                                                <a href="/club/event/start-now/{{$event->id}}/{{$event->event_hotspot[0]->id}}" title="Mulai lomba sekarang" class="btn elementor-button-blue elementor-size-md elementor-animation-grow">Mulai Sekarang</a>
                                                <a href="#" title="Atur kembali jadwal mulai" data-toggle="modal" class="btn elementor-button-black elementor-size-md elementor-animation-grow" data-dismiss="modal" data-target="#startLater{{ $event->id }}">Atur Jadwal</a>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="form-group d-flex justify-content-end">
                                                <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
                                                data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Start Race -->

                        <!-- Modal Start Later -->
                        <div class="modal fade" id="startLater{{$event->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Set Mulai Lomba</h4>
                                    </div>
                                    <form action="/club/event/set-release/{{$event->event_hotspot[0]->id}}" method="POST">
                                        <div class="modal-body">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="">Waktu Mulai Lomba</label>
                                                <input type="datetime-local" step="1"
                                                id="release_time_hotspot_update"
                                                name="release_time_hotspot"
                                                class="form-control"
                                                placeholder="Isi waktu mulai lomba"
                                                value="{{ $event->release_time_event }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="form-group d-flex justify-content-end">
                                                <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
                                                data-dismiss="modal">Cancel</button>
                                                <input type="submit" value="Simpan" class="btn elementor-button-blue elementor-size-md elementor-animation-grow">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Start Later -->

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
                                                        class="btn elementor-button-red elementor-size-md elementor-animation-grow">Hapus</a>
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
                            class="btn elementor-button-blue elementor-size-md elementor-animation-grow">
                            <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
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
                                class="btn elementor-button-blue elementor-size-md elementor-animation-grow">
                                <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button" data-dismiss="modal">Cancel</button>
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
                        <label for="lng_event">Longitude Lomba</label>
                        <input type="text" name="lng_event"
                        class="form-control"
                        placeholder="Isi lokasi longitude lomba"
                        value="{{ $event->lng_event }}">
                    </div>
                    <div class="form-group">
                        <label for="lat_event">Latitude Lomba</label>
                        <input type="text" name="lat_event"
                        class="form-control"
                        placeholder="Isi lokasi latitude lomba"
                        value="{{ $event->lat_event }}">
                    </div>
                    <div class="form-group">
                        <label for="address_event">Alamat Lomba</label>
                        <input type="text" name="address_event"
                        class="form-control"
                        placeholder="Isi alamat lomba"
                        value="{{ $event->address_event }}">
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
                        class="btn elementor-button-blue elementor-size-md elementor-animation-grow">
                        <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
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
                        class="btn elementor-button-red elementor-size-md elementor-animation-grow">Hapus</a>
                        <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
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
     


<div style="margin-bottom: 100px"></div>
@endsection

@push('bottom-script')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            var t = $('#list_club').DataTable({
                "aaSorting": [[1,'asc']]
            });
            t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
                } );
            } ).draw();
        });

    </script>
@endpush