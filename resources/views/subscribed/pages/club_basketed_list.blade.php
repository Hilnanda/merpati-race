@extends('subscribed.layout.subscribed')
@section('title')
    Proses Inkorf
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Proses Inkorf</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5 mb-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>Proses Inkorf "{{ $event->name_event }}"</h4>
        <hr>
        <div class="row mb-2">
            <div class="col-12">
                @if ((Auth::user()->id == $event->club->manager_club || $exist == 1) && $event->status == 'Belum dimulai')
                @if ($hardware_inkorf)
                <h5>URL Inkorf {{$event->branch_event == 'Club' ? 'Public Race' : $event->branch_event}}</h5>
                <p class="text-info">http://pigeontime.live/api/subscribed/v1/hardware?&lt;Parameter&gt;</p>
                <p>contoh:<br>http://pigeontime.live/api/subscribed/v1/hardware?uid_hardware={{$hardware_inkorf->uid_hardware}}&uid_pigeon=BR0002</p>
                @endif
                <a href="#" title="Set UID Hardware" class="btn musica-btn btn-primary" data-toggle="modal" data-target="#setInkorf">Set UID Hardware</a>
                @endif
            </div>
        </div>
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
                            {{ $event_participant->pigeons->users->name }}
                            <!-- <a href="" class="text-info">
                                {{ $event_participant->pigeons->users->name }}
                            </a> -->
                        </td>
                        <td>
                            <a href="/pigeon/detail/{{$event_participant->pigeons->id_user}}/{{$event_participant->pigeons->id}}" class="text-info">
                                {{ $event_participant->pigeons->uid_pigeon }}
                            </a>
                        </td>
                        <td>{{ $event_participant->pigeons->name_pigeon }}</td>
                        <td>{{ $event_participant->active_at }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Modal Set Point -->
        <div class="modal fade" id="setInkorf" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Set UID Hardware Inkorf</h4>
                    </div>
                    <form action="/hardware/set-inkorf" method="GET">
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group" hidden>
                                <label for="id_event">ID Event</label>
                                <input type="text" name="id_event" class="form-control" value="{{$event->id}}" required>
                            </div>
                            <div class="form-group" hidden>
                                <label for="tanggal_hardware">Tanggal Hardware</label>
                                <input type="text" name="tanggal_hardware" class="form-control" value="{{$event->due_join_date_event}}" required>
                            </div>
                            <div class="form-group">
                                <label for="uid_hardware">UID Hardware</label>
                                <select name="uid_hardware" class="form-control" required>
                                    <option value="" selected disabled>-- Pilih UID Hardware --</option>
                                    @foreach ($hardwares as $hardware)
                                    <option value="{{ $hardware->uid_hardware }}" {{ $hardware_inkorf && $hardware_inkorf->uid_hardware == $hardware->uid_hardware ? 'selected' : ''}}>
                                        {{ $hardware->uid_hardware }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" hidden>
                                <input type="text" name="label_hardware" class="form-control mb-1" value="inkorf" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="form-group d-flex justify-content-end">
                                <button class="btn musica-btn btn-2" type="button"
                                data-dismiss="modal">Cancel</button>
                                <input type="submit" value="Simpan" class="btn musica-btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Modal Set Point -->
    </div>
</div>
@endsection