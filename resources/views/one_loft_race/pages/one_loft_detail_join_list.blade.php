@extends('one_loft_race.layout.app_one')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
        <div class="bradcumbContent">
            <h2>Permintaan Join</h2>
        </div>
    </div>
    <!-- bg gradients -->
    <div class="bg-gradients"></div>
    <!-- ##### Breadcumb Area End ##### -->

    <div class="row mt-5 px-5 mb-5">
        <div class="col-lg-12">
            <!-- /.box-header -->
            <div class="row mb-2">
                <div class="col d-flex justify-content-between">
                    <h4>Permintaan Join "{{ $loft->name_loft }}"</h4>
                    @if ($loft->id_user == $current_user->id)
                        <div>
                            <a href="/loft/{{ $loft->id }}/details" class="btn musica-btn btn-primary">Detail Loft</a>
                        </div>
                    @endif
                </div>
            </div>
            <hr>
            <div class="box-body">
                <table id="table_one" class="table table-bordered table-striped">
                    <thead>
                        <th>No.</th>
                        <th>Nama Pemilik</th>
                        <th>UID Pigeon</th>
                        <th>Nama Pigeon</th>
                        <th>Ring Size Pigeon</th>
                        <th>Jenis Kelamin</th>
                        <th>Warna</th>
                        <th>Tanggal Join</th>
                        <th>Aksi</th>
                        
                    </thead>
                    <tbody>
                        @foreach ($loft_members as $item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->pigeon->users->name }}</td>
                                <td>{{ $item->pigeon->uid_pigeon }}</td>
                                <td>{{ $item->pigeon->name_pigeon }}</td>
                                <td>{{ $item->pigeon->ring_size_pigeon }}</td>
                                <td>{{ $item->pigeon->sex_pigeon }}</td>
                                <td>{{ $item->pigeon->color_pigeon }}</td>
                                <td>{{ date('d F Y  H:i:s', strtotime($item->created_at)) }}</td>
                                <td class="action-link">                        
                                    <a href="/loft/acc/{{$item->id}}" title="Setuju" class="mx-1"><i class="fa fa-check fa-2" aria-hidden="true"></i></a>
                                    <a href="/loft/acc/{{$item->id}}/delete" title="Tolak" class="mx-1 delete"><i class="fa fa-times fa-2" aria-hidden="true"></i></a>
                                    {{-- <a href="#" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a> --}}
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
