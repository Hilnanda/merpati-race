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
                @if($loft->id_user == $current_user->id)
                <div>
                    <a href="/loft/{{$loft->id}}/details" class="btn musica-btn btn-primary">Detail Loft</a>
                </div>
                @endif
            </div>
        </div>
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
                    
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection