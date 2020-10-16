@extends('layouts.app_other')
@section('title')
    News Page
@endsection
@section('subtitle')
    News
@endsection
@section('content')
    <div class="blog-area mt-30 section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fitness-blog-posts">

                        <!-- Single Post Start -->
                        <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Post Thumb -->
                            <div class="blog-post-thumb mb-30">
                                <img src="{{ asset('image/'.$news->image_news.'') }}" alt="">
                            </div>
                            <!-- Post Title -->
                            <p class="post-title">{{ $news->title_news }}</p>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex justify-content-between">
                                <div class="post-date">
                                    <p>{{date('d F Y  H:i:s', strtotime($news->created_at))}}</p>
                                </div>
                                <!-- Comments -->
                                
                            </div>
                            <!-- bg gradients -->
                            <div class="bg-gradients mb-30 w-25"></div>
                            <!-- Post Excerpt -->
                            {!! $news->desc_news !!}
                            <!-- Read More -->
                            {{-- <a href="#" class="read-more-btn">Read more</a> --}}
                        </div>

                        

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
