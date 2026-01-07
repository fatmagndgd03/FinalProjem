@extends('layouts.app')

@section('title', 'Blog')

@section('content-wrapper-style', 'padding-top: 100px; padding-bottom: 50px;')

@section('content')
    <!-- Blog Archive Area -->
    <section class="blog-archive section" style="padding-top: 10px; padding-bottom: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                     <!-- BLOG title removed -->
                     <p class="text-muted mb-5" style="max-width: 600px; margin: 0 auto; display: none;">El yapımı çiçek dünyası, dekorasyon ipuçları ve hediye önerileri hakkında keyifli yazılarımızı buradan takip edebilirsiniz.</p>
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <!-- Single Blog -->
                        <div class="single-blog h-100 shadow-sm border-0"
                            style="border-radius: 20px; overflow: hidden; background: #fff; transition: transform 0.3s ease;">
                            <div class="blog-content p-4">
                                <div class="meta mb-2" style="font-size: 14px; color: #999;">
                                    <span><i class="lni lni-calendar me-1"></i> {{ $post['date'] }}</span>
                                    <span class="ms-3"><i class="lni lni-user me-1"></i> {{ $post['author'] }}</span>
                                </div>
                                <h4 class="mb-3">
                                    <a href="{{ route('blog.show', $post['slug']) }}" class="text-dark text-decoration-none fw-bold"
                                        style="font-size: 20px;">{{ $post['title'] }}</a>
                                </h4>
                                <p class="text-muted"
                                    style="line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $post['summary'] }}</p>
                                <div class="button mt-4">
                                    <a href="{{ route('blog.show', $post['slug']) }}" class="btn btn-primary rounded-pill px-4"
                                        style="background-color: #FF6B81; border-color: #FF6B81; color: #ffffff;">Devamını Oku</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Blog -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection