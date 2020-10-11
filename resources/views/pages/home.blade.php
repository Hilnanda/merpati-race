@extends('layouts.app')

@section('title')
    Home
@endsection
@section('content')
<section class="hero-area">
    <div class="hero-slides owl-carousel">

        <!-- Single Hero Slide -->
        <div class="single-hero-slide d-flex align-items-center justify-content-center">
            <!-- Slide Img -->
            <div class="slide-img bg-img" style="background-image: url(img/bg-img/bg-1.jpg);"></div>
            <!-- Slide Content -->
            <div class="hero-slides-content text-center">
                <h2 data-animation="fadeInUp" data-delay="100ms">Musica <span>Musica</span></h2>
                <p data-animation="fadeInUp" data-delay="300ms">Music Theme</p>
            </div>
            <!-- Big Text -->
            <h2 class="big-text">Musica</h2>
        </div>

        <!-- Single Hero Slide -->
        <div class="single-hero-slide d-flex align-items-center justify-content-center">
            <!-- Slide Img -->
            <div class="slide-img bg-img" style="background-image: url(img/bg-img/bg-2.jpg);"></div>
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
            <div class="slide-img bg-img" style="background-image: url(img/bg-img/bg-3.jpg);"></div>
            <!-- Slide Content -->
            <div class="hero-slides-content text-center">
                <h2 data-animation="fadeInUp" data-delay="100ms">Festival <span>Festival</span></h2>
                <p data-animation="fadeInUp" data-delay="300ms">Free Themes</p>
            </div>
            <!-- Big Text -->
            <h2 class="big-text">Festival</h2>
        </div>

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
<div class="about-us-area section-padding-100-0 bg-img bg-overlay" style="background-image: url(img/bg-img/bg-4.jpg);" id="about">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>Artist Bio</h2>
                    <h6>Sed porta cursus enim, vitae maximus felis luctus iaculis.</h6>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- About Thumbnail -->
            <div class="col-12 col-lg-6">
                <div class="about-thumbnail mb-100">
                    <img src="img/bg-img/bg-5.jpg" alt="">
                </div>
            </div>
            <!-- About Content -->
            <div class="col-12 col-lg-6">
                <div class="about-content mb-100">
                    <h4>Hello, It’s Michael Smithson</h4>
                    <p>Nulla pretium tincidunt felis, nec sollicitudin mauris lobortis in. Aliquam eu feugiat ligula, laoreet efficitur nulla. Morbi nec neque porta, elementum massa at, vehicula nunc. Nulla facilisi. Donec id purus eu lectus imperdiet varius. Curabitur consectetur nunc sem, vitae cursus enim tempor eget. Praesent pellentesque nisi urna, sit amet suscipit ligula posuere id. Aenean id tortor vel quam ornare gravida. Phasellus luctus feugiat nunc, quis vulputate ipsum convallis quis. Integer vel nulla erat. Donec erat metus, luctus quis maximus quis, volutpat eu tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                    <img src="img/core-img/signature.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### About Us Area End ##### -->

