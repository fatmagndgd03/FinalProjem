@extends('layouts.app')

@section('title', 'İletişim')

@section('content-wrapper-style', 'padding-top: 100px; padding-bottom: 50px;')

@section('content')
    <!-- Contact Area -->
    <section id="contact-us" class="contact-us section" style="padding-top: 10px; padding-bottom: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="fw-bold mb-5" style="font-size: 42px; color: #000000; letter-spacing: 1px;">İLETİŞİM</h1>
                </div>
            </div>
            <div class="contact-head">
                <div class="row">
                    <!-- Contact Form -->
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="form-main">
                            <h3 class="title" style="font-size: 24px; font-weight: 600; margin-bottom: 20px;">Bize Ulaşın
                            </h3>
                            <form class="form" method="post" action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group mb-3">
                                            <label class="mb-2">Adınız Soyadınız</label>
                                            <input name="name" type="text" placeholder="" class="form-control p-3"
                                                style="border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group mb-3">
                                            <label class="mb-2">Konu</label>
                                            <input name="subject" type="text" placeholder="" class="form-control p-3"
                                                style="border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group mb-3">
                                            <label class="mb-2">E-posta Adresiniz</label>
                                            <input name="email" type="email" placeholder="" class="form-control p-3"
                                                style="border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group mb-3">
                                            <label class="mb-2">Telefon Numaranız</label>
                                            <input name="phone" type="text" placeholder="" class="form-control p-3"
                                                style="border-radius: 10px;">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-4">
                                            <label class="mb-2">Mesajınız</label>
                                            <textarea name="message" placeholder="" rows="6" class="form-control p-3"
                                                style="border-radius: 10px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn btn-primary w-100 py-3"
                                                style="background-color: #FF6B81; border: none; border-radius: 10px; font-size: 16px; font-weight: 600;">Mesajı
                                                Gönder</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Contact Info -->
                    <div class="col-lg-4 col-md-12 col-12 mt-5 mt-lg-0">
                        <div class="single-head h-100 p-4" style="background-color: #f9f9f9; border-radius: 20px;">
                            <div class="single-info mb-4 d-flex align-items-start">
                                <div class="icon"
                                    style="min-width: 50px; height: 50px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #FF6B81; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                                    <i class="lni lni-map-marker"></i>
                                </div>
                                <div class="content ms-3">
                                    <h4 class="fw-bold mb-2">Adresimiz</h4>
                                    <p class="text-muted">Bağdat Caddesi No: 123,<br>Kadıköy, İstanbul</p>
                                </div>
                            </div>
                            <div class="single-info mb-4 d-flex align-items-start">
                                <div class="icon"
                                    style="min-width: 50px; height: 50px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #FF6B81; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                                    <i class="lni lni-phone"></i>
                                </div>
                                <div class="content ms-3">
                                    <h4 class="fw-bold mb-2">Telefon</h4>
                                    <p class="text-muted">+90 (212) 123 45 67<br>+90 (532) 123 45 67</p>
                                </div>
                            </div>
                            <div class="single-info mb-4 d-flex align-items-start">
                                <div class="icon"
                                    style="min-width: 50px; height: 50px; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #FF6B81; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                                    <i class="lni lni-envelope"></i>
                                </div>
                                <div class="content ms-3">
                                    <h4 class="fw-bold mb-2">E-posta</h4>
                                    <p class="text-muted"><a href="mailto:info@cicekdukkani.com"
                                            class="text-muted text-decoration-none">info@cicekdukkani.com</a><br><a
                                            href="mailto:destek@cicekdukkani.com"
                                            class="text-muted text-decoration-none">destek@cicekdukkani.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection