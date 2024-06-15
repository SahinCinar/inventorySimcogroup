<!DOCTYPE html>
<html>
<head>
    <!-- Meta and CSS includes -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SimcoGroup | Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/Ionicons/css/ionicons.min.css') }}">
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/SimcoGroup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/skin-green.min.css') }}">
    @yield('top')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <span class="logo-mini"><b>SG</b></span>
            <span class="logo-lg"><b>Admin</b> System</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('user-profile.png') }}" class="user-image" alt="User Image">
                            @if (Auth::check())
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            @else
                                <span class="hidden-xs">Guest</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="{{ asset('user-profile.png') }}" class="img-circle" alt="User Image">
                                @if (Auth::check())
                                    <p>{{ Auth::user()->name }}<small>{{ Auth::user()->email }}</small></p>
                                @else
                                    <p>Guest<small>Not logged in</small></p>
                                @endif
                            </li>
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a class="btn btn-danger btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    @include('layouts.sidebar')

    <div class="content-wrapper">
        <section class="content container-fluid">
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            Developed by Sahin Cinar
        </div>
        <?php $date = date('Y'); ?>
        <strong>&copy; {{ $date }} - SimcoGroup </strong>
    </footer>
    <div class="control-sidebar-bg"></div>
</div>

<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/SimcoGroup.min.js') }}"></script>
@yield('bot')
</body>
</html>
