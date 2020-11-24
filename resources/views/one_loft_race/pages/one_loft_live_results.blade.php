@extends('one_loft_race.layout.app_one')
@section('title')
Hasil {{$event->branch_event}}
@endsection
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Hasil {{$event->branch_event}}</h2>
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
                <h4>Hasil {{$event->branch_event}} "{{ $event->name_event }}"</h4>
            </div>
        </div>
        <hr>
        <div class="row my-2">
            <div class="col-2">
                <img style="width: 220px" src="{{ asset('image/'.$event->logo_event.'') }}">
            </div>
            <div class="col-10">
                <p>Jenis lomba : <b style="color: red">{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</b></p>
                <p>Kategori lomba : <b style="color: red">Lomba {{ $event->category_event }}</b></p>
                <p>Info lomba : <b style="color: red">{{ $event->info_event }}</b></p>
                <p>Posisi mulai lomba : <b style="color: red">{{ $event->lat_event ? $event->lat_event . ', ' . $event->lng_event : '-' }}</b></p>
                <p>Posisi selesai lomba : <b style="color: red">{{ $event->lat_event ? $event->lat_event_end . ', ' . $event->lng_event_end : '-' }}</b></p>
                <p>Jadwal mulai : <b style="color: red">{{ \Carbon\Carbon::parse($event->release_time_event)->format('j F Y') }}</b></p>
                <p>Pigeon di basket : <b style="color: red">{{ count($event_results) }}</b></p>
                <p>Pigeon sudah datang : <b style="color: red">{{ count($arrived_pigeons) }}</b></p>
                <p>Pigeon belum datang : <b style="color: red">{{ count($event_results) - count($arrived_pigeons) }}</b></p>
            </div>
        </div>
        @if($event->hotspot_length_event > 1)
        <div class="row mb-2">
            <div class="col-12 d-flex justify-content-end">
                
            </div>
        </div>
        @endif
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>Peringkat</th>
                    <th>Pemilik</th>
                    <th>UID Pigeon</th>
                    <th>Nama Pigeon</th>
                    <th>Kedatangan</th>
                    <th>Kecepatan [m/mnt]</th>
                </thead>
                <tbody>
                    @if(count($event_results) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Hasil belum bisa ditampilkan --</td>
                    </tr>
                    @else
                    @php
                    $rank = 1;
                    @endphp
                    @foreach($event_results as $event_result)
                    <tr>
                        <td>{{ $rank++ }}</td>
                        <td>
                            <a href="" class="text-info">
                                {{ $event_result->event_participant->pigeons->users->name }}
                            </a>
                        </td>
                        <td>
                            <a href="" class="text-info">
                                {{ $event_result->event_participant->pigeons->uid_pigeon }}
                            </a>
                        </td>
                        <td>{{ $event_result->event_participant->pigeons->name_pigeon }}</td>
                        <td>{{ $event_result->speed_event_result ? $event_result->updated_at : '-' }}</td>
                        @if($event_results[0]->speed_event_result)
                        <td>{{ $event_result->speed_event_result ? round($event_result->speed_event_result, 2) : round($unfinished_speed, 2) }}</td>
                        @else
                        <td>{{ '-' }}</td>
                        @endif
                    </tr>
                    @endforeach
                    @endif
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
</div>
</div>
@endsection