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
        <h4>Basket List (Nama Lomba)</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Pemilik</th>
                    <th>Team</th>
                    <th>Club</th>
                    <th>Burung</th>
                    <th>Nama Burung</th>
                    <th>Waktu Basket</th>
                </thead>
                <tbody>
                    @if(count($events_on_going) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada lomba yang sedang berlangsung --</td>
                    </tr>
                    @endif
                    @foreach($events_on_going as $event)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $event->name_event }}</td>
                        <td>{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</td>
                        <td>{{ $event->info_event }}</td>
                        <td>({{ $event->lat_event }}), ({{ $event->lng_event }})</td>
                        <td>{{ $event->lat_event_end ? '(' . $event->lat_event_end . '), (' . $event->lng_event_end . ')' : '-' }}</td>
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