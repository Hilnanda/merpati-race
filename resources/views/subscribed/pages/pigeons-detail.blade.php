@extends('subscribed.layout.subscribed')
@section('title')
    Lomba
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Pigeons</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5 mb-3">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Detail Burungku</h4>
        <div id="accordion" class="mt-3">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <h5>Keterangan Burung</h5>
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <table id="" class="table table-bordered table-striped table-sm">
                    <thead>
                        <th>UID Burung</th>
                        <th>Ukuran Cincin</th>
                        <th>Nama Burung</th>
                        <th>Jenis Kelamin</th>
                        <th>Warna</th>
                        <th>Status</th>
                        <th>Club</th>
                        <th>Team</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$bird->uid_pigeon}}</td>
                            <td>{{$bird->ring_size_pigeon}}</td>
                            <td>{{$bird->name_pigeon}}</td>
                            <td>{{$bird->sex_pigeon}}</td>
                            <td>{{$bird->color_pigeon}}</td>
                            <td>@if($bird->is_active==0) Belum Aktif @else Aktif @endif</td>
                            <td>{{!empty($bird->club_member->first()) ? $bird->club_member->first()->club->first()->name_club:"-"}}</td>
                            <td>{{!empty($bird->team_member->first()) ? $bird->team_member->first()->team->first()->name_team:"-"}}</td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h2>List Lomba</h2>
                <table id="table_one" class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Event</th>
                            <th>Cabang Event</th>
                            <th>Kategori</th>
                            <th>Juara</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bird->pigeons_participants as $participants)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$participants->name_event}}</td>
                                <td>{{$participants->branch_event}}</td>
                                <td>{{$participants->category_event}}</td>
                                <td>{{$participants->event_results->orderBy('speed_event_result','desc')->first()->event_participants->pigeons->name_pigeon}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>

@endsection