@php($user = auth()->user())
<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="{{ route('mgt.dashboard.index') }}" class="logo">
            <img src="{{ URL::asset('assets/img/logo.png') }}" style="height: 50px !important;" class="mb-2">
        </a>
    </div>
    <!-- /Logo -->
    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Title -->
    <div class="page-title-box">
        <h3>Sistem Informasi Akademik</h3>
    </div>
    <!-- /Header Title -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

    <!-- Header Menu -->
    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span>{{ $user->name }}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('profile.index') }}">Ganti Password</a>
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->
</div>
<!-- /Header -->
