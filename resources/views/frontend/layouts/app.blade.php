<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    @stack('before-styles')
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">

    <!-- CSS here -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/slicknav.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/gijgo.css">
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/animated-headline.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/slick.css">
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <livewire:styles/>
    @stack('after-styles')
</head>

<body class="black-bg">

@include('frontend.layouts.preloader')

@include('frontend.layouts.header')

<main>
    @yield('content')
</main>

@include('frontend.layouts.footer')

@include('frontend.layouts.scroll-up')

@stack('before-scripts')
<!-- JS here -->

<script src="/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="/assets/js/popper.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="/assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="/assets/js/owl.carousel.min.js"></script>
<script src="/assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="/assets/js/wow.min.js"></script>
<script src="/assets/js/animated.headline.js"></script>
<script src="/assets/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="/assets/js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="/assets/js/jquery.nice-select.min.js"></script>
<script src="/assets/js/jquery.sticky.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="/assets/js/jquery.counterup.min.js"></script>
<script src="/assets/js/waypoints.min.js"></script>
<script src="/assets/js/jquery.countdown.min.js"></script>
<script src="/assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="/assets/js/contact.js"></script>
<script src="/assets/js/jquery.form.js"></script>
<script src="/assets/js/jquery.validate.min.js"></script>
<script src="/assets/js/mail-script.js"></script>
<script src="/assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="/assets/js/plugins.js"></script>
<script src="/assets/js/main.js"></script>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/frontend.js') }}"></script>
<livewire:scripts />
@stack('after-scripts')

</body>
</html>
