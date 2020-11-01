@extends('subscribed.layout.subscribed')
@section('title')
    Club
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url(image/breadcumb-1.jpg);">
    <div class="bradcumbContent">
        <h2>Club Details</h2>
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
                @foreach ($club as $item)
                <h4>Club Details</h4>
                @if (count($pigeon)!=0)            
                    <a href="#tambah_jenisstandar{{ $item->id }}" class="btn btn-primary" data-toggle="modal"
                        data-target="#tambah_jenisstandar{{ $item->id }}">Join Club</a>
                        @endif     
            </div>
        </div>
        <h5>Nama Club : <b style="color: red">{{ $item->name_club }}</b></h5>
        <h5>Alamat Club : <b style="color: red">{{ $item->address_club }}</b></h5>
        <h5>Pemilik Team : <b style="color: red">{{ $item->user->username }}</b></h5>
        
        <div class="modal fade" id="tambah_jenisstandar{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Join club</h5>
                        <button class="close" type="button" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/club/join" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Pigeon</label>
                                <input type="hidden" name="id_club" value="{{ $item->id }}">
                                <select name="id_pigeon" class="form-control" required>
                                    <option value="">-- Pilih Pigeon --</option>
                                    @foreach($pigeon as $pigeons)
                                            @if ($item->id!=$pigeons->id_club)
                                            <option value="{{$pigeons->id}}">{{$pigeons->uid_pigeon}} - {{$pigeons->name_pigeon}}</option>
                                            @endif                                                       
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
        @endforeach
    </div>
</div>


@endsection