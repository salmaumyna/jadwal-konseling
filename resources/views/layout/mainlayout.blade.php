<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-layout-mode="blue" data-sidebar="dark" data-sidebar-size="sm"
    data-sidebar-image="none" data-layout-width="fluid" data-layout-position="fixed" data-layout-style="default">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', env('APP_NAME'))</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('assets/icon/favicon.ico') }}">
    @include('layout.partials.head')
    @stack('styles')
</head>

<body class="{{ isset($miniSidebar) ? 'mini-sidebar' : '' }}">
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        @include('layout.partials.header')
        @include('layout.partials.nav')
        <div class="page-wrapper">
            <div class="content container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    @stack('after-body')

    <!-- /Main Wrapper -->
    @include('layout.partials.footer-scripts')
    @stack('scripts')
</body>

</html>
