@extends('subscribed.layout.subscribed')
@section('title')
    Lomba
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>My Loft</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Data Pigeons</h4>
        {{-- <button class="btn btn-info w-100" data-toggle="modal" data-target="#tambah_burung">Daftarkan Burung</button> --}}
        <button class="btn btn-info  mt-3" data-toggle="modal" data-target="#tambah_burung">Buat Training</button>
        {{-- <div id="accordion" class="mt-3">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h5>Keterangan Klub</h5>
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
        </div> --}}
              {{-- <div class="modal fade" id="tambah_burung" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Daftar Burung Baru</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/pigeons/create" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                                <div class="form-group">
                                    <label for="">UID Burung</label>
                                    <input type="text" name="uid_pigeon" class="form-control" placeholder="Isi uid burung" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Ukuran Cincin</label>
                                    <input type="number" name="ring_size_pigeon" class="form-control" placeholder="Isi ukuran cincin" required step=0.01>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Burung</label>
                                    <input type="text" name="name_pigeon" class="form-control" placeholder="Isi nama burung" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="sex_pigeon" class="form-control">
                                        <option value="Jantan">Jantan</option>
                                        <option value="Betina">Betina</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Warna</label>
                                    <input type="text" name="color_pigeon" class="form-control" placeholder="Isi warna burung" required>
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
              </div> --}}
         {{-- <div class="box-body mt-3 mb-5">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>UID Burung</th>
                    <th>Ukuran Cincin</th>
                    <th>Nama Burung</th>
                    <th>Jenis Kelamin</th>
                    <th>Warna</th>
                    <th>Status</th>
                    <th>Club</th>                    
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach($burung as $bird)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$bird->uid_pigeon}}</td>
                        <td>{{$bird->ring_size_pigeon}}</td>
                        <td>{{$bird->name_pigeon}}</td>
                        <td>{{$bird->sex_pigeon}}</td>
                        <td>{{$bird->color_pigeon}}</td>
                        <td>@if($bird->is_active==0) Belum Aktif @else Aktif @endif</td>
                        <td>{{!empty($bird->club_member->first()) ? $bird->club_member->first()->club->first()->name_club:"-"}}</td>
                        <td>{{!empty($bird->team_member->first()) ? $bird->team_member->first()->team->first()->name_team:"-"}}</td>
                        <td><a href="#editBurungModal{{$bird->id}}" class="btn btn-warning btn-sm" data-toggle="modal"
                            data-target="#editBurungModal{{$bird->id}}"><i class="fa fa-pen" aria-hidden="true">
                            </i> <span class="font-weight-bold ml-1">Edit</span></a> 
                            <a href="/pigeons/delete/{{$bird->id}}"
                            class="btn btn-danger btn-sm delete-club">
                            <i class="fa fa-trash" aria-hidden="true"></i><span
                                class="font-weight-bold ml-1">Hapus</span></a>
                                <a href="/pigeons/detail/{{$bird->id}}"
                                class="btn btn-info btn-sm">
                                <i class="fa fa-eye" aria-hidden="true"></i><span
                                    class="font-weight-bold ml-1">Detail</span></a>
                            </td>
                                <div class="modal fade" id="editBurungModal{{$bird->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Burung</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/pigeons/edit" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $bird->id }}">
                                                    <div class="form-group">
                                                        <label for="">UID Burung</label>
                                                        <input type="text" name="uid_pigeon" class="form-control" placeholder="Isi uid burung" required value="{{ $bird->uid_pigeon }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Ukuran Cincin</label>
                                                        <input type="number" name="ring_size_pigeon" class="form-control" placeholder="Isi ukuran cincin" required step=0.01 value="{{ $bird->ring_size_pigeon }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Nama Burung</label>
                                                        <input type="text" name="name_pigeon" class="form-control" placeholder="Isi nama burung" required value="{{ $bird->name_pigeon }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Jenis Kelamin</label>
                                                        <select name="sex_pigeon" class="form-control">
                                                            <option value="Jantan" @if($bird->sex_pigeon=="Jantan") selected @endif>Jantan</option>
                                                            <option value="Betina" @if($bird->sex_pigeon=="Betina") selected @endif>Betina</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Warna</label>
                                                        <input type="text" name="color_pigeon" class="form-control" placeholder="Isi warna burung" required value="{{ $bird->color_pigeon }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" value="Edit data" class="btn btn-info">
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
        <!-- /.box-body -->
    </div>
</div>

@endsection