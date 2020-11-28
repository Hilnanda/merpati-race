@extends('layouts.app_other')
@section('title')
    About Us
@endsection
@section('subtitle')
    About Us
@endsection
@section('content')
    <section class="contact-area mt-30 section-padding-100-0">
        <div class="container">

            <div class="row">

                <div class="col-12 col-lg-12">
                    <div class="contact-content mb-100">
                        <h3>{{ $about->title_about }}</h3>
                            
                        

                        <!-- Contact Social Info -->
                        

                        

                        <!-- Single Contact Info -->
                       
                        <div class="single-contact-info d-flex align-items-center">
                            
                            
                            <h6>{!! $about->desc_about !!}</h6>
                         
                            
                        </div>

                        <!-- Single Contact Info -->
                        
                    </div>
                </div>

                

            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Google Maps ##### -->
    

    <!-- ##### CTA Area Start ##### -->
    {{-- <div class="musica-cta-area section-padding-100 bg-img bg-overlay2" style="background-image: url(img/blog-img/4.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content d-flex justify-content-between align-items-center">
                        <div class="cta-text">
                            <h4>Contact us now</h4>
                            <h2>Do you have a question?</h2>
                            <h6>Morbi quis venenatis augue, a tincidunt libero. Sed id porttitor elit, eu ultricies mauris.
                            </h6>
                        </div>
                        <div class="cta-btn">
                            <a href="#" class="btn musica-btn">contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
