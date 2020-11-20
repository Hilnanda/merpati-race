@extends('subscribed.layout.subscribed')

@section('title')
    List Add Participant
@endsection

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
        <div class="bradcumbContent">
            <h2>List Add Participant</h2>
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
                <form action="" method="POST">
                    {{ csrf_field() }}
                <div class="row" >
                    <div class="col-12">

                        {{-- <a href="" class="btn musica-btn">Tambah Participant</a> --}}
                        <input type="submit" class="btn musica-btn" value="Simpan">
                    </div>
                </div>
                <div class="row" >
                    <div class="col-12">
                        
                        
                        
                        <div class="row">
                            <div class="col-4">
                                {{-- <img src="{{ asset('image/'.$event_desc->logo_event.'') }}" style="width:250px"
                                    class="rounded float-left" alt="..."> --}}
                                {{-- bagian keterangan --}}

                            </div>
                            <div class="col-6">
                                


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
                        <h4>List Event Participant</h4>
                        <div class="box-body">
                            <table id="table_two" class="table table-bordered table-striped">
                                <thead>
                                    <th><b>#</b></th>
                                    <th>No.</th>
                                    <th>Nama Loft</th>
                                    <th>ID Pigeon</th>
                                    <th>Nama Pigeon</th>
                                    <th>Ring Size Pigeon</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Warna</th>
                                    <th>Tanggal Join</th>
                                    {{-- <th>Aksi</th> --}}
                                </thead>
                                <tbody>
                                    {{-- @if (count($list_pigeons) == 0)
                                        <tr class="text-center">
                                            <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                                        </tr>
                                    @endif --}}
                                    
                                    @foreach ($list_parti as $item)
                                    <input type="hidden" name="id_event" value="{{ $event_desc->id }}">
                                        <tr>
                                            <td><input type="checkbox" name="list_parti[]" value="{{ $item->id }}"></td>
                                            <td>{{ $loop->index + 1 }} </td>
                                            <td>{{ $item->users->name_loft }}</td>
                                            <td>{{ $item->uid_pigeon }}</td>
                                            <td>{{ $item->name_pigeon }}</td>
                                            <td>{{ $item->ring_size_pigeon }}</td>
                                            <td>{{ $item->sex_pigeon }}</td>
                                            <td>{{ $item->color_pigeon }}</td>
                                            <td>{{ date('d F Y  H:i:s', strtotime($item->updated_at)) }}</td>
                                            {{-- <td class="action-link">
                                            <a href="/club/training_pigeon/{{$item->id_user}}" title="Details" class="mx-1"><i class="fa fa-list-alt"
                                                        aria-hidden="true"></i></a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </form>
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
