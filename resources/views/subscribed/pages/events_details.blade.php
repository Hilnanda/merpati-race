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
        <div class="row">
            <div class="col-4">
                Logo
            </div>
            <div class="col-8">
                Keterangan
            </div>
        </div>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>Peringkat</th>
                    <th>Pemilik</th>
                    <th>Team</th>
                    <th>Club</th>
                    <th>Burung</th>
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
                        <td>{{ $result->users.name ? $result->users.name : '-' }}</td>
                        <td>{{ $result->teams.name ? $result->teams.name : '-' }}</td>
                        <td>{{ $result->clubs.name ? $result->clubs.name : '-' }}</td>
                        <td>{{ $result->pigeons.name ? $result->pigeons.name : '-' }}</td>
                        <td>{{ $result->event_results.created_at ? $result->event_results.created_at : '-' }}</td>
                        <td>{{ $result->event_results.speed_event_result ? $result->event_results.speed_event_result : '-' }}</td>
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
          <form action="/admin/event/create" method="POST">
              <div class="modal-body">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="">Nama Lomba</label>
                  <input type="text" name="name_event" class="form-control" placeholder="Isi nama event" required>
              </div>
              <h5>Harga untuk mendaftar lomba sebesar Rp {{ number_format($event->price_event, 2) }}</h5>
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