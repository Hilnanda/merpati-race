@extends('subscribed.layout.subscribed')

@section('title')
    Data Event Club
@endsection

@section('content')
 <!-- ##### Breadcumb Area Start ##### -->
 <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>List Event Club</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>List Loft</h4>
        <div class="box-body">
            <table id="table_one" class="table table-bordered table-striped">
                <thead>
                    <th>No.</th>
                    <th>Nama Club</th>
                    <th>Manajer Club</th>
                    <th>Lokasi Mulai</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    {{-- @if(count($clubku) == 0)
                    <tr class="text-center">
                        <td colspan="8">-- Tidak ada Club yang belum Diikuti --</td>
                    </tr>
                    @endif --}}
                    {{-- @foreach($clubku as $item)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->name_club }}</td>
                        <td>{{ $item->manager->name }}</td>
                        <td>({{ $item->lat_club }}), ({{ $item->lng_club }})</td>
                        <td>{{ $item->address_club }}</td>
                        <td class="action-link">
                            <a href="/club/lihat_data/{{$item->id}}" title="Event Club" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                            <a href="club/{{$item->id}}/detail_saya" title="Details" class="mx-1"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</div>

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        <h4>List Event Club </h4>
        <div class="box-body">
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">
                    <table id="example1"  class="table table-bordered table-striped">
                        <thead>
                            <th>No.</th>
                            <th>ID</th>
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
                            <th>Hotspot</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->name_event }}</td>
                                @php $path = Storage::url('image-logo/'.$event->logo_event); @endphp
                                <td><img src="{{ url($path) }}" height="80px"></td>
                                <td>{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</td>
                                <td>{{ $event->category_event }}</td>
                                <td>{{ $event->info_event }}</td>
                                <td>{{ $event->lat_event ? '(' . $event->lat_event . '), (' . $event->lng_event . ')' : '-' }}</td>
                                <td>{{ $event->lat_event_end ? '(' . $event->lat_event_end . '), (' . $event->lng_event_end . ')' : '-' }}</td>
                                <td>{{ $event->address_event ? $event->address_event : '-' }}</td>
                                @foreach($event->event_hotspot as $hotspot)
                                @if($hotspot->release_time_hotspot)
                                <td>{{ $hotspot ? str_replace('T', ' ', $hotspot->release_time_hotspot) : '-' }}</td>
                                <td>{{ $hotspot->expired_time_hotspot ? str_replace('T', ' ', $hotspot->expired_time_hotspot) : '-' }}</td>
                                @break
                                @endif
                                @endforeach 
                                <td>Rp {{ number_format($event->price_event, 2) }}</td>
                                <td>{{ $event ? str_replace('T', ' ', $event->due_join_date_event) : '-' }}</td>
                                <td>{{ $event->hotspot_length_event }}</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#hotspotModal{{$event->id}}"><span class="font-weight-bold ml-1">Hotspot</span></a>
                                    <a href="#" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#editModal{{$event->id}}"><span class="font-weight-bold ml-1">Edit</span></a> 
                                    <a href="#" class="btn btn-danger btn-sm delete-event" data-toggle="modal"
                                    data-target="#deleteModal{{$event->id}}"><span
                                    class="font-weight-bold ml-1">Hapus</span></a></td>

                                    <!-- Hotspot Modal -->
                                    <div class="modal fade" id="hotspotModal{{$event->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Daftar Hotspot</h4>
                                                </div>
                                                <form action="/club/event/update-hotspot" method="POST">
                                                    <div class="modal-body">
                                                        {{ csrf_field() }}
                                                        @foreach($event->event_hotspot as $hotspot)
                                                        <div class="h4">
                                                            <b>{{ 'Hotspot ' . ($loop->index+1) }}</b>
                                                            @if(count($event->event_hotspot) > 1)
                                                            <a href="#" data-toggle="modal" data-target="#deleteHotspot{{ $hotspot->id }}" class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                            @endif
                                                        </div>
                                                        <input type="hidden" name="ids[]" value="{{ $hotspot->id }}">
                                                        <div class="form-group">
                                                            <label for="">Waktu Mulai Lomba</label>
                                                            <input type="datetime-local" step="1" name="release_time_hotspots[]" class="form-control" placeholder="Isi waktu mulai lomba" required value="{{ $hotspot->release_time_hotspot ? date('Y-m-d\TH:i:s', strtotime($hotspot->release_time_hotspot)) : '' }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Waktu Selesai Lomba</label>
                                                            <input type="datetime-local" step="1" name="expired_time_hotspots[]" class="form-control" placeholder="Isi waktu selesai lomba" value="{{ $hotspot->expired_time_hotspot ? date('Y-m-d\TH:i:s', strtotime($hotspot->expired_time_hotspot)) : '' }}">
                                                        </div>

                                                        <!-- Delete Hotspot -->
                                                        <div class="modal fade" id="deleteHotspot{{$hotspot->id}}" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data Hotspot</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        {{ csrf_field() }}
                                                                        Apakah anda yakin ingin menghapus Hotspot {{ $loop->index+1 }}?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <div class="form-group d-flex justify-content-end">
                                                                            <a href="/club/event/delete-hotspot/{{$hotspot->id}}/{{$event->id}}" class="btn btn-primary">Hapus</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Delete Hotspot -->
                                                        @endforeach
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-between">
                                                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#addHotspot{{$event->id}}"><span class="font-weight-bold ml-1">Tambah Hotspot</span></a>
                                                        <input type="submit" value="Simpan" class="btn btn-primary">
                                                        <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Hotspot Modal -->

                                    <!-- Add Hotspot Modal -->
                                    <div class="modal fade" id="addHotspot{{$event->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Tambah Hotspot</h4>
                                                </div>
                                                <form action="/club/event/add-hotspot" method="POST">
                                                    <div class="modal-body">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_event" value="{{ $event->id }}">
                                                        <div class="form-group">
                                                            <label for="">Waktu Mulai Lomba</label>
                                                            <input type="datetime-local" step="1" name="release_time_hotspot" class="form-control" placeholder="Isi waktu mulai lomba" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Waktu Selesai Lomba</label>
                                                            <input type="datetime-local" step="1" name="expired_time_hotspot" class="form-control" placeholder="Isi waktu selesai lomba">
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
                                    <!-- End Add Hotspot Modal -->

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal{{$event->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Edit Data Lomba</h4>
                                                </div>
                                                <form action="/club/event/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
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
                                                            <label for="">Harga Pendaftaran Lomba</label>
                                                            <input type="number" name="price_event" class="form-control" placeholder="Isi harga pendaftaran lomba" required step=100 value="{{ $event->price_event }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Batas Waktu Pendaftaran</label>
                                                            <input type="datetime-local" step="1" id="due_join_date_event_update" name="due_join_date_event" class="form-control" placeholder="Isi batas pendaftaran lomba" value="{{ $event->due_join_date_event }}">
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
                                                        <a href="/club/event/delete/{{$event->id}}" class="btn btn-primary">Hapus</a>
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
            </div>
        </div>
    </div>
</div>
@endsection
@push('bottom-script')
<script src="{{ url('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function () {
        $('#example1').DataTable({
            'scrollX'     : true,
        })
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'scrollX'     : true,
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