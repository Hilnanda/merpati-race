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
                        <h3>{{ $about ? $about->title_about : 'About Us' }}</h3>
                            
                        

                        <!-- Contact Social Info -->
                        

                        

                        <!-- Single Contact Info -->
                       
                        <div class="single-contact-info d-flex align-items-center">
                            
                            
                            <h6>{!! $about ? $about->desc_about : 'Desc' !!}</h6>
                         
                            
                        </div>

                        <!-- Single Contact Info -->
                        
                    </div>
                </div>

                

            </div>
        </div>
    </section>
   
@endsection
