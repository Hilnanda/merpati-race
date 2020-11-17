@extends('subscribed.layout.subscribed')

@section('title')
Detail Loft
@endsection

@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Detail Loft</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5 mb-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <div class="row">
            <div class="col d-flex justify-content-between">
                <h4>Detail Loft "{{ $loft->name_loft }}"</h4>
                @if($loft->id_user != $current_user->id)
                <a href="#" class="btn musica-btn" data-toggle="modal" data-target="#joinLoft">Join Loft</a>
                @endif
            </div>
        </div>
        <div class="row my-2">
            <div class="col-3">
                <img style="width: 100%;" src="{{ asset('image/'.$loft->logo_loft.'') }}">
            </div>
            <div class="col-9">
                <p>Pemilik Pigeon Terdaftar : <b style="color: red">{{ $loft->fanciers ? count($loft->fanciers) : 0 }}</b></p>
                <p>Pigeon Terdaftar : <b style="color: red">{{ $loft->loft_member ? count($loft->loft_member) : 0 }}</b></p>
                <p>Pemilik Loft : <b style="color: red">{{ $loft->user->name }}</b></p>
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
                    @php
                    $row = 1;
                    @endphp
                    @foreach($loft->event as $event)
                    <tr>
                        <td>{{ $row++ }}</td>
                        <td>{{ $event->name_event }}</td>
                        <td>{{ $event->lng_event . ', ' . $event->lat_event }}</td>
                        <td>{{ $event->event_hotspot[0]->release_time_hotspot }}</td>
                        <td>{{ $event->distance ? round($event->distance, 2) . ' Km' : '-' }}</td>
                        <td style="color: {{ $event->color ? $event->color : '' }};">{{ $event->status ? $event->status : '-' }}</td>
                        <td class="action-link">
                            <a href="/events/{{$event->id}}/1/basket" title="Basket List" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="/events/{{$event->id}}/1/live-result" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <a href="/events/{{$event->id}}/1/details" title="Detail Lomba" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->

        <!-- Modal Join Loft -->
        <div class="modal fade" id="joinLoft" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Join Lomba {{ $event ? $event->name_event : '-' }}</h4>
          </div>
          <form action="/events/{{ $event->id }}/join_event" method="POST">
              <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="id_pigeon">Pigeon yang ingin join</label>
                    <select class="form-control" name="id_pigeon" required>
                        <option value="" selected disabled>-- Pilih Pigeon --</option>
                        @foreach($pigeons as $pigeon)
                        @if($event->category_event == 'Team')
                        @if($pigeon->name_team)
                        <option value="{{ $pigeon->pigeon_id }}">({{ $pigeon->uid_pigeon }}) {{ $pigeon->name_pigeon }} [{{ $pigeon->name_team }}]</option>
                        @endif
                        @else
                        <option value="{{ $pigeon->pigeon_id }}">({{ $pigeon->uid_pigeon }}) {{ $pigeon->name_pigeon }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                @if($event->category_event == 'Team')
                <div class="form-group">
                    <label for="is_core">Peran sebagai</label>
                    <select class="form-control" name="is_core" required>
                        <option value="" disabled selected>-- Pilih peran --</option>
                        <option value="1">Inti</option>
                        <option value="0">Cadangan</option>
                    </select>
                </div>
                @else
                <input type="hidden" name="is_core" value="1">
                @endif
              <h5>Harga untuk mendaftar lomba sebesar Rp.{{ number_format($event->price_event, 2) }}</h5>
          </div>
          <div class="modal-footer">
            <div class="form-group d-flex justify-content-end">
                <button class="btn musica-btn btn-2" type="button"
                data-dismiss="modal">Cancel</button>
                <input type="submit" value="Lanjut Pembayaran" class="btn musica-btn">
            </div>
        </div>
    </form>
</div>
</div>
</div>
<!-- End Modal Join Loft -->

</div>
</div>
@endsection