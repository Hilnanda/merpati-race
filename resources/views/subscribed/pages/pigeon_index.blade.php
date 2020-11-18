@extends('subscribed.layout.subscribed')

@section('title')
    Loft
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
        {{-- <h4>Detail Club Saya</h4> --}}
        <div class="box-body">
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">


                </div>
            </div>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    {{-- @if (Auth::user()->id==$clubs->manager_club||$exist == 1) --}}
                    {{-- <button class="btn musica-btn mb-3" data-toggle="modal" data-target="#tambah_burung">Daftarkan </button> --}}
                    <button class="btn musica-btn mb-3" data-toggle="modal" data-target="#edit_name_loft">Edit Nama Loft</button>
                                     
                    <div class="row">
                        <div class="col-3">
                            <img src="{{asset('image/favicon.ico') }}" style="width:220px;height:200px"
                                class="rounded float-left" alt="...">
                            {{-- bagian keterangan --}}

                        </div>
                        <div class="col-6">
                            <h4>Loft Details</h4>
                            <p>Nama Pemilik : <b style="color: red">{{ $id_user->name }}
                                    ({{ $id_user->username }})</b></p>
                            <p>Nama Loft : <b style="color: red">{{ $id_user->name_loft }}</b></p>
                            <p>Posisi Loft : <b style="color: red">{{ $id_user->lat_loft }} ,
                                    {{ $id_user->lng_loft }}</b></p>
                            {{-- <p>Nama Loft : <b style="color: red">{{ $id_user->name }}</b></p> --}}
                            {{-- <p>Nama Club : <b style="color: red">{{ $get_loft->club->name_club }}</b></p>
                            <p>Jumlah Pigeon : <b style="color: red">{{ $count_pigeon }}</b></p>                           --}}

                        </div>

                    </div>
                    <div class="modal fade" id="edit_name_loft" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Nama Loft</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="/pigeons/update/name_loft/{{$id_user->id}}" method="POST">
                                    {{ csrf_field() }}
                                    {{-- <input type="hidden" name="id_user" value="{{ $get_loft->user->id }}">
                                    <input type="hidden" name="id_club" value="{{ $get_loft->id_club }}"> --}}
                                    <div class="form-group">
                                        <label for="">Nama Loft</label>
                                        <input type="text" value="{{ $id_user->name_loft }}" name="name_loft" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar Logo</label>
                                        <input type="file" name="image_news" class="form-control" required>
                                    </div>
                                   
                                    <div class="form-group">
                                        <input type="submit" value="Simpan" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    {{-- bagian statistik --}}
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