@extends('subscribed.layout.subscribed')

@section('title')
    Permintaan Gabung
@endsection

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url(image/breadcumb-1.jpg);">
    <div class="bradcumbContent">
        <h2>List Permintaan</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        {{-- <h4>List Club Saya</h4> --}}
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>UID Pigeon</th>
                    <th>Nama Pigeon</th>
                    <th>Warna Pigeon</th>
                    <th>Pemilik</th>
                    <th>Bergabung</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    {{-- @if(count($clubku) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                    </tr>
                    @endif --}}
                    @foreach($acc as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->uid_pigeon }}</td>
                        <td>{{ $item->name_pigeon }}</td>
                        <td>{{ $item->color_pigeon}}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ date('d F Y  H:i:s', strtotime($item->created_at)) }}</td>
                        <td class="action-link">                        
                            <a href="/club/acc/{{$item->id}}" title="Centang" class="mx-1"><i class="fa fa-check fa-2" aria-hidden="true"></i></a>
                            <a href="#" title="Silang" class="mx-1"><i class="fa fa-times fa-2" aria-hidden="true"></i></a>
                            <a href="club/{{$item->id}}/detail_saya" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
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