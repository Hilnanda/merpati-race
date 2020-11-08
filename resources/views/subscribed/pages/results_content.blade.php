@extends('subscribed.layout.subscribed')
@section('title')
    {{ $title }}
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>{{ $title }}</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5 mb-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Daftar {{ $title }}</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>UID Pigeon</th>
                    <th>Nama Pigeon</th>
                    <th>Nama Lomba</th>
                    <th>Jenis Lomba</th>
                    <th>Kategori Lomba</th>
                    <th>Kecepatan</th>
                    <th>Peringkat</th>
                </thead>
                <tbody>
                    @if(count($event_results) == 0)
                    <tr class="text-center">
                        <td colspan="9">-- Tidak ada {{ $title }} yang tersedia --</td>
                    </tr>
                    @endif
                    @foreach($event_results as $event_result)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $event_result->event_participant->pigeons->uid_pigeon }}</td>
                        <td>{{ $event_result->event_participant->pigeons->name_pigeon }}</td>
                        <td><a href="/events/{{$event_result->event_participant->events->id}}/1/details" class="text-primary">{{ $event_result->event_participant->events->name_event }}</a></td>
                        <td>{{ $event_result->event_participant->events->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</td>
                        <td>{{ $event_result->event_participant->events->category_event }}</td>
                        <td>{{ $event_result->speed_event_result }}</td>
                        <td>{{ $event_result->rank }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection