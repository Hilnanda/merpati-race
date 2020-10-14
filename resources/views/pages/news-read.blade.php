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
                                <img src="{{ asset('img/blog-img/1.jpg') }}" alt="">
                            </div>
                            <!-- Post Title -->
                            <a href="#" class="post-title">10 Best Festival that you should’t miss this summer</a>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex justify-content-between">
                                <div class="post-date">
                                    <p>May 22, 2018</p>
                                </div>
                                <!-- Comments -->
                                
                            </div>
                            <!-- bg gradients -->
                            <div class="bg-gradients mb-30 w-25"></div>
                            <!-- Post Excerpt -->
                            <p>Sed dapibus varius massa vel auctor. Nulla massa dui, posuere non erat in, eleifend mattis
                                dui. Vivamus luctus luctus rhoncus. Donec sagittis nulla id finibus iaculis. Mauris odio
                                tortor, suscipit non elit ut, imperdiet ornare erat. Vestibulum vel lorem eget risus
                                pulvinar sollicitudin in a erat. Quisque mattis ultricies arcu, ac venenatis nisl. Sed
                                dapibus varius massa vel auctor. Nulla massa dui, posuere non erat in, eleifend mattis dui.
                                Vivamus luctus luctus rhoncus. Donec sagittis nulla id finibus iaculis.</p>
                            <p>Sed dapibus varius massa vel auctor. Nulla massa dui, posuere non erat in, eleifend mattis
                                dui. Vivamus luctus luctus rhoncus. Donec sagittis nulla id finibus iaculis. Mauris odio
                                tortor, suscipit non elit ut, imperdiet ornare erat. Vestibulum vel lorem eget risus
                                pulvinar sollicitudin in a erat. Quisque mattis ultricies arcu, ac venenatis nisl. Sed
                                dapibus varius massa vel auctor. Nulla massa dui, posuere non erat in, eleifend mattis dui.
                                Vivamus luctus luctus rhoncus. Donec sagittis nulla id finibus iaculis.</p>
                            <!-- Read More -->
                            {{-- <a href="#" class="read-more-btn">Read more</a> --}}
                        </div>

                        

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
