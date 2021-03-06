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
            <form action="/club/list-participant/{{$event->id}}/add" method="POST">
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
                                {{-- <img src="{{ asset('image/'.$event->logo_event.'') }}" style="width:250px"
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
                                    <input type="text" name="id_event" value="{{ $event->id }}" style="display: none">
                                    @foreach ($club_members as $club_member)
                                    <input type="text" name="id_clubs[]" value="{{ $club_member->id_club }}" style="display: none">
                                    <tr>
                                        <td><input type="checkbox" {{ in_array($club_member->id, $event_participant_pigeons) ? 'checked' : '' }} name="id_pigeons[]" value="{{ $club_member->id }}"></td>
                                        {{-- <td hidden></td> --}}
                                        <td>{{ $loop->index + 1 }} </td>
                                        <td>{{ $club_member->users->name_loft }}</td>
                                        <td>{{ $club_member->uid_pigeon }}</td>
                                        <td>{{ $club_member->name_pigeon }}</td>
                                        <td>{{ $club_member->ring_size_pigeon }}</td>
                                        <td>{{ $club_member->sex_pigeon }}</td>
                                        <td>{{ $club_member->color_pigeon }}</td>
                                        <td>{{ date('d F Y  H:i:s', strtotime($club_member->created_at)) }}</td>
                                        <!-- <td class="action-link">
                                            <a href="/club/training_pigeon/{{$club_member->id_user}}" title="Details" class="mx-1"><i class="fa fa-list-alt"
                                            aria-hidden="true"></i></a>
                                        </td> -->
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
