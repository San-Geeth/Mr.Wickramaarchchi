<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- Title -->
    <title>@yield('title','Mr. Wickramaarachchi')</title>
    <meta name="description" content="@yield('description','Studio')" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
    $curr_url = Route::currentRouteName();
    @endphp

    <link rel=apple-touch-icon sizes=180x180 href=assets/images/icons/favicons/apple-touch-icon.png> <link rel=icon
        type=image/png sizes=32x32 href=assets/images/icons/favicons/favicon-32x32.png> <link rel=icon type=image/png
        sizes=16x16 href=assets/images/icons/favicons/favicon-16x16.png> <link rel=manifest
        href=assets/images/icons/favicons/site.webmanifest> <link rel=mask-icon
        href=assets/images/icons/favicons/safari-pinned-tab.svg color=#232323>
    <meta name=msapplication-TileColor content=#ffffff>
    <meta name=theme-color content=#ffffff>

    @include('PublicArea.Library.styles')
</head>

<body>
    @include('PublicArea.Components.nav')

    <main>
        @yield('content')
    </main>
    @include('PublicArea.Components.footer')

    <div class="ml-6 modal fade" id="logoutModal" tabindex="-1" data-backdrop="show" role="dialog"
        aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-dialog-centered modal-" role="document">
            <div class="modal-content modal-sm ">
                <div class="modal-header">
                    <h6 class="modal-title " id="modal-title-notification">Logout</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <h4 class="mt-4 heading">Are You Sure!</h4>
                        <p>
                            Do You Want To Logout Now ?
                        </p>
                    </div>
                    <div class="col-12">
                        <h6 class="text-center">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="Submit" class="btn btn-danger">Sure, Logout</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('PublicArea.Library.scripts')

</body>

</html>
