
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.jobBoard', 'Crafting the Ultimate Job Board: Elevate Your Platform with Our SEO-Optimized Laravel Vue Template') }}</title>
    <meta name="description" content="Unlock unparalleled job board performance with our meticulously designed Laravel Vue template. Seamlessly blend functionality and aesthetics while dominating search rankings through advanced SEO optimization. Elevate user experience, engage job seekers and employers effortlessly. Explore limitless possibilities for your job board platform today.">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('external/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('external/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('external/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('external/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('external/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('external/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('external/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('external/css/animate.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">



    <link rel="stylesheet" href="{{ asset('external/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('external/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('external/css/style.css') }}">


</head>

<body>