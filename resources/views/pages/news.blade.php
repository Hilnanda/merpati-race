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
                        @foreach ($news as $item)
                            
                        
                        <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Post Thumb -->
                            <div class="blog-post-thumb mb-30">
                                <img src="{{ asset('image/'.$item->image_news.'') }}" alt="">
                            </div>
                            <!-- Post Title -->
                            <a href="/news/desc/{{ $item->id }}" class="post-title">{{ $item->title_news }}</a>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex justify-content-between">
                                <div class="post-date">
                                    <p>{{date('d F Y  H:i:s', strtotime($item->created_at))}}</p>
                                </div>
                                <!-- Comments -->
                                
                            </div>
                            <!-- bg gradients -->
                            <div class="bg-gradients mb-30 w-25"></div>
                            <!-- Post Excerpt -->
                            @if (strlen($item->desc_news)<500)
                        {!! $item->desc_news !!}
                        @else
                        {!! substr($item->desc_news,0,500).'.....' !!}</td>
                    @endif
                            <a href="/news/desc/{{ $item->id }}" class="read-more-btn">Read more</a>
                        </div>
                        @endforeach
                       

                        <!-- Pagination -->
                        {{-- <div class="musica-pagination-area wow fadeInUp" data-wow-delay="700ms">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02.</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03.</a></li>
                                </ul>
                            </nav>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
