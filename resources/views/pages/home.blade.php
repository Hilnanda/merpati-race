@extends('layouts.app')

@section('title')
    Home
@endsection
@push('top-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <style>
        .fitur{
            padding: 10px;
            height: 600px;
        }
        .gambar {
            height: 500px;
            margin-bottom: 20px;
        }
    </style>
@endpush
@section('content')
    @if(!Auth::user())
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            @if (count($data_header)!=0)
                
            
            @foreach ($data_header as $item)

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
            @endforeach
            @else
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{ url('image/burung2.jpg') }});"></div>
                <!-- Slide Content -->
                <div class="hero-slides-content text-center">
                    <h2 data-animation="fadeInUp" data-delay="100ms">Pigeon Time <span>Pigeon Time</span></h2>
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
            </div>
            @endif
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

        </div>
        <!-- bg gradients -->
        <div class="bg-gradients"></div>

        <!-- Slide Down -->
        <div class="slide-down" id="scrollDown">
            <h6>Slide Down</h6>
            <div class="line"></div>
        </div>
    </section>
    
    <!-- ##### Hero Area End ##### -->

    <!-- ##### About Us Area Start ##### -->

    <!-- ##### About Us Area End ##### -->

    <!-- ##### Upcoming Shows Area Start ##### -->
    @else
    <div class="breadcumb-area bg-img bg-overlay2" style="background-image: url({{ url('image/breadcumb-1.jpg') }});">
        {{-- <div class="bradcumbContent">
            <h2>List Club</h2>
        </div> --}}
    </div>
    @endif
    <!-- bg gradients -->
    <div class="upcoming-shows-area section-padding-100" style="margin-top: -50px" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark">
                        <h2 style="color: white">Perlombaan merpati</h2>
                        <h5 style="color: white">Website Untuk Perlombaan Burung Merpati.</h5>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
				<div class="col-md-4">
					<div class="card fitur">
						<img class="card-img-top gambar" alt="Bootstrap Thumbnail First" src="{{ url('image-logo/burung.jpg') }}" />
						<div class="card-block">
							
							<div class="featured-shows-content">
                                <div class="shows-text">
                                    <a href="/one_loft_race" class="buy-tickets-btn"><h4>One Loft Race</h4>
                                        {{-- <p>January 23</p> --}}
                                        </a>
                                </div>
                                <div class="bg-gradients"></div>
                            </div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card fitur">
						<img class="card-img-top gambar" alt="Bootstrap Thumbnail Second" src="{{ url('image-logo/pigeon-racing.jpg') }}" />
						<div class="card-block">
							
							<div class="featured-shows-content">
                                <div class="shows-text">
                                    <a href="/club" class="buy-tickets-btn"><h4>Public Race</h4>
                                        {{-- <p>January 23</p> --}}
                                        </a>
                                </div>
                                <div class="bg-gradients"></div>
                            </div>
						</div>
					</div>
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

    <!-- ##### Music Player Area Start ##### -->
    <div class="music-player-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" style="overflow-y: auto">
                    <div class="section-heading dark">
                        <h2 >Content</h2>
                        
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
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

    </script>
@endpush
