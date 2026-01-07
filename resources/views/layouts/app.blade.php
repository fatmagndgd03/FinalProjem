<!DOCTYPE html>
<html class="no-js" lang="tr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title', 'Garden Flowers')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    @yield('styles')
    <style>
        /* Global styles can go here */
        .fly-img {
            position: absolute;
            z-index: 9999;
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
            pointer-events: none;
            transition: all 1s ease-in-out;
            opacity: 0.8;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        Kullandığınız tarayıcı <strong>çok eski</strong>. Lütfen deneyiminizi ve güvenliğinizi artırmak için
        <a href="https://browsehappy.com/">tarayıcınızı güncelleyin</a>.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    @section('header')
    @include('partials._header')
    @show


    <!-- Content Wrapper -->
    <div style="@yield('content-wrapper-style', 'padding-top: 150px; padding-bottom: 50px; min-height: 60vh;')">
        @yield('content')
    </div>
    <!-- End Content Wrapper -->

    <!-- Start Footer Area -->
    @include('partials._footer')
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('scripts')

    <script>
        // Global Fly Animation Function
        function flyToElement(flyer, flyingTo) {
            var $func = $(this);
            var divider = 3;
            var flyerClone = $(flyer).clone();

            $(flyerClone).css({ position: 'absolute', top: $(flyer).offset().top + "px", left: $(flyer).offset().left + "px", opacity: 1, 'z-index': 1000 });
            $('body').append($(flyerClone));

            var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width() / divider) / 2;
            var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 2) - ($(flyer).height() / divider) / 2;

            $(flyerClone).animate({
                opacity: 0.4,
                left: gotoX,
                top: gotoY,
                width: $(flyer).width() / divider,
                height: $(flyer).height() / divider
            }, 1000,
                function () {
                    $(flyerClone).remove();
                });
        }

        // Pure Vanilla JS version for dependency-free animation
        function animateFly(startEl, targetEl) {
            if (!startEl || !targetEl) return;

            const clone = startEl.cloneNode(true);
            const startRect = startEl.getBoundingClientRect();
            const targetRect = targetEl.getBoundingClientRect();

            clone.classList.add('fly-img');
            clone.style.width = startRect.width + 'px';
            clone.style.height = startRect.height + 'px';
            clone.style.top = (startRect.top + window.scrollY) + 'px';
            clone.style.left = (startRect.left + window.scrollX) + 'px';
            clone.style.position = 'absolute'; // Ensure it's absolute

            document.body.appendChild(clone);

            // Force reflow
            void clone.offsetWidth;

            clone.style.top = (targetRect.top + window.scrollY + 10) + 'px';
            clone.style.left = (targetRect.left + window.scrollX + 10) + 'px';
            clone.style.width = '30px';
            clone.style.height = '30px';
            clone.style.opacity = '0.5';

            setTimeout(() => {
                clone.remove();
            }, 1000); // Match transition duration
        }
    </script>
</body>

</html>