@extends('subscribed.layout.subscribed')

@section('title')
    Detail Club
@endsection
@section('content')
 <!-- ##### Breadcumb Area Start ##### -->
 <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url(image/breadcumb-1.jpg);">
    <div class="bradcumbContent">
        <h2>List Club</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        
        <div class="box-body">
            <div class="row" style="margin-bottom: 20px">
                <div class="col-12">                   
                    @foreach ($club_ikut as $item)                        
                    <h5>Nama Team : <b style="color: red">{{ $team->name_team }}</b></h5>
                    <h5>Deskripsi Team : <b style="color: red">{{ $team->desc_team }}</b></h5>
                    <h5>Pemilik Team : <b style="color: red">{{ $team->user->username }}</b></h5>
                    @endforeach
                </div>
            </div>
            
        </div>
        <!-- /.box-body -->
    </div>
</div>

@endsection