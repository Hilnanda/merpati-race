@extends('subscribed.layout.subscribed')

@section('title')
    Detail Club
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
        <div class="col-lg-12">
            <!-- /.box-header -->
            <h4>Detail Club Di ikuti</h4>
            <div class="box-body">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-12">
                        @foreach ($clubku as $ite)
                        @if (count($pigeon)!=0)
                        <a href="#join_pigeon" data-toggle="modal"
                        data-target="#join_pigeon"><button type="button" class="btn btn-danger"><i class="fa fa-twitter"></i> Join Pigeon</button></a>
                        @endif
                        <div class="modal fade" id="join_pigeon" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Join Pigeon</h5>
                                    <button class="close" type="button" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/club/join" method="POST">
                                    {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="">List Pigeon</label>
                                                <input type="hidden" name="id_club" value="{{ $ite->id }}">
                                                <select name="id_pigeon" class="form-control" required>
                                                    <option value="">-- Pilih Pigeon --</option>
                                                    @foreach($pigeon as $pigeons)
                                                            @if ($ite->id!=$pigeons->id_club)
                                                            {{-- <option value="{{$pigeons->id}}">{{$pigeons->uid_pigeon}} - {{$pigeons->name_pigeon}}</option> --}}
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
                        @if (isset($operator->id_user))
                            @if (Auth::user()->id==$operator->id_user)
                            <a href="#"><button type="button" class="btn btn-success">Buat Lomba Club</button></a>
                            <a href="/club/{{$clubs->id}}/permintaan_gabung"><button type="button" class="btn btn-primary">Permintaan Gabung</button></a>
                            @endif
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
                                    <p>Nama club : <b style="color: red">{{ $clubs->name_club }}</b></p>
                                    <p>Alamat club : <b style="color: red">{{ $clubs->address_club }}</b></p>
                                    {{-- <p>Posisi club : <b style="color: red">{{ $clubs->lat_club }} , {{ $clubs->lng_club }}</b></p> --}}
                                    <p>Manager club : <b style="color: red">{{ $clubs->manager->name }} ({{ $clubs->manager->username }})</b></p>
                                    @if (count($join_operator)!=0)
                                        @foreach ($join_operator as $item)
                                        <p>Operator Club {{ $loop->index + 1 }} : <b style="color: red">{{ $item->name }} ({{ $item->username }})</b> </p>    
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
                
                
                <div class="row" style="margin-bottom: 20px">
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
                                                <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol"
                                                        aria-hidden="true"></i></a>
                                                <a href="#" title="Details" class="mx-1"><i
                                                        class="fa fa-list-alt" aria-hidden="true"></i></a>
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