<!-- ##### Upcoming Shows Area Start ##### -->
<div class="upcoming-shows-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <h2>Upcoming shows</h2>
                    <h6>Sed porta cursus enim, vitae maximus felis luctus iaculis.</h6>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Upcoming Shows Content -->
                <div class="upcoming-shows-content">

                    <!-- Single Upcoming Shows -->
                    <div class="single-upcoming-shows d-flex align-items-center flex-wrap">
                        <div class="shows-date">
                            <h2>17 <span>July</span></h2>
                        </div>
                        <div class="shows-desc d-flex align-items-center">
                            <div class="shows-img">
                                <img src="img/bg-img/s1.jpg" alt="">
                            </div>
                            <div class="shows-name">
                                <h6>Electric castle Festival</h6>
                                <p>Cluj, Romania</p>
                            </div>
                        </div>
                        <div class="shows-location">
                            <p>At the Castle</p>
                        </div>
                        <div class="shows-time">
                            <p>20:30</p>
                        </div>
                        <div class="buy-tickets">
                            <a href="#" class="btn musica-btn">Buy Tikets</a>
                        </div>
                    </div>

                    <!-- Single Upcoming Shows -->
                    <div class="single-upcoming-shows d-flex align-items-center flex-wrap">
                        <div class="shows-date">
                            <h2>23 <span>July</span></h2>
                        </div>
                        <div class="shows-desc d-flex align-items-center">
                            <div class="shows-img">
                                <img src="img/bg-img/s2.jpg" alt="">
                            </div>
                            <div class="shows-name">
                                <h6>Electric Festival</h6>
                                <p>Manhathan, NY, USA</p>
                            </div>
                        </div>
                        <div class="shows-location">
                            <p>Main Stadium</p>
                        </div>
                        <div class="shows-time">
                            <p>21:30</p>
                        </div>
                        <div class="buy-tickets">
                            <a href="#" class="btn musica-btn">Buy Tikets</a>
                        </div>
                    </div>

                    <!-- Single Upcoming Shows -->
                    <div class="single-upcoming-shows d-flex align-items-center flex-wrap">
                        <div class="shows-date">
                            <h2>25 <span>July</span></h2>
                        </div>
                        <div class="shows-desc d-flex align-items-center">
                            <div class="shows-img">
                                <img src="img/bg-img/s3.jpg" alt="">
                            </div>
                            <div class="shows-name">
                                <h6>Sunflower festival</h6>
                                <p>Paris, France</p>
                            </div>
                        </div>
                        <div class="shows-location">
                            <p>Sunflower Arena</p>
                        </div>
                        <div class="shows-time">
                            <p>20:30</p>
                        </div>
                        <div class="buy-tickets">
                            <a href="#" class="btn musica-btn">Buy Tikets</a>
                        </div>
                    </div>

                    <!-- Single Upcoming Shows -->
                    <div class="single-upcoming-shows d-flex align-items-center flex-wrap">
                        <div class="shows-date">
                            <h2>30 <span>July</span></h2>
                        </div>
                        <div class="shows-desc d-flex align-items-center">
                            <div class="shows-img">
                                <img src="img/bg-img/s4.jpg" alt="">
                            </div>
                            <div class="shows-name">
                                <h6>Electric castle Festival</h6>
                                <p>Cluj, Romania</p>
                            </div>
                        </div>
                        <div class="shows-location">
                            <p>At the Castle</p>
                        </div>
                        <div class="shows-time">
                            <p>20:30</p>
                        </div>
                        <div class="buy-tickets">
                            <a href="#" class="btn musica-btn">Buy Tikets</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Upcoming Shows Area End ##### -->

<!-- ##### Music Player Area Start ##### -->
<div class="music-player-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="music-player-slides owl-carousel">

                    <!-- Single Music Player -->
                    <div class="single-music-player">
                        <img src="img/bg-img/mp1.jpg" alt="">

                        <div class="music-info d-flex justify-content-between">
                            <div class="music-text">
                                <h5>Artist’s/Band Name</h5>
                                <p>Love is all Around</p>
                            </div>
                            <div class="music-play-icon">
                                <audio preload="auto" controls>
                                <source src="audio/dummy-audio.mp3">
                            </audio>
                            </div>
                        </div>
                    </div>

                    <!-- Single Music Player -->
                    <div class="single-music-player">
                        <img src="img/bg-img/mp2.jpg" alt="">

                        <div class="music-info d-flex justify-content-between">
                            <div class="music-text">
                                <h5>Artist’s/Band Name</h5>
                                <p>Love is all Around</p>
                            </div>
                            <div class="music-play-icon">
                                <audio preload="auto" controls>
                                <source src="audio/dummy-audio.mp3">
                            </audio>
                            </div>
                        </div>
                    </div>

                    <!-- Single Music Player -->
                    <div class="single-music-player">
                        <img src="img/bg-img/mp3.jpg" alt="">

                        <div class="music-info d-flex justify-content-between">
                            <div class="music-text">
                                <h5>Artist’s/Band Name</h5>
                                <p>Love is all Around</p>
                            </div>
                            <div class="music-play-icon">
                                <audio preload="auto" controls>
                                <source src="audio/dummy-audio.mp3">
                            </audio>
                            </div>
                        </div>
                    </div>

                    <!-- Single Music Player -->
                    <div class="single-music-player">
                        <img src="img/bg-img/mp4.jpg" alt="">

                        <div class="music-info d-flex justify-content-between">
                            <div class="music-text">
                                <h5>Artist’s/Band Name</h5>
                                <p>Love is all Around</p>
                            </div>
                            <div class="music-play-icon">
                                <audio preload="auto" controls>
                                <source src="audio/dummy-audio.mp3">
                            </audio>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Music Player Area End ##### -->

