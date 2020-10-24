@extends('layouts.app_other')
@section('title')
    Club
@endsection
@section('subtitle')
    Training Club
@endsection
@push('top-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@endpush
@section('content')
<div class="music-player-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12" style="overflow-y: auto">
            <form action="{{url('/club/add_training/post')}}" method="POST" >
                    @csrf
                    <div class="form-group">
                      <label for="exampleFormControlInput1">ID User</label>
                    <input type="text"  class="form-control" id="exampleFormControlInput1" disabled>
                    </div>                    
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Nama Club</label>
                      <input type="text" name="" class="form-control" id="exampleFormControlInput1">
                    </div>                    
                    <div class="form-group">
                      <label for="exampleFormControlInput2">Latitude</label>
                      <input type="number" step="any"  class="form-control" id="exampleFormControlInput2">
                    </div>                    
                    <div class="form-group">
                      <label for="exampleFormControlInput2">Latitude</label>
                      <input type="number" step="any"  class="form-control" id="exampleFormControlInput2">
                    </div>                    
                   
                   
                  </form>               
               
            </div>
        </div>


    </div>
</div>
@endsection