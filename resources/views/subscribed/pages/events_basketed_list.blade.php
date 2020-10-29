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
                    @if($event->category_event == 'Team')
                    <th>Team</th>
                    @endif
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
                        @if($event->category_event == 'Team')
                        <td>{{ $participant->pigeons->club_member-> ? $result->teams.name : '-' }}</td>
                        @endif
                        <td class="action-link">
                            <a href="#" title="Basketed List" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" title="Live Results" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <a href="#" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection