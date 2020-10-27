@extends('subscribed.layout.subscribed')
@section('title')
Detail Lomba
@endsection
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Detail Lomba</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <div class="row">
            <div class="col d-flex justify-content-between">
                <h4>Detail Lomba "{{ $event->name_event }}"</h4>
                <a href="#" class="btn musica-btn" data-toggle="modal" data-target="#joinLomba">Join Lomba</a>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-2">
                <img src="{{ asset('image/favicon.ico') }}" style="width:220px;height:200px" class="rounded float-left" alt="...">
            </div>
            <div class="col-10">
                <p>Nama lomba : <b style="color: red">{{ $event->name_event }}</b></p>
                <p>Alamat lomba : <b style="color: red">{{ $event->info_event }}</b></p>
                <p>Posisi lomba : <b style="color: red">{{ $event->lat_event }} , {{ $event->lng_event }}</b></p>
                <p>Alamat lomba : <b style="color: red">{{ $event->address_event }}</b></p>
                <p>Jadwal mulai : <b style="color: red">{{ \Carbon\Carbon::parse($event->release_time_event)->format('j F Y') }}</b></p>
            </div>
        </div>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>Peringkat</th>
                    <th>Pemilik</th>
                    <th>Team</th>
                    <th>Club</th>
                    <th>Pigeon</th>
                    <th>Kedatangan</th>
                    <th>Kecepatan</th>
                    <th>Nama Burung</th>
                </thead>
                <tbody>
                    @if(count($results) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Hasil belum bisa ditampilkan --</td>
                    </tr>
                    @endif
                    @foreach($results as $result)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $result->pigeons->users->name ? $result->pigeons->users->name : '-' }}</td>
                        <td>{{ $result->teams ? $result->teams.name : '-' }}</td>
                        <td>{{ $result->clubs ? $result->clubs.name : '-' }}</td>
                        <td>{{ $result->pigeons->name ? $result->pigeons->name : '-' }}</td>
                        <td>{{ $result->event_results ? $result->event_results.created_at : '-' }}</td>
                        <td>{{ $result->event_results ? $result->event_results.speed_event_result : '-' }}</td>
                        <td>{{ $result->pigeons ? $result->pigeons->name_pigeon : '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->

        <!-- Modal Join Lomba -->
        <div class="modal fade" id="joinLomba" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel">Join Lomba {{ $event->name_event }}</h4>
          </div>
          <form action="/events/{{ $event->id }}/join_event" method="POST">
              <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="id_pigeon">Pigeon yang ingin join</label>
                    <select class="form-control" name="id_pigeon">
                        <option value="" selected disabled>-- Pilih Pigeon --</option>
                        @foreach($pigeons as $pigeon)
                        <option value="{{ $pigeon->id }}">({{ $pigeon->uid_pigeon }}) {{ $pigeon->name_pigeon }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="is_core">Peran sebagai</label>
                    <select class="form-control" name="is_core">
                        <option value="" disabled selected>-- Pilih peran --</option>
                        <option value="1">Inti</option>
                        <option value="0">Cadangan</option>
                    </select>
                </div>
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
</div>
</div>
@endsection