@extends('subscribed.layout.subscribed')
@section('title')
    Basket List
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: {{ url('image/breadcumb-1.jpg') }};">
    <div class="bradcumbContent">
        <h2>Basket List</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Basket List "{{ $event->name_event }}"</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Pemilik</th>
                    <th>Team</th>
                    <!-- @if($event->category_event == 'Team') -->
                    
                    <!-- @endif -->
                    <th>Club</th>
                    <th>Pigeon</th>
                    <th>Nama Pigeon</th>
                    <th>Waktu Basket</th>
                </thead>
                <tbody>
                    @if(count($participants) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Belum ada pigeon yang tiba --</td>
                    </tr>
                    @endif
                    @foreach($participants as $participant)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $participant->pigeons->users->name }}</td>
                        <td>{{ $participant->teams_name_team }}</td>
                        <td>{{ $participant->clubs_name_club }}</td>
                        <td>{{ $participant->pigeons ? $participant->pigeons->uid_pigeon : '-' }}</td>
                        <td>{{ $participant->pigeons ? $participant->pigeons->name_pigeon : '-' }}</td>
                        <td>{{ $participant->basketed_at ? str_replace('T', ' ', $participant->basketed_at) . ':00 (GMT +7:00)' : '-' }}</td>
                        <!-- @if($event->category_event == 'Team') -->
                        
                        <!-- @endif -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection