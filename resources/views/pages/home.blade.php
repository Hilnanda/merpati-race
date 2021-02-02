@extends('layouts.app')

@section('title')
    Home
@endsection
@push('top-style')
    <!-- kanggo -->
    <link
    rel="stylesheet"
    id="elementor-animations-css"
    href="{{ url('home-layout/pointclock.online/wp-content/plugins/elementor/assets/lib/animations/animations.min952b.css') }}"
    type="text/css"
    media="all"
    />
    <!-- kanggo -->
    <link
    rel="stylesheet"
    id="elementor-frontend-css"
    href="{{ url('home-layout/pointclock.online/wp-content/plugins/elementor/assets/css/frontend.min952b.css') }}"
    type="text/css"
    media="all"
    />
    <!-- kanggo -->
    <link
    rel="stylesheet"
    id="elementor-post-59-css"
    href="{{ url('home-layout/pointclock.online/wp-content/uploads/elementor/css/post-5922ec.css') }}"
    type="text/css"
    media="all"
    />
    <!-- kanggo -->
    <link
    rel="stylesheet"
    id="google-fonts-1-css"
    href="https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CPoppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7COpen+Sans%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;ver=5.6"
    type="text/css"
    media="all"
    />
    <!-- kanggo -->
    <link
    rel="stylesheet"
    id="elementor-icons-shared-0-css"
    href="{{ url('home-layout/pointclock.online/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.minb683.css') }}"
    type="text/css"
    media="all"
    />
    <!-- kanggo -->
    <link
    rel="stylesheet"
    id="elementor-icons-fa-regular-css"
    href="{{ url('home-layout/pointclock.online/wp-content/plugins/elementor/assets/lib/font-awesome/css/regular.minb683.css') }}"
    type="text/css"
    media="all"
    />
    <!-- kanggo -->
    <link
    rel="stylesheet"
    id="elementor-icons-fa-solid-css"
    href="{{ url('home-layout/pointclock.online/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.minb683.css') }}"
    type="text/css"
    media="all"
    />
    <!-- kanggo -->
    <link
    rel="stylesheet"
    id="elementor-icons-fa-brands-css"
    href="{{ url('home-layout/pointclock.online/wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.minb683.css') }}"
    type="text/css"
    media="all"
    />
    <!-- kanggo -->
    <script
    type="text/javascript"
    src="{{ url('home-layout/pointclock.online/wp-includes/js/jquery/jquery.min9d52.js') }}"
    id="jquery-core-js"
    ></script>
    <!-- kanggo -->
    <script
    type="text/javascript"
    src="{{ url('home-layout/pointclock.online/wp-includes/js/jquery/jquery-migrate.mind617.js') }}"
    id="jquery-migrate-js"
    ></script>
    <!-- kanggo -->
    <script
    type="text/javascript"
    src="{{ url('home-layout/pointclock.online/wp-content/themes/jupiterx-lite/lib/assets/dist/js/utils.min782e.js') }}"
    id="jupiterx-utils-js"
    ></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <style>
        /* .fitur{
            padding: 10px;
            height: 600px;
        } */
        
        .gambar {
            width: 500px;
            border-radius: 3px
            /* margin-bottom: 20px; */
        }
       
        
        #landing {
            display: none;
        }
        
        .video {
            object-fit: initial;
  width: 100%;
  height: 650px;
    
}
@media only screen and (max-width: 767px) {
    #preorder {
        margin-bottom: 50px;
    }
    #landing {
            display: block;
        }
    #image-back {
        display: none;
    }
    .video {
  /* object-fit: cover; */
  /* position: absolute; */
  object-fit: initial;
  width: 100%;
  height: 500px;
    
    
    }
    .center {
        text-align: center;
    }
    .fitur{
        margin-bottom: 20px;
    }
}
    </style>

    
@endpush
@section('content')

    {{-- @if(!Auth::user()) --}}
    {{-- <section class="hero-area">
        
            <!-- Single Hero Slide -->
            @if (count($data_header)!=0)
                
            
            @foreach ($data_header as $item)
            <div class="hero-slides owl-carousel" >
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url('image/burung{{$loop->index+1}}.jpg');"></div>
                <!-- Slide Content -->
                <div class="hero-slides-content text-center">
                    <h2 data-animation="fadeInUp" data-delay="100ms">{{ $item->name_corousel }} <span>{{ $item->name_corousel }}</span></h2>
                    <p data-animation="fadeInUp" data-delay="300ms">{{ $item->desc_title }}</p>
                </div>
                <!-- Big Text -->
                <h2 class="big-text">{{ $item->name_corousel }}</h2>
            </div>
        </div>
            @endforeach
            @else --}}
            {{-- <div class="single-hero-slide d-flex align-items-center justify-content-center" style="border-right: ">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{ url('image/burung2.jpg') }});"></div>
                <!-- Slide Content -->
                <div class="hero-slides-content text-center">
                    <h2 data-animation="fadeInUp" data-delay="100ms"><img src="{{ asset('image/point.png') }}" alt=""> <span>Pigeon Time</span></h2>
                    <p data-animation="fadeInUp" data-delay="300ms">Pigeon Time</p>
                </div>
                <!-- Big Text -->
                <h2 class="big-text">Pigeon Time</h2>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{ url('image/burung3.jpg') }});"></div>
                <!-- Slide Content -->
                <div class="hero-slides-content text-center">
                    <h2 data-animation="fadeInUp" data-delay="100ms">Pigeon Time <span>Pigeon Time</span></h2>
                    <p data-animation="fadeInUp" data-delay="300ms">Pigeon Time</p>
                </div>
                <!-- Big Text -->
                <h2 class="big-text">Pigeon Time</h2>
            </div> --}}
            <div class="front-video">
                <video class="video" src="{{ asset('image/pigeon.mp4') }}"  autoplay loop playsinline muted></video>

            </div>
            <div class="slide-down" id="scrollDown" style="bottom: 40%">
                <img src="{{ asset('image/point.png') }}" alt="">
                <h3 class="center" style="color: white"><b>Made With Passion For Technology</b></h3>
            </div>
            
            {{-- @endif --}}
            
              
            <!-- Single Hero Slide -->
            {{-- <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{ url('image/burung2.jpg') }});"></div>
                <!-- Slide Content -->
                <div class="hero-slides-content text-center">
                    <h2 data-animation="fadeInUp" data-delay="100ms">Colorlib <span>Colorlib</span></h2>
                    <p data-animation="fadeInUp" data-delay="300ms">Music Template</p>
                </div>
                <!-- Big Text -->
                <h2 class="big-text">Colorlib</h2>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{ url('image/burung3.jpg') }});"></div>
                <!-- Slide Content -->
                <div class="hero-slides-content text-center">
                    <h2 data-animation="fadeInUp" data-delay="100ms">Festival <span>Festival</span></h2>
                    <p data-animation="fadeInUp" data-delay="300ms">Festival Merpati</p>
                </div>
                <!-- Big Text -->
                <h2 class="big-text">Festival</h2>
            </div> --}}

        
        
      
        <!-- bg gradients -->
        {{-- <div class="bg-gradients"></div> --}}

        <!-- Slide Down -->
        <div class="slide-down" id="scrollDown1">
            <h6>Slide Down</h6>
            <div class="line"></div>
        </div>
    </section>
    
    <!-- ##### Hero Area End ##### -->

    <!-- ##### About Us Area Start ##### -->

    <!-- ##### About Us Area End ##### -->

    <!-- ##### Upcoming Shows Area Start ##### -->
    {{-- @else --}}
    {{-- <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});"> --}}
        {{-- <div class="bradcumbContent">
            <h2>List Club</h2>
        </div> --}}
    {{-- </div> --}}
    {{-- @endif --}}
    

      
        
    <!-- bg gradients -->
    <div class="" style="" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark">
                        {{-- <h2 >Perlombaan merpati</h2> --}}
                        {{-- <h5 >Website Untuk Perlombaan Burung Merpati.</h5> --}}
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
				<div class="col-md-6">
					<div class="card fitur" data-aos="fade-right">
                        <a href="/club">						
                            <img class="card-img-top gambar"  alt="Bootstrap Thumbnail First" src="{{ url('image-logo/PR.png') }}" />
                        </a>
						{{-- <div class="card-block">
							
							<div class="featured-shows-content">
                                <div class="shows-text">
                                    <a href="/one_loft_race" class="buy-tickets-btn"><h4>One Loft Race</h4>
                                        </a>
                                </div>
                                <div class="bg-gradients"></div>
                            </div>
						</div> --}}
					</div>
				</div>
				<div class="col-md-6">
					<div class="card fitur" data-aos="fade-left">
                        <a href="/one_loft_race">						
                            <img class="card-img-top gambar" alt="Bootstrap Thumbnail Second" src="{{ url('image-logo/OLR.png') }}" />
                        </a>
						{{-- <div class="card-block">
							
							<div class="featured-shows-content">
                                <div class="shows-text">
                                    <a href="/club" class="buy-tickets-btn"><h4>Public Race</h4>
                                        </a>
                                </div>
                                <div class="bg-gradients"></div>
                            </div>
						</div> --}}
					</div>
				</div>
				
			</div>

            
        </div>
    </div>

    <div class="music-player-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" >
                    <div data-aos="fade-up" class="section-heading dark">
                        {{-- <h2 >Event</h2> --}}
                        
                    </div>
                    <div class="fitness-blog-posts">

                        <!-- Single Post Start -->
                       
                        <div class="row mt-5 px-5">
                            <div class="col-lg-12">
                                <!-- /.box-header -->
                                <h4>List Event</h4>
                                <div class="box-body" style="overflow-x:auto;">
                                    <table id="table_two" class="table table-bordered table-striped" >
                                        <thead>
                                            <th>No.</th>
                                            <!-- <th>ID</th> -->
                                            <th>Nama</th>
                                            <th>Logo</th>
                                            <!-- <th>Jenis Lomba</th> -->
                                            <!-- <th>Kategori</th> -->
                                            <th>Info</th>
                                            <th>Negara</th>
                                            <th>Lokasi Mulai</th>
                                            <!-- <th>Lokasi Selesai</th> -->
                                            <th>Alamat</th>
                                            <th>Mulai</th>
                                            <!-- <th>Selesai</th> -->
                                            <th>Harga Pendaftaran</th>
                                            <th>Batas Pendaftaran</th>
                                            <th>Status</th>
                                            {{-- <th>Hotspot</th> --}}
                                            {{-- <th>Aksi</th> --}}
                                        </thead>
                                        <tbody>
                                            @foreach ($events as $event)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <!-- <td>{{ $event->id }}</td> -->
                                                <td class="action-link">
                                                    <a href="/club/event-club/{{ $event->id }}" style="font-size: 14px;">{{ $event->name_event }}</a></td>
                                                @php $path = Storage::url('image-logo/'.$event->logo_event); @endphp
                                                <td><a href="/club/event-club/{{ $event->id }}"><img src="{{ asset('image/'.$event->logo_event.'') }}" style="max-height: 80px; height: auto; width: auto;"></a></td>
                                                <!-- <td>{{ $event->lat_event_end ? 'One Loft Race' : 'Pigeon Race' }}</td> -->
                                                <!-- <td>{{ $event->category_event }}</td> -->
                                                <td>{{ $event->info_event }}</td>
                                                <td>{{ $event->country_event }}</td>
                                                <td>{{ $event->lat_event ? '(' . $event->lat_event . '), (' . $event->lng_event . ')' : '-' }}
                                                </td>
                                                <!-- <td>{{ $event->lat_event_end ? '(' . $event->lat_event_end . '), (' . $event->lng_event_end . ')' : '-' }} -->
                                                </td>
                                                <td>{{ $event->address_event ? $event->address_event : '-' }}</td>
                                                @foreach($event->event_hotspot as $hotspot)
                                                @if($hotspot->release_time_hotspot)
                                                <td>{{ $hotspot ? str_replace('T', ' ', date('d F Y  H:i:s', strtotime($hotspot->release_time_hotspot))) : '-' }}</td>
                                                <!-- <td>{{ $hotspot->expired_time_hotspot ? str_replace('T', ' ', date('d F Y  H:i:s', strtotime($hotspot->expired_time_hotspot))) : '-' }}</td> -->
                                                @break
                                                @endif
                                                @endforeach 
                                                <td>Rp {{ number_format($event->price_event, 2) }}</td>
                                                <td>{{ $event ? str_replace('T', ' ', date('d F Y  H:i:s', strtotime($event->due_join_date_event))) : '-' }}</td>
                                                <td style="color: {{ $event->color ? $event->color : '' }};">
                                                    <strong>{{ $event ? $event->status : '-' }}</strong>
                                                    @if($event->status != 'Terbang')
                                                    <br>
                                                    <br>
                                                    <a href="#" title="Mulai Lomba" data-toggle="modal" class="btn-sm btn-warning" data-target="#startRace{{ $event->id }}">Mulai</a>
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $event->hotspot_length_event }}</td> --}}
                                                {{-- <td class="action-link">
                                                    
                                                    <div style="display: inline-flex;">
                                                        @if($event->lng_event && $event->lat_event)
                                                        <a href="/club/events/{{$event->id}}/1/basket" title="Proses Inkorf" class="mx-1"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                        @endif
                                                        @if($event->status == 'Terbang')
                                                        <a href="/club/events/{{$event->id}}/1/live-result" title="Hasil Lomba" class="mx-1"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
                                                        @endif
                                                        <!-- <a href="#" title="Set Titik Lokasi" class="mx-1" data-toggle="modal" data-target="#setPoint{{$event->id}}">
                                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        </a> -->
                                                    </div>
                                                </td> --}}
                                                <!-- Modal Set Point -->
                                                <div class="modal fade" id="setPoint{{$event->id}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Set Titik Lokasi Lomba</h4>
                                                            </div>
                                                            <form action="">
                                                                <div class="modal-body">
                                                                    {{-- <h5>URL Titik Lokasi Mulai</h5>
                                                                    <p class="text-info">http://pigeontime.live/event-start/{{$event->id}}/&lt;latitude&gt;/&lt;longitude&gt;</p>
                                                                    <p>contoh:<br>http://pigeontime.live/event-start/{{$event->id}}/-7.893274649955687/112.67354622885584</p> --}}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="form-group d-flex justify-content-end">
                                                                        <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
                                                                        data-dismiss="modal">Cancel</button>
                                                                        <input type="submit" value="Selesai" class="btn elementor-button-red elementor-size-md elementor-animation-grow">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Set Point -->
                        
                                                <!-- Modal Start Race -->
                                                <div class="modal fade" id="startRace{{$event->id}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Set Mulai Lomba</h4>
                                                            </div>
                                                            <form action="">
                                                                <div class="modal-body">
                                                                    <div class="form-group d-flex justify-content-between">
                                                                        <a href="/club/event/close-join/{{$event->id}}" title="Tutup pendaftaran sekarang" class="btn elementor-button-red elementor-size-md elementor-animation-grow">Tutup Pendaftaran</a>
                                                                        <a href="/club/event/start-now/{{$event->id}}/{{$event->event_hotspot[0]->id}}" title="Mulai lomba sekarang" class="btn elementor-button-blue elementor-size-md elementor-animation-grow">Mulai Sekarang</a>
                                                                        <a href="#" title="Atur kembali jadwal mulai" data-toggle="modal" class="btn elementor-button-black elementor-size-md elementor-animation-grow" data-dismiss="modal" data-target="#startLater{{ $event->id }}">Atur Jadwal</a>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="form-group d-flex justify-content-end">
                                                                        <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Start Race -->
                        
                                                <!-- Modal Start Later -->
                                                <div class="modal fade" id="startLater{{$event->id}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Set Mulai Lomba</h4>
                                                            </div>
                                                            <form action="/club/event/set-release/{{$event->event_hotspot[0]->id}}" method="POST">
                                                                <div class="modal-body">
                                                                    {{ csrf_field() }}
                                                                    <div class="form-group">
                                                                        <label for="">Waktu Mulai Lomba</label>
                                                                        <input type="datetime-local" step="1"
                                                                        id="release_time_hotspot_update"
                                                                        name="release_time_hotspot"
                                                                        class="form-control"
                                                                        placeholder="Isi waktu mulai lomba"
                                                                        value="{{ $event->release_time_event }}">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <div class="form-group d-flex justify-content-end">
                                                                        <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
                                                                        data-dismiss="modal">Cancel</button>
                                                                        <input type="submit" value="Simpan" class="btn elementor-button-blue elementor-size-md elementor-animation-grow">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Start Later -->
                        
                                                <!-- Hotspot Modal -->
                                                <div class="modal fade" id="hotspotModal{{ $event->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Daftar
                                                                Hotspot</h4>
                                                            </div>
                                                            <form action="/club/event/update-hotspot" method="POST">
                                                                <div class="modal-body">
                                                                    {{ csrf_field() }}
                                                                    @foreach ($event->event_hotspot as $hotspot)
                                                                    <div class="h4">
                                                                        <b>{{ 'Hotspot ' . ($loop->index + 1) }}</b>
                                                                        @if (count($event->event_hotspot) > 1)
                                                                        <a href="#" data-toggle="modal"
                                                                        data-target="#deleteHotspot{{ $hotspot->id }}"
                                                                        class="text-danger"><i
                                                                        class="fa fa-trash"
                                                                        aria-hidden="true"></i></a>
                                                                        @endif
                                                                    </div>
                                                                    <input type="hidden" name="ids[]"
                                                                    value="{{ $hotspot->id }}">
                                                                    <div class="form-group">
                                                                        <label for="">Waktu Mulai Lomba</label>
                                                                        <input type="datetime-local" step="1"
                                                                        name="release_time_hotspots[]"
                                                                        class="form-control"
                                                                        placeholder="Isi waktu mulai lomba"
                                                                        required
                                                                        value="{{ $hotspot->release_time_hotspot ? date('Y-m-d\TH:i:s', strtotime($hotspot->release_time_hotspot)) : '' }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Waktu Selesai Lomba</label>
                                                                        <input type="datetime-local" step="1"
                                                                        name="expired_time_hotspots[]"
                                                                        class="form-control"
                                                                        placeholder="Isi waktu selesai lomba"
                                                                        value="{{ $hotspot->expired_time_hotspot ? date('Y-m-d\TH:i:s', strtotime($hotspot->expired_time_hotspot)) : '' }}">
                                                                    </div>
                        
                                                                    <!-- Delete Hotspot -->
                                                                    <div class="modal fade"
                                                                    id="deleteHotspot{{ $hotspot->id }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title"
                                                                                id="exampleModalLabel">
                                                                                Konfirmasi Hapus Data
                                                                            Hotspot</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            {{ csrf_field() }}
                                                                            Apakah anda yakin ingin
                                                                            menghapus Hotspot
                                                                            {{ $loop->index + 1 }}?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <div
                                                                            class="form-group d-flex justify-content-end">
                                                                            <a href="/club/event/delete-hotspot/{{ $hotspot->id }}/{{ $event->id }}"
                                                                                class="btn elementor-button-red elementor-size-md elementor-animation-grow">Hapus</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Delete Hotspot -->
                                                            @endforeach
                                                        </div>
                                                        <div
                                                        class="modal-footer d-flex justify-content-between">
                                                        <a href="#" class="btn btn-warning"
                                                        data-toggle="modal"
                                                        data-target="#addHotspot{{ $event->id }}"><span
                                                        class="font-weight-bold ml-1">Tambah
                                                    Hotspot</span></a>
                                                    <input type="submit" value="Simpan"
                                                    class="btn elementor-button-blue elementor-size-md elementor-animation-grow">
                                                    <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Hotspot Modal -->
                        
                                <!-- Add Hotspot Modal -->
                                <div class="modal fade" id="addHotspot{{ $event->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Tambah
                                                Hotspot</h4>
                                            </div>
                                            <form action="/club/event/add-hotspot" method="POST">
                                                <div class="modal-body">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id_event"
                                                    value="{{ $event->id }}">
                                                    <div class="form-group">
                                                        <label for="">Waktu Mulai Lomba</label>
                                                        <input type="datetime-local" step="1"
                                                        name="release_time_hotspot"
                                                        class="form-control"
                                                        placeholder="Isi waktu mulai lomba"
                                                        required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Waktu Selesai Lomba</label>
                                                        <input type="datetime-local" step="1"
                                                        name="expired_time_hotspot"
                                                        class="form-control"
                                                        placeholder="Isi waktu selesai lomba">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="form-group d-flex justify-content-end">
                                                        <input type="submit" value="Simpan"
                                                        class="btn elementor-button-blue elementor-size-md elementor-animation-grow">
                                                        <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button" data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Add Hotspot Modal -->
                        
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $event->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Edit Data
                                                Lomba</h4>
                                            </div>
                                            <form action="/club/event/update/{{ $event->id }}"
                                                method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <label for="">Nama Lomba</label>
                                                        <input type="text" name="name_event"
                                                        class="form-control"
                                                        placeholder="Isi nama lomba" required
                                                        value="{{ $event->name_event }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="logo_event">Logo Lomba</label>
                                                        <input type="file" name="logo_event"
                                                        class="form-control"
                                                        placeholder="Isi logo lomba"
                                                        value="{{ $event->logo_event }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category_event">Kategori
                                                        Lomba</label>
                                                        <select class="form-control"
                                                        name="category_event">
                                                        <option value="" disabled selected>-- Pilih
                                                        kategori --</option>
                                                        @php
                                                        $categories = array('Individu', 'Team');
                                                        @endphp
                                                        @foreach ($categories as $category)
                                                        @if ($category == $event->category_event)
                                                        <option value="{{ $category }}"
                                                        selected>Lomba {{ $category }}
                                                    </option>
                                                    @else
                                                    <option value="{{ $category }}">
                                                    Lomba {{ $category }}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Informasi Tentang Lomba</label>
                                                <textarea name="info_event" class="form-control"
                                                required=""
                                                placeholder="Isi informasi lomba">{{ $event->info_event }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Negara</label>
                                                <select name="country_event" class="form-control" required>
                                                  <option value="">-- Pilih Negara --</option>
                                                  @foreach($negara as $value)
                                                    <option value="{{$value->nicename }}" @if($event->country_event==$value->nicename) selected @endif>{{$value->nicename}} ({{ $value->iso }}) </option>
                                                  @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="lng_event">Longitude Lomba</label>
                                                <input type="text" name="lng_event"
                                                class="form-control"
                                                placeholder="Isi lokasi longitude lomba"
                                                value="{{ $event->lng_event }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="lat_event">Latitude Lomba</label>
                                                <input type="text" name="lat_event"
                                                class="form-control"
                                                placeholder="Isi lokasi latitude lomba"
                                                value="{{ $event->lat_event }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="address_event">Alamat Lomba</label>
                                                <input type="text" name="address_event"
                                                class="form-control"
                                                placeholder="Isi alamat lomba"
                                                value="{{ $event->address_event }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Harga Pendaftaran Lomba</label>
                                                <input type="number" name="price_event"
                                                class="form-control"
                                                placeholder="Isi harga pendaftaran lomba"
                                                required step=100
                                                value="{{ $event->price_event }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Batas Waktu Pendaftaran</label>
                                                <input type="datetime-local" step="1"
                                                id="due_join_date_event_update"
                                                name="due_join_date_event"
                                                class="form-control"
                                                placeholder="Isi batas pendaftaran lomba"
                                                value="{{ $event->due_join_date_event }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="form-group d-flex justify-content-end">
                                                <input type="submit" value="Simpan"
                                                class="btn elementor-button-blue elementor-size-md elementor-animation-grow">
                                                <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
                                                data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Edit Modal -->
                        
                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">
                                        Konfirmasi Hapus Data Lomba</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{ csrf_field() }}
                                        Apakah anda yakin ingin menghapus
                                        {{ $event->name_event }}
                                    </div>
                                    <div class="modal-footer">
                                        <div class="form-group d-flex justify-content-end">
                                            <a href="/club/event/delete/{{ $event->id }}"
                                                class="btn elementor-button-red elementor-size-md elementor-animation-grow">Hapus</a>
                                                <button class="btn elementor-button-black elementor-size-md elementor-animation-grow" type="button"
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
            </div>


        </div>
    </div>

    <div class="music-player-area" id="landing" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" >
                    <img class="card-img-top gambar"  alt="Bootstrap Thumbnail First" src="{{ url('home-layout/pointclock.online/wp-content/uploads/2021/01/landing_board_point-removebg-preview.png') }}" />

                </div>
            </div>
        </div>
    </div>

    {{-- <div class="upcoming-shows-area section-padding-100" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark">
                        <h2 style="color: white">Perlombaan merpati</h2>
                        <h5 style="color: white">Website Untuk Perlombaan Burung Merpati.</h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="featured-shows-slides owl-carousel">

                        <!-- Single Featured Shows -->
                        <div class="single-featured-shows">
                            <img src="image-logo/burung.jpg" alt="">
                            <!-- Content -->
                            <div class="featured-shows-content">
                                <div class="shows-text">
                                    <a href="/pigeons" class="buy-tickets-btn"><h4>Pigeon</h4>
                                    </a>
                                </div>
                                <div class="bg-gradients"></div>
                            </div>
                        </div>

                        <!-- Single Featured Shows -->
                        <div class="single-featured-shows">
                            <img src="image-logo/pigeon-racing.jpg" alt="">
                            <!-- Content -->
                            <div class="featured-shows-content">
                                <div class="shows-text">
                                    <a href="/events/index" class="buy-tickets-btn"><h4>Lomba</h4>
                                        </a>
                                </div>
                                <div class="bg-gradients"></div>
                            </div>
                        </div>

                        <!-- Single Featured Shows -->
                        <div class="single-featured-shows">
                            <img src="image-logo/list.jpg" alt="">
                            <!-- Content -->
                            <div class="featured-shows-content">
                                <div class="shows-text">
                                    <a href="/results" class="buy-tickets-btn"><h4>Hasil</h4>
                                        </a>
                                </div>
                                <div class="bg-gradients"></div>
                            </div>
                        </div>

                        <!-- Single Featured Shows -->
                        <div class="single-featured-shows">
                            <img src="image-logo/club.jpg" alt="">
                            <!-- Content -->
                            <div class="featured-shows-content">
                                <div class="shows-text">
                                    <a href="/club" class="buy-tickets-btn"><h4>Club</h4>
                                        <p></p>
                                        </a>
                                </div>
                                <div class="bg-gradients"></div>
                            </div>
                        </div>

                        <!-- Single Featured Shows -->
                        <div class="single-featured-shows">
                            <img src="image-logo/team.jpg" alt="">
                            <!-- Content -->
                            <div class="featured-shows-content">
                                <div class="shows-text">
                                    <a href="/team" class="buy-tickets-btn"><h4>Team</h4>
                                        <p></p>
                                        </a>
                                </div>
                                <div class="bg-gradients"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ##### Upcoming Shows Area End ##### -->
    <div class="music-player-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" >
                    <div
                    data-elementor-type="wp-page"
                    data-elementor-id="59"
                    class="elementor elementor-59"
                    data-elementor-settings="[]"
                >
                    <div class="elementor-inner">
                        <div class="elementor-section-wrap">
                           
                            
                            <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-d4dd417 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                data-id="d4dd417"
                                data-element_type="section"
                                data-settings='{"background_background":"classic"}'
                            >
                                <div
                                    class="elementor-container elementor-column-gap-default" id="preorder"
                                >
                                    <div class="elementor-row">
                                        <div
                                            class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-67fa4763"
                                            data-id="67fa4763"
                                            data-element_type="column"
                                        >
                                            <div
                                                class="elementor-column-wrap elementor-element-populated"
                                            >
                                                <div
                                                    class="elementor-widget-wrap"
                                                >
                                                    <div
                                                        class="elementor-element elementor-element-7b7cba98 elementor-widget elementor-widget-image"
                                                        data-id="7b7cba98"
                                                        data-element_type="widget"
                                                        data-widget_type="image.default"
                                                    >
                                                        <div
                                                            class="elementor-widget-container"
                                                        >
                                                            <div
                                                                class="elementor-image"
                                                            >
                                                                <img
                                                                    width="500"
                                                                    height="500"
                                                                    src="wp-content/uploads/2021/01/landing_board_point-removebg-preview.png"
                                                                    class="attachment-large size-large"
                                                                    id="image-back"
                                                                    alt=""
                                                                    loading="lazy"
                                                                    srcset="
                                                                        http://pointclock.online/wp-content/uploads/2021/01/landing_board_point-removebg-preview.png         500w,
                                                                        http://pointclock.online/wp-content/uploads/2021/01/landing_board_point-removebg-preview-300x300.png 300w,
                                                                        http://pointclock.online/wp-content/uploads/2021/01/landing_board_point-removebg-preview-150x150.png 150w
                                                                    "
                                                                    sizes="(max-width: 500px) 100vw, 500px"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-607e55f4"
                                            data-id="607e55f4"
                                            data-element_type="column"
                                        >
                                            <div
                                                class="elementor-column-wrap elementor-element-populated"
                                            >
                                                <div
                                                    class="elementor-widget-wrap"
                                                >
                                                    <div
                                                        class="elementor-element elementor-element-d08d892 elementor-invisible elementor-widget elementor-widget-heading"
                                                        data-id="d08d892"
                                                        data-element_type="widget"
                                                        data-settings='{"_animation":"fadeInLeft"}'
                                                        data-widget_type="heading.default"
                                                    >
                                                        <div
                                                            class="elementor-widget-container"
                                                        >
                                                            <h2
                                                                class="elementor-heading-title elementor-size-large"
                                                            >
                                                                IOT "Internet Of
                                                                Things"
                                                                Technology
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-1889bc71 elementor-invisible elementor-widget elementor-widget-text-editor"
                                                        data-id="1889bc71"
                                                        data-element_type="widget"
                                                        data-settings='{"_animation":"fadeInUp","_animation_delay":400}'
                                                        data-widget_type="text-editor.default"
                                                    >
                                                        <div
                                                            class="elementor-widget-container" 
                                                        >
                                                            <div 
                                                                class="elementor-text-editor elementor-clearfix"
                                                            >
                                                                <p style="line-height: 25px;">
                                                                    <span
                                                                        style="
                                                                            color: #ff0000;
                                                                        "
                                                                        ><strong
                                                                            >POINT</strong
                                                                        ></span
                                                                    >
                                                                    <strong
                                                                        ><span
                                                                            style="
                                                                                color: #0000ff;
                                                                            "
                                                                            ><em
                                                                                >Clocking
                                                                                system</em
                                                                            >
                                                                        </span></strong
                                                                    >dengan
                                                                    <b
                                                                        style="
                                                                            font-style: italic;
                                                                        "
                                                                        >Internet
                                                                        of
                                                                        Thing (IoT)</b
                                                                    >
                                                                    memiliki
                                                                    kemampuan
                                                                    untuk
                                                                    mentransfer
                                                                    data
                                                                    otomatis
                                                                    melalui
                                                                    jaringan
                                                                    tanpa
                                                                    memerlukan
                                                                    interaksi
                                                                    manusia ke
                                                                    manusia atau
                                                                    manusia ke
                                                                    komputer. 
                                                                    Point
                                                                    Clocking
                                                                    system
                                                                    merupakan
                                                                    Produsen
                                                                    pertama di
                                                                    Dunia yang
                                                                    menciptakan
                                                                    system
                                                                    perlombaan
                                                                    merpati pos
                                                                    dengan IOT
                                                                    Technology 
                                                                    dari RFID
                                                                    System
                                                                    dengan 
                                                                    konvergensi
                                                                    teknologi
                                                                    nirkabel, micro-electromechanical systems
                                                                    (MEMS), dan
                                                                    digabungkan
                                                                    dengan
                                                                    Internet.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-7e2eaa79 elementor-align-left elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                        data-id="7e2eaa79"
                                                        data-element_type="widget"
                                                        data-widget_type="icon-list.default"
                                                    >
                                                        <div
                                                            class="elementor-widget-container"
                                                        >
                                                            <ul
                                                                class="elementor-icon-list-items"
                                                            >
                                                                <li
                                                                    class="elementor-icon-list-item"
                                                                >
                                                                    <span
                                                                        class="elementor-icon-list-icon"
                                                                    >
                                                                        <i
                                                                            aria-hidden="true"
                                                                            class="far fa-money-bill-alt"
                                                                        ></i>
                                                                    </span>
                                                                    <span
                                                                        class="elementor-icon-list-text"
                                                                        >Free
                                                                        Club
                                                                        System
                                                                        untuk
                                                                        Klub/Organizer</span
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="elementor-icon-list-item"
                                                                >
                                                                    <span
                                                                        class="elementor-icon-list-icon"
                                                                    >
                                                                        <i
                                                                            aria-hidden="true"
                                                                            class="fas fa-cogs"
                                                                        ></i>
                                                                    </span>
                                                                    <span
                                                                        class="elementor-icon-list-text"
                                                                        >High
                                                                        Strength
                                                                        Material</span
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="elementor-icon-list-item"
                                                                >
                                                                    <span
                                                                        class="elementor-icon-list-icon"
                                                                    >
                                                                        <i
                                                                            aria-hidden="true"
                                                                            class="fab fa-envira"
                                                                        ></i>
                                                                    </span>
                                                                    <span
                                                                        class="elementor-icon-list-text"
                                                                        >No
                                                                        Hassle (
                                                                        Hanya
                                                                        dengan
                                                                        Unit
                                                                        Landing
                                                                        Board
                                                                        tanpa
                                                                        Unit
                                                                        Jam)</span
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="elementor-icon-list-item"
                                                                >
                                                                    <span
                                                                        class="elementor-icon-list-icon"
                                                                    >
                                                                        <i
                                                                            aria-hidden="true"
                                                                            class="fas fa-bolt"
                                                                        ></i>
                                                                    </span>
                                                                    <span
                                                                        class="elementor-icon-list-text"
                                                                        >2 days
                                                                        Stand by
                                                                        without
                                                                        Electricity</span
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="elementor-icon-list-item"
                                                                >
                                                                    <span
                                                                        class="elementor-icon-list-icon"
                                                                    >
                                                                        <i
                                                                            aria-hidden="true"
                                                                            class="fas fa-heart"
                                                                        ></i>
                                                                    </span>
                                                                    <span
                                                                        class="elementor-icon-list-text"
                                                                        >Fast &
                                                                        Reliable
                                                                        Transfering
                                                                        Data to
                                                                        Internet</span
                                                                    >
                                                                </li>
                                                                <li
                                                                    class="elementor-icon-list-item"
                                                                >
                                                                    <span
                                                                        class="elementor-icon-list-icon"
                                                                    >
                                                                        <i
                                                                            aria-hidden="true"
                                                                            class="fas fa-money-bill-wave-alt"
                                                                        ></i>
                                                                    </span>
                                                                    <span
                                                                        class="elementor-icon-list-text"
                                                                        >Ekonomis
                                                                        - Pay as
                                                                        You
                                                                        Go</span
                                                                    >
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <section
                                                        class="elementor-section elementor-inner-section elementor-element elementor-element-15ea6743 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                                                        data-id="15ea6743"
                                                        data-element_type="section"
                                                    >
                                                        <div
                                                            class="elementor-container elementor-column-gap-no"
                                                        >
                                                            <div
                                                                class="elementor-row"
                                                            >
                                                                <div
                                                                    class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-10856d08"
                                                                    data-id="10856d08"
                                                                    data-element_type="column"
                                                                >
                                                                    <div
                                                                        class="elementor-column-wrap elementor-element-populated"
                                                                    >
                                                                        <div
                                                                            class="elementor-widget-wrap"
                                                                        >
                                                                            <div
                                                                                class="elementor-element elementor-element-61fe571c elementor-align-left elementor-widget elementor-widget-button"
                                                                                data-id="61fe571c"
                                                                                data-element_type="widget"
                                                                                data-widget_type="button.default"
                                                                            >
                                                                                <div
                                                                                    class="elementor-widget-container"
                                                                                >
                                                                                    <div
                                                                                        class="elementor-button-wrapper"
                                                                                    >
                                                                                        <a
                                                                                            href="http://wa.me/6281910268798"
                                                                                            target="_blank"
                                                                                            class="elementor-button-link elementor-button elementor-size-xs elementor-animation-grow"
                                                                                            role="button"
                                                                                        >
                                                                                            <span
                                                                                                class="elementor-button-content-wrapper"
                                                                                            >
                                                                                                <span
                                                                                                    class="elementor-button-text"
                                                                                                    >Pre
                                                                                                    Order
                                                                                                    Now</span
                                                                                                >
                                                                                            </span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-36a63231"
                                                                    data-id="36a63231"
                                                                    data-element_type="column"
                                                                >
                                                                    <div
                                                                        class="elementor-column-wrap elementor-element-populated"
                                                                    >
                                                                        <div
                                                                            class="elementor-widget-wrap"
                                                                        >
                                                                            <div
                                                                                class="elementor-element elementor-element-64b55606 elementor-align-center elementor-widget elementor-widget-button"
                                                                                data-id="64b55606"
                                                                                data-element_type="widget"
                                                                                data-widget_type="button.default"
                                                                            >
                                                                                <div
                                                                                    class="elementor-widget-container"
                                                                                >
                                                                                    <div
                                                                                        class="elementor-button-wrapper"
                                                                                    >
                                                                                        <a
                                                                                            href="http://wa.me/6281910268798"
                                                                                            target="_blank"
                                                                                            class="elementor-button-link elementor-button elementor-size-md elementor-animation-grow"
                                                                                            role="button"
                                                                                        >
                                                                                            <span
                                                                                                class="elementor-button-content-wrapper"
                                                                                            >
                                                                                                <span
                                                                                                    class="elementor-button-icon elementor-align-icon-left"
                                                                                                >
                                                                                                    <i
                                                                                                        aria-hidden="true"
                                                                                                        class="far fa-life-ring"
                                                                                                    ></i>
                                                                                                </span>
                                                                                                <span
                                                                                                    class="elementor-button-text"
                                                                                                    >FAQ</span
                                                                                                >
                                                                                            </span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-264f372f elementor-section-full_width elementor-section-content-top elementor-section-height-default elementor-section-height-default"
                                data-id="264f372f"
                                data-element_type="section"
                                data-settings='{"background_background":"classic"}'
                            >
                                <div
                                    class="elementor-container elementor-column-gap-wider"
                                >
                                    <div class="elementor-row">
                                        <div
                                            class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-189abc86"
                                            data-id="189abc86"
                                            data-element_type="column"
                                        >
                                            <div
                                                class="elementor-column-wrap elementor-element-populated"
                                            >
                                                <div
                                                    class="elementor-widget-wrap"
                                                >
                                                    <div
                                                        class="elementor-element elementor-element-3e92802b elementor-invisible elementor-widget elementor-widget-heading"
                                                        data-id="3e92802b"
                                                        data-element_type="widget"
                                                        data-settings='{"_animation":"fadeInLeft"}'
                                                        data-widget_type="heading.default"
                                                    >
                                                        <div
                                                            class="elementor-widget-container"
                                                        >
                                                            <h2
                                                                class="elementor-heading-title elementor-size-xl"
                                                            >
                                                                " POINT "
                                                                CLOCKING SYSTEM
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-51c6661e elementor-invisible elementor-widget elementor-widget-heading"
                                                        data-id="51c6661e"
                                                        data-element_type="widget"
                                                        data-settings='{"_animation":"fadeInUp","_animation_delay":600}'
                                                        data-widget_type="heading.default"
                                                    >
                                                        <div
                                                            class="elementor-widget-container"
                                                        >
                                                            <span
                                                                class="elementor-heading-title elementor-size-default"
                                                                >With "IOT"
                                                                Technology for
                                                                Pigeon Race
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <section
                                                        class="elementor-section elementor-inner-section elementor-element elementor-element-62e9c1a6 elementor-section-height-min-height elementor-section-boxed elementor-section-height-default"
                                                        data-id="62e9c1a6"
                                                        data-element_type="section"
                                                    >
                                                        <div
                                                            class="elementor-container elementor-column-gap-default"
                                                        >
                                                            <div
                                                                class="elementor-row"
                                                            >
                                                                <div
                                                                    class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-71612e18"
                                                                    data-id="71612e18"
                                                                    data-element_type="column" 
                                                                >
                                                                    <div
                                                                        class="elementor-column-wrap elementor-element-populated" 
                                                                    >
                                                                        <div
                                                                            class="elementor-widget-wrap" style="margin-left: 20px"
                                                                        >
                                                                            <div
                                                                                class="elementor-element elementor-element-1e33c3f8 elementor-position-left elementor-view-default elementor-vertical-align-top elementor-invisible elementor-widget elementor-widget-icon-box"
                                                                                data-id="1e33c3f8"
                                                                                data-element_type="widget"
                                                                                data-settings='{"_animation":"fadeIn","_animation_delay":1200}'
                                                                                data-widget_type="icon-box.default"
                                                                            >
                                                                                <div
                                                                                    class="elementor-widget-container"
                                                                                >
                                                                                    <div
                                                                                        class="elementor-icon-box-wrapper"
                                                                                    >
                                                                                        <div
                                                                                            class="elementor-icon-box-icon"
                                                                                        >
                                                                                            <span
                                                                                                class="elementor-icon elementor-animation-"
                                                                                            >
                                                                                                <i
                                                                                                    aria-hidden="true"
                                                                                                    class="fas fa-stream"
                                                                                                ></i>
                                                                                            </span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="elementor-icon-box-content"
                                                                                        >
                                                                                            <div
                                                                                                class="elementor-icon-box-title"
                                                                                            >
                                                                                                <span
                                                                                                    >Live
                                                                                                    Streaming
                                                                                                    t
                                                                                                    Free</span
                                                                                                >
                                                                                            </div>
                                                                                            <p
                                                                                                class="elementor-icon-box-description"
                                                                                            >
                                                                                                Semua
                                                                                                Unit
                                                                                                akan
                                                                                                secara
                                                                                                otomatis
                                                                                                mendapat
                                                                                                facilitas
                                                                                                Live
                                                                                                streaming
                                                                                                Result
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="elementor-element elementor-element-3a4dcdc6 elementor-position-left elementor-view-default elementor-vertical-align-top elementor-invisible elementor-widget elementor-widget-icon-box"
                                                                                data-id="3a4dcdc6"
                                                                                data-element_type="widget"
                                                                                data-settings='{"_animation":"fadeIn","_animation_delay":1200}'
                                                                                data-widget_type="icon-box.default"
                                                                            >
                                                                                <div
                                                                                    class="elementor-widget-container"
                                                                                >
                                                                                    <div
                                                                                        class="elementor-icon-box-wrapper"
                                                                                    >
                                                                                        <div
                                                                                            class="elementor-icon-box-icon"
                                                                                        >
                                                                                            <span
                                                                                                class="elementor-icon elementor-animation-"
                                                                                            >
                                                                                                <i
                                                                                                    aria-hidden="true"
                                                                                                    class="far fa-money-bill-alt"
                                                                                                ></i>
                                                                                            </span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="elementor-icon-box-content"
                                                                                        >
                                                                                            <div
                                                                                                class="elementor-icon-box-title"
                                                                                            >
                                                                                                <span
                                                                                                    >Harga
                                                                                                    Ekonomis
                                                                                                    &
                                                                                                    Terjangkau</span
                                                                                                >
                                                                                            </div>
                                                                                            <p
                                                                                                class="elementor-icon-box-description"
                                                                                            >
                                                                                                Tidak
                                                                                                Perlu
                                                                                                lagi
                                                                                                Menghabiskan
                                                                                                banyak
                                                                                                biaya
                                                                                                untuk
                                                                                                Pembelian
                                                                                                Unit,
                                                                                                antenna,
                                                                                                Landing
                                                                                                board
                                                                                                dan
                                                                                                Live
                                                                                                Unit..
                                                                                                Cukup
                                                                                                1
                                                                                                Landing
                                                                                                board,
                                                                                                anda
                                                                                                sudah
                                                                                                dapat
                                                                                                melihat
                                                                                                hasil
                                                                                                lomba
                                                                                                dalam
                                                                                                sekejap
                                                                                                di
                                                                                                Internet
                                                                                                dan
                                                                                                mobile
                                                                                                Apps
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="elementor-element elementor-element-124076e7 elementor-position-left elementor-view-default elementor-vertical-align-top elementor-invisible elementor-widget elementor-widget-icon-box"
                                                                                data-id="124076e7"
                                                                                data-element_type="widget"
                                                                                data-settings='{"_animation":"fadeIn","_animation_delay":1200}'
                                                                                data-widget_type="icon-box.default"
                                                                            >
                                                                                <div
                                                                                    class="elementor-widget-container"
                                                                                >
                                                                                    <div
                                                                                        class="elementor-icon-box-wrapper"
                                                                                    >
                                                                                        <div
                                                                                            class="elementor-icon-box-icon"
                                                                                        >
                                                                                            <span
                                                                                                class="elementor-icon elementor-animation-"
                                                                                            >
                                                                                                <i
                                                                                                    aria-hidden="true"
                                                                                                    class="fab fa-dashcube"
                                                                                                ></i>
                                                                                            </span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="elementor-icon-box-content"
                                                                                        >
                                                                                            <div
                                                                                                class="elementor-icon-box-title"
                                                                                            >
                                                                                                <span
                                                                                                    >Dashbord
                                                                                                    mudah
                                                                                                    di
                                                                                                    mengerti</span
                                                                                                >
                                                                                            </div>
                                                                                            <p
                                                                                                class="elementor-icon-box-description"
                                                                                            >
                                                                                                Mengelo
                                                                                                lomba
                                                                                                kklub
                                                                                                dan
                                                                                                OLr
                                                                                                anda
                                                                                                menjadi
                                                                                                sangat
                                                                                                mudah,
                                                                                                termasuk
                                                                                                pemilik
                                                                                                yang
                                                                                                akan
                                                                                                mengelo
                                                                                                latihan
                                                                                                dan
                                                                                                melihat
                                                                                                hasil
                                                                                                latihan
                                                                                                loft
                                                                                                sendiri
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-232a387d"
                                                                    data-id="232a387d"
                                                                    data-element_type="column"
                                                                >
                                                                    <div
                                                                        class="elementor-column-wrap elementor-element-populated"
                                                                    >
                                                                        <div
                                                                            class="elementor-widget-wrap"
                                                                        >
                                                                            <div
                                                                                class="elementor-element elementor-element-7ea43fc2 elementor-invisible elementor-widget elementor-widget-image"
                                                                                data-id="7ea43fc2"
                                                                                data-element_type="widget"
                                                                                data-settings='{"_animation":"fadeIn","_animation_delay":800}'
                                                                                data-widget_type="image.default"
                                                                            >
                                                                                <div
                                                                                    class="elementor-widget-container"
                                                                                >
                                                                                    <div
                                                                                        class="elementor-image"
                                                                                    >
                                                                                        <img
                                                                                            width="1024"
                                                                                            height="1024"
                                                                                            src="wp-content/uploads/2021/01/ets-point-1024x1024.png"
                                                                                            class="attachment-large size-large"
                                                                                            alt=""
                                                                                            loading="lazy"
                                                                                            srcset="
                                                                                                http://pointclock.online/wp-content/uploads/2021/01/ets-point.png         1024w,
                                                                                                http://pointclock.online/wp-content/uploads/2021/01/ets-point-300x300.png  300w,
                                                                                                http://pointclock.online/wp-content/uploads/2021/01/ets-point-150x150.png  150w,
                                                                                                http://pointclock.online/wp-content/uploads/2021/01/ets-point-768x768.png  768w
                                                                                            "
                                                                                            sizes="(max-width: 1024px) 100vw, 1024px"
                                                                                        />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-7a002d15"
                                                                    data-id="7a002d15"
                                                                    data-element_type="column"
                                                                >
                                                                    <div
                                                                        class="elementor-column-wrap elementor-element-populated"
                                                                    >
                                                                        <div
                                                                            class="elementor-widget-wrap" style="margin-left: 20px"
                                                                        >
                                                                            <div
                                                                                class="elementor-element elementor-element-10c3a501 elementor-position-left elementor-view-default elementor-vertical-align-top elementor-invisible elementor-widget elementor-widget-icon-box"
                                                                                data-id="10c3a501"
                                                                                data-element_type="widget"
                                                                                data-settings='{"_animation":"fadeIn","_animation_delay":1200}'
                                                                                data-widget_type="icon-box.default"
                                                                            >
                                                                                <div
                                                                                    class="elementor-widget-container"
                                                                                >
                                                                                    <div
                                                                                        class="elementor-icon-box-wrapper"
                                                                                    >
                                                                                        <div
                                                                                            class="elementor-icon-box-icon"
                                                                                        >
                                                                                            <span
                                                                                                class="elementor-icon elementor-animation-"
                                                                                            >
                                                                                                <i
                                                                                                    aria-hidden="true"
                                                                                                    class="fas fa-leaf"
                                                                                                ></i>
                                                                                            </span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="elementor-icon-box-content"
                                                                                        >
                                                                                            <div
                                                                                                class="elementor-icon-box-title"
                                                                                            >
                                                                                                <span
                                                                                                    >Low
                                                                                                    Energy</span
                                                                                                >
                                                                                            </div>
                                                                                            <p
                                                                                                class="elementor-icon-box-description"
                                                                                            >
                                                                                                Tetap
                                                                                                dapat
                                                                                                berfungsi
                                                                                                selama
                                                                                                48
                                                                                                jam
                                                                                                tanpa
                                                                                                aliran
                                                                                                listrik
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="elementor-element elementor-element-3aaf2bd0 elementor-position-left elementor-view-default elementor-vertical-align-top elementor-invisible elementor-widget elementor-widget-icon-box"
                                                                                data-id="3aaf2bd0"
                                                                                data-element_type="widget"
                                                                                data-settings='{"_animation":"fadeIn","_animation_delay":1200}'
                                                                                data-widget_type="icon-box.default"
                                                                            >
                                                                                <div
                                                                                    class="elementor-widget-container"
                                                                                >
                                                                                    <div
                                                                                        class="elementor-icon-box-wrapper"
                                                                                    >
                                                                                        <div
                                                                                            class="elementor-icon-box-icon"
                                                                                        >
                                                                                            <span
                                                                                                class="elementor-icon elementor-animation-"
                                                                                            >
                                                                                                <i
                                                                                                    aria-hidden="true"
                                                                                                    class="fas fa-cloud-showers-heavy"
                                                                                                ></i>
                                                                                            </span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="elementor-icon-box-content"
                                                                                        >
                                                                                            <div
                                                                                                class="elementor-icon-box-title"
                                                                                            >
                                                                                                <span
                                                                                                    >High
                                                                                                    Data
                                                                                                    capabilities</span
                                                                                                >
                                                                                            </div>
                                                                                            <p
                                                                                                class="elementor-icon-box-description"
                                                                                            >
                                                                                                butuh
                                                                                                0,8
                                                                                                detik
                                                                                                sejak
                                                                                                scanning
                                                                                                hingga
                                                                                                tampil
                                                                                                di
                                                                                                Internet
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="elementor-element elementor-element-ef52744 elementor-position-left elementor-view-default elementor-vertical-align-top elementor-invisible elementor-widget elementor-widget-icon-box"
                                                                                data-id="ef52744"
                                                                                data-element_type="widget"
                                                                                data-settings='{"_animation":"fadeIn","_animation_delay":1200}'
                                                                                data-widget_type="icon-box.default"
                                                                            >
                                                                                <div
                                                                                    class="elementor-widget-container"
                                                                                >
                                                                                    <div
                                                                                        class="elementor-icon-box-wrapper"
                                                                                    >
                                                                                        <div
                                                                                            class="elementor-icon-box-icon"
                                                                                        >
                                                                                            <span
                                                                                                class="elementor-icon elementor-animation-"
                                                                                            >
                                                                                                <i
                                                                                                    aria-hidden="true"
                                                                                                    class="fas fa-file-code"
                                                                                                ></i>
                                                                                            </span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="elementor-icon-box-content"
                                                                                        >
                                                                                            <div
                                                                                                class="elementor-icon-box-title"
                                                                                            >
                                                                                                <span
                                                                                                    >Secure</span
                                                                                                >
                                                                                            </div>
                                                                                            <p
                                                                                                class="elementor-icon-box-description"
                                                                                            >
                                                                                                Dengan
                                                                                                System
                                                                                                keamanan
                                                                                                data
                                                                                                terbaru,
                                                                                                Safety
                                                                                                dan
                                                                                                Kejujuran
                                                                                                lomba
                                                                                                tetap
                                                                                                terjaga,
                                                                                                membuat
                                                                                                lomba
                                                                                                menjadi
                                                                                                menarik
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-e8c1319 elementor-section-height-min-height elementor-section-items-stretch elementor-section-boxed elementor-section-height-default"
                                data-id="e8c1319"
                                data-element_type="section"
                                data-settings='{"background_background":"classic"}'
                            >
                                <div class="elementor-background-overlay"></div>
                                <div
                                    class="elementor-container elementor-column-gap-no"
                                >
                                    <div class="elementor-row">
                                        <div
                                            class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-3fad9d01"
                                            data-id="3fad9d01"
                                            data-element_type="column"
                                        >
                                            <div
                                                class="elementor-column-wrap elementor-element-populated"
                                            >
                                                <div
                                                    class="elementor-widget-wrap"
                                                >
                                                    <div
                                                        class="elementor-element elementor-element-44a3b19c elementor-invisible elementor-widget elementor-widget-heading"
                                                        data-id="44a3b19c"
                                                        data-element_type="widget"
                                                        data-settings='{"_animation":"fadeInLeft"}'
                                                        data-widget_type="heading.default"
                                                    >
                                                        <div
                                                            class="elementor-widget-container"
                                                        >
                                                            <h2
                                                                class="elementor-heading-title elementor-size-xl"
                                                            >
                                                                RACE RESULT
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-5561a123 elementor-invisible elementor-widget elementor-widget-heading"
                                                        data-id="5561a123"
                                                        data-element_type="widget"
                                                        data-settings='{"_animation":"fadeInUp","_animation_delay":400}'
                                                        data-widget_type="heading.default"
                                                    >
                                                        <div
                                                            class="elementor-widget-container"
                                                        >
                                                            <h3
                                                                class="elementor-heading-title elementor-size-small"
                                                            >
                                                                Temukan Semua
                                                                Race Hasil lomba
                                                                klub anda secara
                                                                Lokal, National
                                                                dan Dunia Disini
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-22a1ec56 elementor-align-left elementor-widget elementor-widget-button"
                                                        data-id="22a1ec56"
                                                        data-element_type="widget"
                                                        data-widget_type="button.default"
                                                    >
                                                        <div
                                                            class="elementor-widget-container"
                                                        >
                                                            <div
                                                                class="elementor-button-wrapper"
                                                            >
                                                                <a
                                                                    href="#"
                                                                    class="elementor-button-link elementor-button elementor-size-md"
                                                                    role="button"
                                                                >
                                                                    <span
                                                                        class="elementor-button-content-wrapper"
                                                                    >
                                                                        <span
                                                                            class="elementor-button-text"
                                                                            >Lihat
                                                                            Result</span
                                                                        >
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-6db69456"
                                            data-id="6db69456"
                                            data-element_type="column"
                                        >
                                            <div
                                                class="elementor-column-wrap elementor-element-populated"
                                            >
                                                <div
                                                    class="elementor-widget-wrap"
                                                >
                                                    <div
                                                        class="elementor-element elementor-element-7feb194 elementor-pagination-position-inside elementor-widget elementor-widget-image-carousel"
                                                        data-id="7feb194"
                                                        data-element_type="widget"
                                                        data-settings='{"slides_to_show":"1","navigation":"dots","pause_on_hover":"no","autoplay_speed":6000,"autoplay":"yes","pause_on_interaction":"yes","infinite":"yes","effect":"slide","speed":500}'
                                                        data-widget_type="image-carousel.default"
                                                    >
                                                        <div
                                                            class="elementor-widget-container"
                                                        >
                                                            <div
                                                                class="elementor-image-carousel-wrapper swiper-container"
                                                                dir="ltr"
                                                            >
                                                                <div
                                                                    class="elementor-image-carousel swiper-wrapper"
                                                                >
                                                                    <div
                                                                        class="swiper-slide"
                                                                    >
                                                                        <figure
                                                                            class="swiper-slide-inner"
                                                                        >
                                                                            <img
                                                                                class="swiper-slide-image"
                                                                                src="{{ url('home-layout/pointclock.online/wp-content/uploads/2021/01/result2-768x494.png') }}"
                                                                                alt="result2"
                                                                            />
                                                                        </figure>
                                                                    </div>
                                                                    <div
                                                                        class="swiper-slide"
                                                                    >
                                                                        <figure
                                                                            class="swiper-slide-inner"
                                                                        >
                                                                            <img
                                                                                class="swiper-slide-image"
                                                                                src="{{ url('home-layout/pointclock.online/wp-content/uploads/2021/01/result-lomba-768x494.png') }}"
                                                                                alt="result lomba"
                                                                            />
                                                                        </figure>
                                                                    </div>
                                                                    <div
                                                                        class="swiper-slide"
                                                                    >
                                                                        <figure
                                                                            class="swiper-slide-inner"
                                                                        >
                                                                            <img
                                                                                class="swiper-slide-image"
                                                                                src="{{ url('home-layout/pointclock.online/wp-content/uploads/2021/01/ets-point-768x768.png') }}"
                                                                                alt="ets point"
                                                                            />
                                                                        </figure>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="swiper-pagination"
                                                                ></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section
                                class="elementor-section elementor-top-section elementor-element elementor-element-14dac90c elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle"
                                data-id="14dac90c"
                                data-element_type="section"
                                data-settings='{"background_background":"classic"}'
                            >
                                <div class="elementor-background-overlay"></div>
                                <div
                                    class="elementor-container elementor-column-gap-default"
                                >
                                    <div class="elementor-row">
                                        <div
                                            class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-55d1cd8c"
                                            data-id="55d1cd8c"
                                            data-element_type="column"
                                        >
                                            <div
                                                class="elementor-column-wrap elementor-element-populated"
                                            >
                                                <div
                                                    class="elementor-widget-wrap"
                                                >
                                                    <div
                                                        class="elementor-element elementor-element-6b3a9c81 elementor-widget elementor-widget-heading"
                                                        data-id="6b3a9c81"
                                                        data-element_type="widget"
                                                        data-widget_type="heading.default"
                                                    >
                                                        <div
                                                            class="elementor-widget-container"
                                                        >
                                                            <h2
                                                                class="elementor-heading-title elementor-size-xl"
                                                            >
                                                                UJI COBA GRATIS
                                                                DI KLUB ANDA
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-47d13f40 elementor-invisible elementor-widget elementor-widget-heading"
                                                        data-id="47d13f40"
                                                        data-element_type="widget"
                                                        data-settings='{"_animation":"fadeInUp","_animation_delay":400}'
                                                        data-widget_type="heading.default"
                                                    >
                                                        <div
                                                            class="elementor-widget-container"
                                                        >
                                                            <h2
                                                                class="elementor-heading-title elementor-size-medium"
                                                            >
                                                                Kami akan
                                                                memberikan Free
                                                                Klub System bagi
                                                                semua klub yang
                                                                di Indonesia dan
                                                                International
                                                                yang membernya
                                                                memiliki POINT
                                                                ETS secara
                                                                GRATIS
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <section
                                                        class="elementor-section elementor-inner-section elementor-element elementor-element-317f6922 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-invisible"
                                                        data-id="317f6922"
                                                        data-element_type="section"
                                                        data-settings='{"animation":"fadeInUp","animation_delay":600}'
                                                    >
                                                        <div
                                                            class="elementor-container elementor-column-gap-default"
                                                        >
                                                            <div
                                                                class="elementor-row"
                                                            >
                                                                <div
                                                                    class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7e1e7db9"
                                                                    data-id="7e1e7db9"
                                                                    data-element_type="column"
                                                                >
                                                                    <div
                                                                        class="elementor-column-wrap elementor-element-populated"
                                                                    >
                                                                        <div
                                                                            class="elementor-widget-wrap"
                                                                        >
                                                                            <div
                                                                                class="elementor-element elementor-element-294aa8f elementor-align-right elementor-widget elementor-widget-button"
                                                                                data-id="294aa8f"
                                                                                data-element_type="widget"
                                                                                data-widget_type="button.default"
                                                                            >
                                                                                <div
                                                                                    class="elementor-widget-container"
                                                                                >
                                                                                    <div
                                                                                        class="elementor-button-wrapper"
                                                                                    >
                                                                                        <a style="margin-right: 20px"
                                                                                            href="http://wa.me/6281910268798"
                                                                                            target="_blank"
                                                                                            class="elementor-button-link elementor-button elementor-size-xs elementor-animation-grow"
                                                                                            role="button"
                                                                                        >
                                                                                            <span
                                                                                                class="elementor-button-content-wrapper"
                                                                                            >
                                                                                                <span
                                                                                                    class="elementor-button-text"
                                                                                                    >Order
                                                                                                    Now</span
                                                                                                >
                                                                                            </span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-2c14e68d"
                                                                    data-id="2c14e68d"
                                                                    data-element_type="column"
                                                                >
                                                                    <div
                                                                        class="elementor-column-wrap elementor-element-populated"
                                                                    >
                                                                        <div
                                                                            class="elementor-widget-wrap"
                                                                        >
                                                                            <div
                                                                                class="elementor-element elementor-element-5bc89728 elementor-widget elementor-widget-button"
                                                                                data-id="5bc89728"
                                                                                data-element_type="widget"
                                                                                data-widget_type="button.default"
                                                                            >
                                                                                <div
                                                                                    class="elementor-widget-container"
                                                                                >
                                                                                    <div
                                                                                        class="elementor-button-wrapper"
                                                                                    >
                                                                                        <a
                                                                                            href="http://wa.me/6281910268798"
                                                                                            target="_blank"
                                                                                            class="elementor-button-link elementor-button elementor-size-xs elementor-animation-grow"
                                                                                            role="button"
                                                                                        >
                                                                                            <span
                                                                                                class="elementor-button-content-wrapper"
                                                                                            >
                                                                                                <span
                                                                                                    class="elementor-button-text"
                                                                                                    >Buat
                                                                                                    Janji
                                                                                                    Untuk
                                                                                                    Uji
                                                                                                    Coba</span
                                                                                                >
                                                                                            </span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Music Player Area Start ##### -->
    <div class="music-player-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" >
                    <div data-aos="fade-up" class="section-heading dark">
                        <h2 >Point clock</h2>
                        
                    </div>
                    <div class="fitness-blog-posts">

                        <!-- Single Post Start -->
                       
                        @foreach ($content as $item)
                        <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Post Thumb -->
                            <div class="blog-post-thumb">
                                <img style="border-top-right-radius: 10px;border-top-left-radius: 10px" src="{{ asset('image/'.$item->image_content.'') }}" alt="">
                            </div>
                            <!-- Post Title -->
                            <div style="border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;padding: 20px;background-color: rgb(233, 233, 233)">
                                <h4  class="post-title">{{ $item->title_content }}</h4>
                            </div>
                            
                            
                        </div>
                        @endforeach
                        
                        
                       

                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- ##### Music Player Area End ##### -->

    <!-- ##### Featured Album Area Start ##### -->
    @if (count($news)!=0)
    <div class="featured-album-area section-padding-100 clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark">
                        <h2 style="color: white">Berita Terkini</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($news as $item)
                <div class="col-4">
                    
                    <div class="card" >
                        <img class="card-img-top" src="{{ asset('image/'.$item->image_news.'') }}" alt="Card image" style="width:100%;height: 250px;">
                        <div class="card-body">
                        <h4 class="card-title">{{ $item->title_news }}</h4>
                        <p class="card-text">
                            @if (strlen($item->desc_news)<100)
                            {!! $item->desc_news !!}
                            @else
                            {!! substr($item->desc_news,0,100).'.....' !!}
                        @endif</p>
                        <a href="/news/desc/{{ $item->id }}" class="btn musica-btn">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
                
            </div>
        </div>
    </div>
    @endif
    
    <!-- ##### Featured Album Area End ##### -->

    <!-- ##### Music Artists Area Start ##### -->
    
    <!-- ##### Music Artists Area End ##### -->
@endsection
@push('bottom-script')
        <script
            type="text/javascript"
            src="{{ url('home-layout/pointclock.online/wp-content/plugins/elementor/assets/lib/swiper/swiper.min48f5.js') }}"
            id="swiper-js"
        ></script>
        <script
            type="text/javascript"
            src="{{ url('home-layout/pointclock.online/wp-content/plugins/elementor/assets/js/frontend.min952b.js') }}"
            id="elementor-frontend-js"
        ></script>
        
        <script
            type="text/javascript"
            src="{{ url('home-layout/pointclock.online/wp-content/plugins/elementor/assets/lib/waypoints/waypoints.min05da.js') }}"
            id="elementor-waypoints-js"
        ></script>
<script
            type="text/javascript"
            src="{{ url('home-layout/pointclock.online/wp-content/plugins/elementor/assets/js/frontend-modules.min952b.js') }}"
            id="elementor-frontend-modules-js"
        ></script>
        <script type="text/javascript" id="elementor-frontend-js-before">
            var elementorFrontendConfig = {
                environmentMode: { edit: false, wpPreview: false },
                i18n: {
                    shareOnFacebook: "Share on Facebook",
                    shareOnTwitter: "Share on Twitter",
                    pinIt: "Pin it",
                    download: "Download",
                    downloadImage: "Download image",
                    fullscreen: "Fullscreen",
                    zoom: "Zoom",
                    share: "Share",
                    playVideo: "Play Video",
                    previous: "Previous",
                    next: "Next",
                    close: "Close",
                },
                is_rtl: false,
                breakpoints: {
                    xs: 0,
                    sm: 480,
                    md: 768,
                    lg: 1025,
                    xl: 1440,
                    xxl: 1600,
                },
                version: "3.0.16",
                is_static: false,
                legacyMode: { elementWrappers: true },
                urls: {
                    assets:
                        "http:\/\/pointclock.online\/wp-content\/plugins\/elementor\/assets\/",
                },
                settings: { page: [], editorPreferences: [] },
                kit: {
                    body_background_background: "gradient",
                    global_image_lightbox: "yes",
                    lightbox_enable_counter: "yes",
                    lightbox_enable_fullscreen: "yes",
                    lightbox_enable_zoom: "yes",
                    lightbox_enable_share: "yes",
                    lightbox_title_src: "title",
                    lightbox_description_src: "description",
                },
                post: { id: 59, title: "", excerpt: "", featuredImage: false },
            };
        </script>
        <script
            type="text/javascript"
            src="{{ url('home-layout/pointclock.online/wp-content/plugins/elementor/assets/js/frontend.min952b.js') }}"
            id="elementor-frontend-js"
        ></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
      AOS.init();
    </script>
@endpush
