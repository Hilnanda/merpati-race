@extends('subscribed.layout.subscribed')
@section('title')
Kategori Lomba
@endsection
@section('content')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
    <div class="bradcumbContent">
        <h2>Lomba</h2>
    </div>
</div>
<!-- bg gradients -->
<div class="bg-gradients mb-5"></div>
<!-- ##### Breadcumb Area End ##### -->

<div class="row mx-5 mt-5 mb-2">
    <div class="col">
        <h3>Kategori Lomba</h3>
    </div>
</div>
<div class="row mx-5 mb-5">
    <!-- /.box-header -->
    <div class="col-md-4">
        <!-- Single Menu -->
        <a href="/events">
            <div class="single-music-player">
                <img src="{{ asset('image/burung2.jpg') }}" alt="" style="width: 100%;">

                <div class="music-info d-flex justify-content-between">
                    <div class="music-text">
                        <h5>Lomba Umum</h5>
                        <p>Antar Team dan Pigeon</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <!-- Single Menu -->
        <a href="/events-club">
            <div class="single-music-player">
                <img src="{{ asset('image/burung2.jpg') }}" alt="" style="width: 100%;">

                <div class="music-info d-flex justify-content-between">
                    <div class="music-text">
                        <h5>Lomba Club</h5>
                        <p>Antar Club</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <!-- /.box-body -->
</div>
@endsection