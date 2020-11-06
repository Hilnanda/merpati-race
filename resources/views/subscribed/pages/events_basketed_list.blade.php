@extends('subscribed.layout.subscribed')
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
                <div class="btn-group dropup">
                  <button type="button" class="btn btn-primary dropdown-toggle pl-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hotspot {{ $hotspot }}
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    @foreach($event->event_hotspot as $key => $event_hotspot)
                    @if($hotspot != $key + 1)
                    <a class="dropdown-item" href="/events/{{$event->id}}/{{$key+1}}/basket">Hotspot {{$key+1}}</a>
                    @endif
                    @endforeach
                  </div>
                </div>
            </div>
        </div>
        @endif
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Pemilik</th>
                    @if($event->category_event == 'Team')
                    <th>Team</th>
                    @endif
                    <th>Club</th>
                    <th>UID Pigeon</th>
                    <th>Nama Pigeon</th>
                    <th>Waktu Basket</th>
                </thead>
                <tbody>
                    @if(count($event_participants) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Hasil belum bisa ditampilkan --</td>
                    </tr>
                    @else
                    @php
                    $rank = 1;
                    @endphp
                    @foreach($event_participants as $event_participant)
                    <tr>
                        <td>{{ $rank++ }}</td>
                        <td>{{ $event_participant->event_participant->pigeons->users->name ? $event_participant->event_participant->pigeons->users->name : '-' }}</td>
                        @if($event->category_event == 'Team')
                        <td>{{ $event_participant->event_participant->team->name_team ? $event_participant->event_participant->team->name_team : '-' }}</td>
                        @endif
                        <td>{{ $event_participant->event_participant->club->name_club ? $event_participant->event_participant->club->name_club : '-' }}</td>
                        <td>{{ $event_participant->event_participant->pigeons ? $event_participant->event_participant->pigeons->uid_pigeon : '-' }}</td>
                        <td>{{ $event_participant->event_participant->pigeons ? $event_participant->event_participant->pigeons->name_pigeon : '-' }}</td>
                        <td>{{ $event_participant->created_at ? $event_participant->created_at : '-' }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection