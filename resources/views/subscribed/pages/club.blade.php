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
    <div class="col-lg-12">        <!-- /.box-header -->       
        <div class="box-body">
            <h4>Users Details</h4>           
                <p>Nama Pemilik : <b style="color: red">{{ $id_user->name }}
                        ({{ $id_user->username }})</b></p>
                <p>Nama Loft : <b style="color: red">{{ $id_user->name_loft }}</b></p>
                <p>Posisi Loft : <b style="color: red">{{ $id_user->lat_loft }} ,
                        {{ $id_user->lng_loft }}</b></p>
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
                            <a href="/pigeon/detail/{{$item->id_user}}/{{$item->id}}" title="Details" class="mx-1"><i class="fa fa-list-alt"
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