@extends('layouts.app_other')
@section('title')
    Contact
@endsection
@section('subtitle')
    Contact
@endsection
@section('content')
    <section class="contact-area mt-30 section-padding-100-0">
        <div class="container">

            <div class="row">

                <div class="col-12 col-lg-6">
                    <div class="contact-content mb-100">
                        @if (count($nama_website)!=0)
                        @foreach ($nama_website as $item)
                        <a href="/" class="nav-brand"><h3 >{{ $item->name_website }}</h3></a>

                        @endforeach
                        @else
                        <a href="/" class="nav-brand"><h3 >Nama Website</h3></a>
                        @endif
                        <p class="copywrite-text">
                            @foreach ($data_footer as $item)
                            {{ $item->name_copyright  }}
                        @endforeach
                            
                        </p>

                        <!-- Contact Social Info -->
                        <div class="contact-social-info mt-50">
                            @foreach ($data_medsos as $item)
                            <a href="{{ $item->url_medsos }}{{ $item->username_medsos }}" data-toggle="tooltip" data-placement="top" title="{{ $item->name_medsos }}"><i
                                class="fa {{ $item->icon_medsos }}" aria-hidden="true"></i></a>
                            @endforeach
                            
                            
                        </div>

                        

                        <!-- Single Contact Info -->
                        <h4>Customer Support</h4>
                        <div class="single-contact-info d-flex align-items-center">
                            @foreach ($contact as $item)
                            
                            <h6>{!! $item->customer_contact !!}</h6>
                            @endforeach
                            
                        </div>

                        <!-- Single Contact Info -->
                        
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="contact-content mb-100">
                        <h5>Alamat</h5>
                        <!-- Contact Form Area -->
                        <div class="contact-form-area">
                            @foreach ($contact as $item)
                            {!! $item->address_contact !!}
                            @endforeach
                        </div>
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
