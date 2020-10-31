@extends('subscribed.layout.subscribed')
@section('title')
    Team
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url(image/breadcumb-1.jpg);">
    <div class="bradcumbContent">
        <h2>Team Details</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->
<div class="row mt-5 px-5 mb-5">
    <div class="col-12">
        {{-- @foreach ($team as $item) --}}
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <h4>Team Details</h4>
                @if (count($pigeon)!=0)
                <a href="#tambah_jenisstandar{{ $team->id }}" class="btn btn-primary" data-toggle="modal"
                    data-target="#tambah_jenisstandar{{ $team->id }}">Join {{ $team->name_team }}</a>
                @endif
                
            </div>
        </div>
            
            
            <h5>Nama Team : <b style="color: red">{{ $team->name_team }}</b></h5>
            <h5>Deskripsi Team : <b style="color: red">{{ $team->desc_team }}</b></h5>
            <h5>Pemilik Team : <b style="color: red">{{ $team->user->username }}</b></h5>
            
            <div class="modal fade" id="tambah_jenisstandar{{ $team->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Team</h5>
                            <button class="close" type="button" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/team/join-team-details" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Pigeon</label>
                                    <input type="hidden" name="id_team" value="{{ $team->id }}">
                                    <select name="id_pigeon" class="form-control" required>
                                        <option value="">-- Pilih Pigeon --</option>
                                        @foreach($pigeon as $pigeons)
                                        {{-- @if ($item->id!=$pigeons->id_team) --}}
                                        <option value="{{$pigeons->pigeon_id}}">{{$pigeons->uid_pigeon}} - {{$pigeons->name_pigeon}} ({{$pigeons->name_club}})</option>
                                        {{-- @endif --}}
                                        @endforeach
                                      </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Simpan" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button"
                                data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        {{-- @endforeach --}}
    </div>
</div>


@endsection