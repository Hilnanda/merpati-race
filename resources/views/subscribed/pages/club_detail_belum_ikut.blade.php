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
                    <h4>Club Details</h4>    
                    @foreach ($club as $item)                        
                    <h5>Nama Club : <b style="color: red">{{ $item->name_club }}</b></h5>
                    <h5>Alamat Club : <b style="color: red">{{ $item->address_club }}</b></h5>
                    <h5>Pemilik Team : <b style="color: red">{{ $item->user->username }}</b></h5>
                    @endforeach
                </div>
            </div>
            
        </div>
        <!-- /.box-body -->
    </div>
</div>

@endsection