@extends('subscribed.layout.subscribed')

@section('title')
    Detail Club
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url(image/breadcumb-1.jpg);">
        <div class="bradcumbContent">
            <h2>List Club</h2>
        </div>
    </div>
    <!-- bg gradients -->
    <div class="bg-gradients"></div>
    <!-- ##### Breadcumb Area End ##### -->

    <div class="row mt-5 px-5">
        <div class="col-lg-12">
            <!-- /.box-header -->
            <h4>Detail Club Saya</h4>
            <div class="box-body">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-12">
                        <a href="#"><button type="button" class="btn btn-danger"><i class="fa fa-twitter"></i> Join Pigeon</button></a>
                        @if (Auth::user()->id==$clubs->manager_club)
                            <a href="#"><button type="button" class="btn btn-success">Buat Training</button></a>
                                                        
                            <a href="/club/manager/{{$id}}"><button type="button" class="btn btn-primary">Permintaan Gabung</button></a>
                            
                        @endif
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
                                    <h4>Club Details</h4>
                                    <h5>Nama club : <b style="color: red">{{ $clubs->name_club }}</b></h5>
                                    <h5>Alamat club: <b style="color: red">{{ $clubs->address_club }}</b></h5>
                                    <h5>Posisi club: <b style="color: red">{{ $clubs->lat_club }} , {{ $clubs->lng_club }}</b></h5>
                                    <h5>Manager club: <b style="color: red">{{ $clubs->manager->username }}</b></h5>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-12">
                        {{-- bagian statistik --}}
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-12">
                        {{-- bagian list burung --}}
                        <h4>List Pigeon</h4>
                        <div class="box-body">
                            <table id="table_two" class="table table-bordered table-striped">
                                <thead>
                                    <th>No.</th>
                                    <th>Nama Club</th>
                                    <th>Lokasi Mulai</th>
                                    <th>Alamat</th>
                                    <th>Nama Pigeon</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    {{-- @if (count($club_ikut) == 0)
                                        <tr class="text-center">
                                            <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                                        </tr>
                                    @endif
                                    @foreach ($club_ikut as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->name_club }}</td>
                                            <td>({{ $item->lat_club }}), ({{ $item->lng_club }})</td>
                                            <td>{{ $item->address_club }}</td>
                                            <td>{{ $item->name_pigeon }}</td>
                                            <td class="action-link">
                                                <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol"
                                                        aria-hidden="true"></i></a>
                                                <a href="club/{{ $item->id }}/detail_ikut" title="Details" class="mx-1"><i
                                                        class="fa fa-list-alt" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-12">
                        {{-- bagian list lomba --}}
                        <h4>List Hasil Lomba</h4>
                        <div class="box-body">
                            <table id="table_three" class="table table-bordered table-striped">
                                <thead>
                                    <th>No.</th>
                                    <th>Nama Club</th>
                                    <th>Lokasi Mulai</th>
                                    <th>Alamat</th>
                                    <th>Nama Burung</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    {{-- @if (count($club_ikut) == 0)
                                        <tr class="text-center">
                                            <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                                        </tr>
                                    @endif
                                    @foreach ($club_ikut as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->name_club }}</td>
                                            <td>({{ $item->lat_club }}), ({{ $item->lng_club }})</td>
                                            <td>{{ $item->address_club }}</td>
                                            <td>{{ $item->name_pigeon }}</td>
                                            <td class="action-link">
                                                <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol"
                                                        aria-hidden="true"></i></a>
                                                <a href="club/{{ $item->id }}/detail_ikut" title="Details" class="mx-1"><i
                                                        class="fa fa-list-alt" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>

@endsection
