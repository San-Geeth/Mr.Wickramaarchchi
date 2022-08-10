<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta name="description" content="Studio">
    <title>@yield('title','Admin Dashboard | MR. Wickramaarachchi Videography')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @include('Library.styles')
    @php
    $curr_url = Route::currentRouteName();
    @endphp

    <link href="{{ asset('img/logo/logo.png') }}" rel="icon">
    <link href="{{ asset('img/logo/logo.png') }}" rel="apple-touch-icon">
</head>

<body>
    <!-- Sidenav -->
    @include('Components.side-bar')
    <div class="main-content" id="panel">
        @include('Components.nav')
        @yield('header')
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="dixVh63">
                @yield('content')
            </div>
        </div>
        @include('Components.footer')
    </div>
    @include('Library.scripts')
</body>

</html>
