@extends('subscribed.layout.subscribed')

@section('title')
    Detail Club
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
                <div class="col-12">


                </div>
            </div>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    {{-- @if (Auth::user()->id==$clubs->manager_club||$exist == 1) --}}
                    {{-- <button class="btn musica-btn mb-3" data-toggle="modal" data-target="#tambah_burung">Daftarkan </button>
                    <button class="btn musica-btn mb-3" data-toggle="modal" data-target="#edit_name_loft">Edit Nama Loft</button> --}}
                        {{-- @endif --}}
                                     
                    <div class="row">


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