<!-- ##### Featured Album Area Start ##### -->
<div class="featured-album-area section-padding-100 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="featured-album-content d-flex flex-wrap">

                    <!-- Album Thumbnail -->
                    <div class="album-thumbnail h-100 bg-img" style="background-image: url(img/bg-img/bg-4.jpg);"></div>

                    <!-- Album Songs -->
                    <div class="album-songs h-100">

                        <!-- Album Info -->
                        <div class="album-info mb-50 d-flex flex-wrap align-items-center justify-content-between">
                            <div class="album-title">
                                <h6>Featured album</h6>
                                <h4>Love is all Around</h4>
                            </div>
                            <div class="album-buy-now">
                                <a href="#" class="btn musica-btn">Buy it on Itunes</a>
                            </div>
                        </div>

                        <div class="album-all-songs">

                            <!-- Music Playlist -->
                            <div class="music-playlist">
                                <!-- Single Song -->
                                <div class="single-music active">
                                    <h6>Drop that beat</h6>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>

                                <!-- Single Song -->
                                <div class="single-music">
                                    <h6>Hey, Mister Dj</h6>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>

                                <!-- Single Song -->
                                <div class="single-music">
                                    <h6>Message to my future self</h6>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>

                                <!-- Single Song -->
                                <div class="single-music">
                                    <h6>Bring back the love</h6>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>

                                <!-- Single Song -->
                                <div class="single-music">
                                    <h6>Hey, Mister Dj - Remix</h6>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>

                                <!-- Single Song -->
                                <div class="single-music">
                                    <h6>Message to my future self</h6>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>
                                <!-- Single Song -->
                                <div class="single-music">
                                    <h6>Drop that beat</h6>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>

                                <!-- Single Song -->
                                <div class="single-music">
                                    <h6>Hey, Mister Dj</h6>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>

                                <!-- Single Song -->
                                <div class="single-music">
                                    <h6>Message to my future self</h6>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>

                                <!-- Single Song -->
                                <div class="single-music">
                                    <h6>Bring back the love</h6>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>

                                <!-- Single Song -->
                                <div class="single-music">
                                    <h6>Hey, Mister Dj - Remix</h6>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>

                                <!-- Single Song -->
                                <div class="single-music">
                                    <h6>Message to my future self</h6>
                                    <audio preload="auto" controls>
                                        <source src="audio/dummy-audio.mp3">
                                    </audio>
                                </div>
                            </div>
                        </div>

                        <!-- Now Playing -->
                        <div class="now-playing d-flex flex-wrap align-items-center justify-content-between">
                            <div class="songs-name">
                                <p>Playing</p>
                                <h6>Drop that beat</h6>
                            </div>
                            <audio preload="auto" controls>
                                <source src="audio/dummy-audio.mp3">
                            </audio>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Featured Album Area End ##### -->

<!-- ##### Music Artists Area Start ##### -->
<div class="musica-music-artists-area d-flex flex-wrap clearfix">
    <!-- Music Search -->
    <div class="music-search bg-img bg-overlay2 wow fadeInUp" data-wow-delay="300ms" style="background-image: url(img/bg-img/bg-9.jpg);">
        <!-- Content -->
        <div class="music-search-content">
            <h2>Music</h2>
            <h4>Search for the best music</h4>
        </div>
    </div>

    <!-- Artists Search -->
    <div class="artists-search bg-img bg-overlay2 wow fadeInUp" data-wow-delay="600ms" style="background-image: url(img/bg-img/bg-1.jpg);">
        <!-- Content -->
        <div class="music-search-content">
            <h2>Artists</h2>
            <h4>Search for the best artists</h4>
        </div>
    </div>
</div>
<!-- ##### Music Artists Area End ##### -->
@endsection