@extends('subscribed.layout.subscribed')
@section('title')
    Club
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Club Details</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->
<div class="row mt-5 px-5 mb-5">
    <div class="col-12">
        {{-- @foreach ($team as $item) --}}
        <div class="row" >
            <div class="col-12 d-flex justify-content-between">
                @foreach ($club as $item)
                <h4>Club Details</h4>
                {{-- @if (count($pigeon)!=0)            
                    <a href="#tambah_jenisstandar{{ $item->id }}" class="btn btn-primary" data-toggle="modal"
                        data-target="#tambah_jenisstandar{{ $item->id }}">Join Club</a>
                        @endif      --}}
                        <a href="/club/join_loft_club/{{$item->id}}/{{ $auth }}" style="text-align: center" class="mx-1 musica-btn join">Join</a>
            </div>
        </div>
        <p>Nama Club : <b style="color: red">{{ $item->name_club }}</b></p>
        <p>Alamat Club : <b style="color: red">{{ $item->address_club }}</b></p>
        <p>Pemilik Club : <b style="color: red">{{ $item->user->username }}</b></p>
        <p>Negara : <b style="color: red">{{ $item->country_clubs }}</b> </p>
                            
        
        @endforeach
        <div class="row" style="margin-bottom: 20px;margin-top: 60px">
            <div class="col-12">
                {{-- bagian list burung --}}
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
                            {{-- @if (count($list_pigeons) == 0)
                                <tr class="text-center">
                                    <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                                </tr>
                            @endif --}}
                            @foreach ($list_pigeons as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>                                                                                   
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->user->name_loft }}</td>
                                    <td>{{ date('d F Y  H:i:s', strtotime($item->updated_at)) }}</td>
                                    <td class="action-link">
                                        <a href="/club/desc_loft/{{ $item->id_user }}/{{ $item->id_club }}"
                                            title="Details" class="mx-1"><i class="fa fa-list-alt"
                                                aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 20px">
            <div class="col-12">
                <!-- /.box-header -->
                <h4>List Event Club </h4>
                <div class="box-body">
                    <div class="row" style="margin-bottom: 20px">
                        <div class="col-12">
                            <table id="example1"  class="table table-bordered table-striped">
                                <thead>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Logo</th>
                                    <th>Jenis Lomba</th>
                                    <th>Kategori</th>
                                    <th>Info</th> 
                                    <th>Lokasi Mulai</th>
                                    <th>Lokasi Selesai</th>
                                    <th>Alamat</th>
                                    <th>Mulai</th>
                                    <th>Selesai</th>
                                    <th>Harga Pendaftaran</th>
                                    <th>Batas Pendaftaran</th>
                                    {{-- <th>Hotspot</th> --}}
                                    {{-- <th>Aksi</th> --}}
                                </thead>
                                <tbody>
                                    @foreach($events as $event)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $event->id }}</td>
                                        <td>{{ $event->name_event }}</td>
                                        @php $path = Storage::url('image-logo/'.$event->logo_event); @endphp
                                        <td><img src="{{ asset('image/'.$event->logo_event.'') }}" height="80px"></td>
                                        <td>{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</td>
                                        <td>{{ $event->category_event }}</td>
                                        <td>{{ $event->info_event }}</td>
                                        <td>{{ $event->lat_event ? '(' . $event->lat_event . '), (' . $event->lng_event . ')' : '-' }}</td>
                                        <td>{{ $event->lat_event_end ? '(' . $event->lat_event_end . '), (' . $event->lng_event_end . ')' : '-' }}</td>
                                        <td>{{ $event->address_event ? $event->address_event : '-' }}</td>
                                        @foreach($event->event_hotspot as $hotspot)
                                        @if($hotspot->release_time_hotspot)
                                        <td>{{ $hotspot ? str_replace('T', ' ', date('d F Y  H:i:s', strtotime($hotspot->release_time_hotspot))) : '-' }}</td>
                                        <td>{{ $hotspot->expired_time_hotspot ? str_replace('T', ' ', date('d F Y  H:i:s', strtotime($hotspot->expired_time_hotspot))) : '-' }}</td>
                                        @break
                                        @endif
                                        @endforeach 
                                        <td>Rp {{ number_format($event->price_event, 2) }}</td>
                                        <td>{{ $event ? str_replace('T', ' ', date('d F Y  H:i:s', strtotime($event->due_join_date_event))) : '-' }}</td>
                                        {{-- <td>{{ $event->hotspot_length_event }}</td> --}}
                                        {{-- <td>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#hotspotModal{{$event->id}}"><span class="font-weight-bold ml-1">Hotspot</span></a>
                                            <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#editModal{{$event->id}}"><span class="font-weight-bold ml-1">Edit</span></a> 
                                            <a href="#" class="btn btn-danger btn-sm delete-event" data-toggle="modal"
                                            data-target="#deleteModal{{$event->id}}"><span
                                            class="font-weight-bold ml-1">Hapus</span></a></td> --}}
        
                                            
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
</div>



@endsection
@push('bottom-script')
<script src="{{ url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
        $('#example1').DataTable({
            'scrollX'     : true,
        })
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'scrollX'     : true,
        })
    })
</script>

<script>
    function setMaxDueDateAdd() {
        var release_time = document.getElementById("release_time_event_add").value;
        document.getElementById("due_join_date_event_add").max = release_time;
    }
</script>
@endpush
