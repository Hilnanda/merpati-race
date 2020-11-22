@extends('one_loft_race.layout.app_one')
@section('title')
    Basket List
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Basket List</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5 mb-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Basket List "{{ $event->name_event }}"</h4>
        @if($event->hotspot_length_event > 1)
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-end">
                
            </div>
        </div>
        @endif
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Pemilik</th>
                    <th>UID Pigeon</th>
                    <th>Nama Pigeon</th>
                    <th>Waktu Basket</th>
                </thead>
                <tbody>
                    @if(count($event_participants) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Belum ada pigeon yang terdaftar --</td>
                    </tr>
                    @else
                    @php
                    $rank = 1;
                    @endphp
                    @foreach($event_participants as $event_participant)
                    <tr>
                        <td>{{ $rank++ }}</td>
                        <td>
                            <a href="" class="text-info">
                                {{ $event_participant->event_participant->pigeons->users->name }}
                            </a>
                        </td>
                        <td>
                            <a href="" class="text-info">
                                {{ $event_participant->event_participant->pigeons->uid_pigeon }}
                            </a>
                        </td>
                        <td>{{ $event_participant->event_participant->pigeons->name_pigeon }}</td>
                        <td>{{ $event_participant->created_at }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection