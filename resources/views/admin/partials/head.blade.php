<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.adminName', 'Dashboard | JobBoard') }}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="https://dw3i9sxi97owk.cloudfront.net/uploads/thumbs/db9c4e1327eb8fe5e9395a4b04e1ea4a_70x70.jpg" type="image/png">
    <!--====== Google Fonts ======-->
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">

    <!--====== Material Icons ======-->
    <link rel="stylesheet" href="{{ asset('backend/assets/iconfont/material-icons.css') }}">

    <!-- dataTables.bootstrap4.min css-->
    <link href="{{ asset('backend/assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" media="screen">

    <!-- Chart.min css-->
    <link href="{{ asset('backend/assets/css/Chart.min.css') }}" rel="stylesheet" media="screen">

    <!-- animate css-->
    <link href="{{ asset('backend/assets/css/animate.css') }}" rel="stylesheet" media="screen">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/sidebar.css') }}">
	   <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/responsive.css') }}">

     <!--====== CkEditors js ======-->
    <link rel="stylesheet" href="{{ asset('backend/assets/js/ckeditor.js') }}">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>


<!-- Prealoder -->
<div class="spinner_body">
    <div class="spinner"></div>  
 </div>
 
 <!-- Prealoder -->