<!-- resources/views/includes/header.blade.php -->
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Reader | Hugo Personal Blog Template')</title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="This is meta description">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Hugo 0.74.3" />
    <!-- plugins -->
    <link rel="stylesheet" href="{{ asset('assets/client/plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/plugins/slick/slick.css') }}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}" media="screen">
    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/client/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/client/images/favicon.png') }}" type="image/x-icon">
    <meta property="og:title" content="Reader | Hugo Personal Blog Template" />
    <meta property="og:description" content="This is meta description" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:updated_time" content="2020-03-15T15:40:24+06:00" />
</head>
<body>
    <!-- navigation -->
    <header class="navigation fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white">
                <a class="navbar-brand order-1" href="{{ url('/') }}">
                    <img class="img-fluid" width="100px" src="{{ asset('assets/client/images/logo.png') }}" alt="Reader | Hugo Personal Blog Template">
                </a>
                <div class="collapse navbar-collapse text-center order-lg-2 order-3 mx3" id="navigation">
                    <ul class="navbar-nav">
                            <li class="list-inline-item"><a class="h4" href="tags.html">Shop</a></li>
                            <li class="list-inline-item"><a class="h4" href="tags.html">Color</a></li>
                            <li class="list-inline-item"><a class="h4" href="tags.html">Creative</a></li>
                          
                    </ul>
                </div>
                <div class="order-2 order-lg-3 d-flex align-items-center">
                    <select class="m-2 border-0 bg-transparent" id="select-language">
                        <option id="en" value="" selected>En</option>
                        <option id="fr" value="">Fr</option>
                    </select>
                    <!-- search -->
                    <form class="search-bar">
                        <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                    </form>
                    <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse" data-target="#navigation">
                        <i class="ti-menu"></i>
                    </button>
                </div>
            </nav>
        </div>
    </header>
</body>
