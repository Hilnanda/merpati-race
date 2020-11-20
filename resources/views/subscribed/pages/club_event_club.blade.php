@extends('subscribed.layout.subscribed')

@section('title')
    Deskripsi Event
@endsection

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
        <div class="bradcumbContent">
            <h2>Deskripsi Event</h2>
        </div>
    </div>
    <!-- bg gradients -->
    <div class="bg-gradients"></div>
    <!-- ##### Breadcumb Area End ##### -->

    <div class="row mt-5 px-5">
        <div class="col-lg-12">
            <!-- /.box-header -->
            {{-- <h4>Detail Club Saya</h4> --}}
            <div class="box-body">
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-12">


                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-12">
                        
                        
                        
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ asset('image/'.$event_desc->logo_event.'') }}" style="width:220px"
                                    class="rounded float-left" alt="...">
                                {{-- bagian keterangan --}}

                            </div>
                            <div class="col-6">
                                <h4>Event Details</h4>
                                <p>Nama Event : <b style="color: red">{{ $event_desc->name_event }}</b></p>
                                <p>Info Event : <b style="color: red">{{ $event_desc->info_event }}</b></p>
                                {{-- <p>Nama Pemilik : <b style="color: red">{{ $event_desc->user->name }}
                                        ({{ $get_loft->user->username }})</b></p> --}}
                                <p>Posisi Loft : <b style="color: red">{{ $event_desc->lat_event }} ,
                                        {{ $event_desc->lng_event }}</b></p>
                                <p>Alamat Event : <b style="color: red">{{ $event_desc->address_event }}</b></p>
                                <p>Harga Event : <b style="color: red">Rp {{ number_format($event_desc->price_event, 2) }}</b></p>
                                {{-- <p>Manager club : <b
                                        style="color: red">{{ $clubs->manager->name }} ({{ $clubs->manager->username }})</b>
                                </p> --}}


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
                        <h4>List Pigeons</h4>
                        <div class="box-body">
                            <table id="table_two" class="table table-bordered table-striped">
                                <thead>
                                    <th>No.</th>
                                    <th>ID Pigeon</th>
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
                                    {{-- @foreach ($list_pigeon as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $item->uid_pigeon }}</td>
                                            <td>{{ $item->name_pigeon }}</td>
                                            <td>{{ $item->ring_size_pigeon }}</td>
                                            <td>{{ $item->sex_pigeon }}</td>
                                            <td>{{ $item->color_pigeon }}</td>
                                            <td>{{ date('d F Y  H:i:s', strtotime($item->updated_at)) }}</td>
                                            <td class="action-link">
                                            <a href="/club/training_pigeon/{{$item->id_user}}" title="Details" class="mx-1"><i class="fa fa-list-alt"
                                                        aria-hidden="true"></i></a>
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
@push('bottom-script')
    <script src="{{ url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function() {
            $('#example1').DataTable({
                'scrollX': true,
            })
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false,
                'scrollX': true,
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
