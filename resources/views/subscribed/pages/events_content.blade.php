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
                    @if($title == 'Lomba Club')
                    <th>Nama Club</th>
                    @endif
                    <th>Nama Lomba</th>
                    <th>Jenis Lomba</th>
                    <th>Kategori</th>
                    <th>Titik Mulai</th>
                    <th>Waktu Mulai</th>
                    <th>Jarak</th>
                    <th>Hotspot</th>
                    <th>Status</th>
                    <!-- <th>Kedatangan</th> -->
                    <th></th>
                </thead>
                <tbody>
                    @if(count($events) == 0)
                    <tr class="text-center">
                        <td colspan="9">-- Tidak ada {{ $title }} yang tersedia --</td>
                    </tr>
                    @endif
                    @foreach($events as $event)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        @if($title == 'Lomba Club')
                        <td>{{ $event->club->name_club }}</td>
                        @endif
                        <td>{{ $event->name_event }}</td>
                        <td>{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</td>
                        <td>{{ $event->category_event }}</td>
                        <td>{{ $event->lat_event ? '(' . $event->lat_event . '), (' . $event->lng_event . ')' : '-' }}</td>
                        <td>{{ str_replace('T', ' ', $event->release_time_event) . ':00 (GMT +7:00)' }}</td>
                        <td>{{ $event->lat_event_end ? round($event->distance) . ' Km' : '-' }}</td>
                        <td>{{ $event->hotspot_length_event }}</td>
                        <td style="color: {{ $event->color }}">{{ $event->status }}</td>
                        <!-- <td></td> -->
                        <td class="action-link">
                            <a href="/events/{{$event->id}}/1/basket" title="Basket List" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            @if(explode(' ', $event->status)[0] == 'Terbang')
                            <a href="/events/{{$event->id}}/1/live-result" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            @endif
                            <a href="/events/{{$event->id}}/1/details" title="Detail Lomba" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                        </td>
                        <!-- <td><div id="{{ 'countdown' . $loop->index }}"></div></td>
                        <td>{{ $event->countFrom . ' -> ' . $event->countTo }}</td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>
@endsection
@push('bottom-script')
<script>
    count = <?php echo count($events); ?>;
    <?php $i = 0; ?>

    alert(<?php echo $events[3]->countFrom; ?>)

    for(let i = 0, length = count; i < length; i++){
        CountDownTimer('<?= $events[3]->countFrom; ?>','<?= $events[3]->countTo; ?>', 'countdown' + i);
        <?php $i++; ?>
    }

    function CountDownTimer(from, to, id)
    {
        var tos = to.split(",");
        var to = new Date(tos[0], tos[1], tos[2], tos[3], tos[4], tos[5]);

        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;

        function showRemaining() {
            var froms = from.split(",");
            var from = new Date(froms[0], froms[1], froms[2], froms[3], froms[4], froms[5]);
            var distance = to - from;
            if (distance < 0) {

                clearInterval(timer);
                document.getElementById(id).innerHTML = 'EXPIRED!';

                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            document.getElementById(id).innerHTML = days + 'days ';
            document.getElementById(id).innerHTML += hours + 'hrs ';
            document.getElementById(id).innerHTML += minutes + 'mins ';
            document.getElementById(id).innerHTML += seconds + 'secs';
            document.getElementById(id).innerHTML = id + from + '-' + to;
        }

        timer = setInterval(showRemaining, 1000);
    }

</script>
@endpush