@extends('subscribed.layout.subscribed')

@section('title')
    Training
@endsection

@section('content')
 <!-- ##### Breadcumb Area Start ##### -->
 <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Training Pigeon</h2>
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
                    
              
                <div class="modal fade" id="createTraining" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Buat Training</h4>
                            </div>
                            <form action="/pigeon/training_pigeon/create" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    {{ csrf_field() }}                                   
                                    <div class="form-group">
                                        <label for="name_event">Nama Training</label>
                                        <input type="text" name="name_event" class="form-control" placeholder="Isi nama training" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="logo_event">Logo Training</label>
                                        <input type="file" name="logo_event" class="form-control" placeholder="Isi logo training" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Informasi Tentang Training</label>
                                        <textarea name="info_event" class="form-control" required="" placeholder="Isi informasi training"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Waktu Mulai Training</label>
                                        <input type="datetime-local" step="1" id="release_time_event_add_training" name="release_time_event" class="form-control" placeholder="Isi waktu mulai training" required onchange="setMaxDueDateAddTraining()">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Batas Waktu Pendaftaran</label>
                                        <input type="datetime-local" step="1" id="due_join_date_event_add_training" name="due_join_date_event" class="form-control" placeholder="Isi batas pendaftaran training">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="form-group d-flex justify-content-end">
                                        <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
                                        data-dismiss="modal">Cancel</button>
                                        <input type="submit" value="Simpan" class="btn elementor-button-red elementor-size-md elementor-animation-grow">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    {{-- @if (Auth::user()->id==$clubs->manager_club||$exist == 1) --}}
                    {{-- <button class="btn elementor-button-red elementor-size-md elementor-animation-grow mb-3" data-toggle="modal" data-target="#tambah_burung">Daftarkan </button>
                    <button class="btn elementor-button-red elementor-size-md elementor-animation-grow mb-3" data-toggle="modal" data-target="#edit_name_loft">Edit Nama Loft</button> --}}
                        {{-- @endif --}}
                                     
                    <div class="row">


                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    {{-- bagian statistik --}}
                    <!-- Training Table -->
                    <button class="btn elementor-button-red elementor-size-md elementor-animation-grow mb-3" data-toggle="modal" data-target="#createTraining">Add Training </button>
        <h4 class="mt-3">Training</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Titik Mulai</th>
                    <th>Waktu Mulai</th>
                    <th>Jarak</th>
                <th>Status</th>
                    <th></th>
                </thead>
                <tbody>
                    {{-- @php
                    $row = 1;
                    @endphp
                    @foreach($data->event as $event)
                    @if($event->branch_event == 'Training')
                    <tr>
                        <td>{{ $row++ }}</td>
                        <td><a href="/loft/events/{{$event->id}}/1/details" class="text-info">{{ $event->name_event }}</a></td>
                        <td>{{ $event->lng_event ? $event->lng_event . ', ' . $event->lat_event : '-' }}</td>
                        <td>{{ $event->event_hotspot[0]->release_time_hotspot }}</td>
                        <td>{{ $event->distance ? round($event->distance, 2) . ' Km' : '-' }}</td>
                        <td style="color: {{ $event->color ? $event->color : '' }};">{{ $event->status ? $event->status : '-' }}</td>
                        <td class="action-link">
                            <a href="/events/{{$event->id}}/1/basket" title="Basket List" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="/events/{{$event->id}}/1/live-result" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <!-- <a href="/events/{{$event->id}}/1/details" title="Detail Lomba" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a> -->
                        </td>
                    </tr>
                    @endif
                    @endforeach --}}
                    @foreach($data as $event)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                    <td><a href="/pigeon/training/{{$event->id_user}}/{{$event->id}}/1/details" class="text-info">{{ $event->name_event }}</a></td>
                        <td>{{ $event->lng_event ? $event->lng_event . ', ' . $event->lat_event : '-' }}</td>
                        <td>{{ $event->event_hotspot[0]->release_time_hotspot }}</td>
                        <td>{{ $event->distance ? round($event->distance, 2) . ' Km' : '-' }}</td>
                        <td style="color: {{ $event->color ? $event->color : '' }};">{{ $event->status ? $event->status : '-' }}</td>
                        <td class="action-link">
                            {{-- <a href="#" title="Basket List" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a> --}}
                            {{-- <a href="#" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a> --}}
                            <a href="/pigeon/basket/{{$event->id_user}}/{{$event->id}}/1/details" title="Basket List" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="/pigeon/live-result/{{$event->id_user}}/{{$event->id}}/1/details" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <!-- <a href="/events/{{$event->id}}/1/details" title="Detail Lomba" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End Training Table -->
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
    <script>
        function setMaxDueDateAddTraining() {
            var release_time = document.getElementById("release_time_event_add_training").value;
            document.getElementById("due_join_date_event_add_training").max = release_time;
        }
    </script>
@endpush