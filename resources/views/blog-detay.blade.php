@extends('layouts.app')

@section('title', $post['title'])

@section('content-wrapper-style', 'padding-top: 100px; padding-bottom: 50px;')

@section('content')
    <section class="blog-single section" style="padding-top: 20px; padding-bottom: 60px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12 col-12">
                    <div class="single-inner">
                        <!-- Post Header -->
                        <div class="post-header mb-5 text-center">
                            <!-- BLOG label removed -->
                            <h1 class="post-title fw-bold mb-4" style="font-size: 36px; color: #000;">{{ $post['title'] }}
                            </h1>
                            <div class="meta" style="font-size: 16px; color: #666;">
                                <span class="me-4"><i class="lni lni-calendar me-2"></i> {{ $post['date'] }}</span>
                                <span><i class="lni lni-user me-2"></i> {{ $post['author'] }}</span>
                            </div>
                        </div>

                        <!-- Post Content -->
                        <div class="post-detail-content" style="font-size: 18px; line-height: 1.8; color: #444;">
                            {!! $post['content'] !!}
                        </div>

                        <!-- Back Button -->
                        <div class="text-center mt-5">
                            <a href="{{ route('blog') }}" class="btn btn-outline-secondary rounded-pill px-5 py-2">
                                <i class="lni lni-arrow-left me-2"></i> Blog'a Dön
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection