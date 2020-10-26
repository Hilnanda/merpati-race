@extends('subscribed.layout.subscribed')
@section('title')
    Team
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url(image/breadcumb-1.jpg);">
    <div class="bradcumbContent">
        <h2>Team</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>List Team Saya</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Team</th>
                    <th>User</th>
                    <th>Tanggal Team</th>
                    
                    {{-- <th>Mulai</th> --}}
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @if(count($teamku) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Team yang Diikuti --</td>
                    </tr>
                    @endif
                    @foreach($teamku as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->name_team }}</td>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ date('d F Y  H:i:s', strtotime($item->created_at)) }}</td>
                        <td class="action-link">
                            
                            <a href="#" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>List Team yang Diikuti</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Team</th>
                    <th>Nama Club</th>
                    {{-- <th>User</th> --}}
                    <th>Tanggal Team</th>
                    
                    {{-- <th>Mulai</th> --}}
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @if(count($team_ikut) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Team yang Diikuti --</td>
                    </tr>
                    @endif
                    @foreach($team_ikut as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->name_team }}</td>
                        <td>{{ $item->name_club }}</td>
                        {{-- <td>{{ $item->username }}</td> --}}
                        <td>{{ date('d F Y  H:i:s', strtotime($item->created_at)) }}</td>
                        <td class="action-link">
                            
                            <a href="/team/details/{{ $item->id }}" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>List Team yang Terdaftar</h4>
        <div class="box-body">
            <table id="table_two" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Team</th>
                    <th>User</th>
                    <th>Tanggal Team</th>
                    {{-- <th>Mulai</th> --}}
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @if(count($team) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Team yang Terdaftar --</td>
                    </tr>
                    @endif
                    @foreach($team as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->name_team }}</td>
                        <td>{{ $item->user->username }}</td>
                        <td>{{ date('d F Y  H:i:s', strtotime($item->created_at)) }}</td>
                        <td class="action-link">
                            <a href="#" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                            <a href="#" title="Join" class="mx-1"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection
{{-- cek --}}