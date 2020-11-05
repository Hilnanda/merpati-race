@extends('subscribed.layout.subscribed')
@section('title')
    Burung
@endsection
@section('content')
    <!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Pigeons</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mt-5 px-5 mb-5">
    <div class="col-lg-12">
        <!-- /.box-header -->
        {{-- <h4>Lomba Sedang Berlangsung</h4> --}}
        <div class="row mb-3" sytle="margin:0px auto;">
            <div class="col-lg-6">
                <div class="card" style="width: 30rem;">
                  <img class="card-img-top" src="image/burung1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">TOP BURUNG</h5>
                    <p class="card-text">Menampilkan daftar burung terbaik.</p>
                    <a href="/pigeons/topburung" class="btn btn-primary">Go</a>
                  </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card" style="width: 30rem;">
                  <img class="card-img-top" src="image/burung1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">BURUNGKU</h5>
                    <p class="card-text">Menampilkan daftar burung yang dimiliki</p>
                    <a href="/pigeons/burungku" class="btn btn-primary">Go</a>
                  </div>
                </div>
            </div>
        </div>
        
        <!-- /.box-body -->
    </div>
</div>

@endsection