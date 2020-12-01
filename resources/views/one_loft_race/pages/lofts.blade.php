@extends('one_loft_race.layout.app_one')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>List Loft</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4></h4>
        <div class="box-body" style="overflow-y: auto;">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Loft</th>
                    <th>Logo Loft</th>
                    <th>Negara</th>
                    <th>Waktu Dibuat</th>
                    <th>Pemilik</th>
                </thead>
                <tbody>
                    @php
                    $number = 1;
                    @endphp
                    @foreach($loft_all as $loft)
                    <tr>
                        <td>{{ $number++ }}</td>
                        <td>
                            <a href="/loft/{{$loft->id}}/details" class="text-info">
                                {{ $loft->name_loft }}
                            </a>
                        </td>
                        <td>
                            <a href="/loft/{{$loft->id}}/details">
                                <img style="display: block; max-height: 80px; height: auto; width: auto;" src="{{ asset('image/'.$loft->logo_loft.'') }}">
                            </a>
                        </td>
                        <td>{{ $loft->country_loft ? $loft->country_loft : '-' }}</td>
                        <td>{{ $loft->created_at }}</td>
                        <td>{{ $loft->user->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection