@extends('admin.layouts.admin')
@section('title')
Dashboard Panitia
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Lomba
      {{-- <small>advanced tables</small> --}}
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <!-- /.box -->

        <div class="box">
          <div class="box-header">
            {{-- <h3 class="box-title">Data Table With Full Features</h3><br> --}}
            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#tambah_jenisstandar">Tambah Data</a>
            <div class="modal fade" id="tambah_jenisstandar" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel">Tambah Data Lomba</h4>
                </div>
                <form action="/admin/event/create" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name_event">Nama Lomba</label>
                      <input type="text" name="name_event" class="form-control" placeholder="Isi nama lomba" required>
                    </div>
                    <div class="form-group">
                      <label for="logo_event">Logo Lomba</label>
                      <input type="file" name="logo_event" class="form-control" placeholder="Isi logo lomba" required>
                    </div>
                    <div class="form-group">
                      <label for="category_event">Kategori Lomba</label>
                      <select class="form-control" name="category_event">
                        <option value="" disabled selected>-- Pilih kategori --</option>
                        <option value="Individu">Lomba Individu</option>
                        <option value="Team">Lomba Team</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Informasi Tentang Lomba</label>
                      <textarea name="info_event" class="form-control" required="" placeholder="Isi informasi lomba"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Lat Lomba</label>
                      <input type="number" name="lat_event" class="form-control" placeholder="Isi latitude lomba" required step="any">
                    </div>
                    <div class="form-group">
                      <label for="">Long Lomba</label>
                      <input type="number" name="lng_event" class="form-control" placeholder="Isi longitude lomba" required step="any">
                    </div>
                    <div class="form-group">
                      <label for="">Lat Lomba End</label>
                      <input type="number" name="lat_event_end" class="form-control" placeholder="Isi latitude tujuan lomba" step="any">
                    </div>
                    <div class="form-group">
                      <label for="">Long Lomba End</label>
                      <input type="number" name="lng_event_end" class="form-control" placeholder="Isi longitude tujuan lomba" step="any">
                    </div>
                    <div class="form-group">
                      <label for="">Alamat Lomba</label>
                      <textarea name="address_event" class="form-control" required="" placeholder="Isi alamat lomba"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Waktu Mulai Lomba</label>
                      <input type="datetime-local" id="release_time_event_add" name="release_time_event" class="form-control" placeholder="Isi waktu mulai lomba" required onchange="setMaxDueDateAdd()">
                    </div>
                    <div class="form-group">
                      <label for="">Waktu Selesai Lomba</label>
                      <input type="datetime-local" name="expired_time_event" class="form-control" placeholder="Isi waktu selesai lomba">
                    </div>
                    <div class="form-group">
                      <label for="">Harga Pendaftaran Lomba</label>
                      <input type="number" name="price_event" class="form-control" placeholder="Isi harga pendaftaran lomba" required step=100>
                    </div>
                    <div class="form-group">
                      <label for="">Batas Waktu Pendaftaran</label>
                      <input type="datetime-local" id="due_join_date_event_add" name="due_join_date_event" class="form-control" placeholder="Isi batas pendaftaran lomba">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <div class="form-group d-flex justify-content-end">
                      <input type="submit" value="Simpan" class="btn btn-primary">
                      <button class="btn btn-secondary" type="button"
                      data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <th>No.</th>
              <th>Nama</th>
              <th>Logo</th>
              <th>Jenis Lomba</th>
              <th>Kategori</th>
              <th>Info</th>
              <th>Lokasi Mulai</th>
              <th>Lokasi Selesai</th>
              <th>Alamat</th>
              <th>Mulai</th>
              <th>Selesai</th>
              <th>Harga Pendaftaran</th>
              <th>Batas Pendaftaran</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach($events as $event)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $event->name_event }}</td>
                @php $path = Storage::url('image-logo/'.$event->logo_event); @endphp
                <td><img src="{{ url($path) }}" height="80px"></td>
                <td>{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</td>
                <td>{{ $event->category_event }}</td>
                <td>{{ $event->info_event }}</td>
                <td>({{ $event->lat_event }}), ({{ $event->lng_event }})</td>
                <td>{{ $event->lat_event_end ? '(' . $event->lat_event_end . '), (' . $event->lng_event_end . ')' : '-' }}</td>
                <td>{{ $event->address_event }}</td>
                <td>{{ $event->release_time_event }}</td>
                <td>{{ $event->expired_time_event ? $event->expired_time_event : '-' }}</td>
                <td>Rp {{ number_format($event->price_event, 2) }}</td>
                <td>{{ $event->due_join_date_event }}</td>
                <td><a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                  data-target="#editModal{{$event->id}}"><span class="font-weight-bold ml-1">Edit</span></a> 
                  <a href="#" class="btn btn-danger btn-sm delete-event" data-toggle="modal"
                  data-target="#deleteModal{{$event->id}}"><span
                  class="font-weight-bold ml-1">Hapus</span></a></td>

                  <!-- Edit Modal -->
                  <div class="modal fade" id="editModal{{$event->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Edit Data Lomba</h4>
                        </div>
                        <form action="/admin/event/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
                          <div class="modal-body">
                            {{ csrf_field() }}
                            <div class="form-group">
                              <label for="">Nama Lomba</label>
                              <input type="text" name="name_event" class="form-control" placeholder="Isi nama lomba" required value="{{ $event->name_event }}">
                            </div>
                            <div class="form-group">
                              <label for="logo_event">Logo Lomba</label>
                              <input type="file" name="logo_event" class="form-control" placeholder="Isi logo lomba" value="{{ $event->logo_event }}">
                            </div>
                            <div class="form-group">
                              <label for="category_event">Kategori Lomba</label>
                              <select class="form-control" name="category_event">
                                <option value="" disabled selected>-- Pilih kategori --</option>
                                @php
                                  $categories = array('Individu', 'Team');
                                @endphp
                                @foreach($categories as $category)
                                @if($category == $event->category_event)
                                  <option value="{{ $category }}" selected>Lomba {{ $category }}</option>
                                @else
                                  <option value="{{ $category }}">Lomba {{ $category }}</option>
                                @endif
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="">Informasi Tentang Lomba</label>
                              <textarea name="info_event" class="form-control" required="" placeholder="Isi informasi lomba">{{ $event->info_event }}</textarea>
                            </div>
                            <div class="form-group">
                              <label for="">Lat Lomba</label>
                              <input type="number" name="lat_event" class="form-control" placeholder="Isi latitude lomba" required step="any" value="{{ $event->lat_event }}">
                            </div>
                            <div class="form-group">
                              <label for="">Long Lomba</label>
                              <input type="number" name="lng_event" class="form-control" placeholder="Isi longitude lomba" required step="any" value="{{ $event->lng_event }}">
                            </div>
                            <div class="form-group">
                              <label for="">Lat Lomba End</label>
                              <input type="number" name="lat_event_end" class="form-control" placeholder="Isi latitude tujuan lomba" step="any" value="{{ $event->lat_event_end }}">
                            </div>
                            <div class="form-group">
                              <label for="">Long Lomba End</label>
                              <input type="number" name="lng_event_end" class="form-control" placeholder="Isi longitude tujuan lomba" step="any" value="{{ $event->lng_event_end }}">
                            </div>
                            <div class="form-group">
                              <label for="">Alamat Lomba</label>
                              <textarea name="address_event" class="form-control" required="" placeholder="Isi alamat lomba">{{ $event->address_event }}</textarea>
                            </div>
                            <div class="form-group">
                              <label for="">Waktu Mulai Lomba</label>
                              <input type="datetime-local" id="release_time_event_update" name="release_time_event" class="form-control" placeholder="Isi waktu mulai lomba" required onchange="setMaxDueDateUpdate()" value="{{ $event->release_time_event }}">
                            </div>
                            <div class="form-group">
                              <label for="">Waktu Selesai Lomba</label>
                              <input type="datetime-local" name="expired_time_event" class="form-control" placeholder="Isi waktu selesai lomba" value="{{ $event->expired_time_event }}">
                            </div>
                            <div class="form-group">
                              <label for="">Harga Pendaftaran Lomba</label>
                              <input type="number" name="price_event" class="form-control" placeholder="Isi harga pendaftaran lomba" required step=100 value="{{ $event->price_event }}">
                            </div>
                            <div class="form-group">
                              <label for="">Batas Waktu Pendaftaran</label>
                              <input type="datetime-local" id="due_join_date_event_update" name="due_join_date_event" class="form-control" placeholder="Isi batas pendaftaran lomba" value="{{ $event->due_join_date_event }}">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <div class="form-group d-flex justify-content-end">
                              <input type="submit" value="Simpan" class="btn btn-primary">
                              <button class="btn btn-secondary" type="button"
                              data-dismiss="modal">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- End Edit Modal -->

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{$event->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data Lomba</h4>
                        </div>
                          <div class="modal-body">
                            {{ csrf_field() }}
                            Apakah anda yakin ingin menghapus {{ $event->name_event }}
                          </div>
                          <div class="modal-footer">
                            <div class="form-group d-flex justify-content-end">
                              <a href="/admin/event/delete/{{$event->id}}" class="btn btn-primary">Hapus</a>
                              <button class="btn btn-secondary" type="button"
                              data-dismiss="modal">Batal</button>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Delete Modal -->
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection
@push('admin-bottom-script')
<script src="{{ url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
function setMaxDueDateAdd() {
  var release_time = document.getElementById("release_time_event_add").value;
  document.getElementById("due_join_date_event_add").max = release_time;
}
</script>
@endpush