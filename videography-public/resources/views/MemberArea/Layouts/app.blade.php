<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- Title -->
    <title>@yield('title','MR.Wickramaarachchi Videography')</title>
    <meta name="description" content="@yield('description','Sri Lanka s greatest photo gallery')" />
    <meta name="og:title" property="og:title" content="@yield('ogtitle','MR.Wickramaarachchi Videography')" />
    <meta name="og:url" property="og:url" content="{{Request::url()}}" />

    <meta name="og:type" property="og:type" content="@yield('ogtype','website')" />
    <meta name="og:image" property="og:image" content="@yield('ogimage',asset('img/logonew.png') )" />
    <meta name="og:image:secure_url" property="og:image:secure_url" content="@yield('ogimage', asset(" img/logonew.png")
        )" />
    <meta name="og:image:width" property="og:image:width" content="@yield('ogimagewidth',500)" />
    <meta name="og:image:height" property="og:image:height" content="@yield('ogimageheight',200)" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @php
    $curr_url = Route::currentRouteName();
    @endphp
    <!-- Links of CSS files -->
    @include('MemberArea.Library.styles')

    <!-- Favicon -->
    <link href="{{ asset('img/logonew.png') }}" rel="icon">
    <link href="{{ asset('img/logonew.png') }}" rel="apple-touch-icon">
</head>

<body class="theme-purple">
    @include('MemberArea.Components.nav')
    @include('MemberArea.Components.side')

    <section class="content profile-page">
        <div class="container">
            @yield('breadcrumb')
            {{-- <livewire:member.components.head /> --}}
            @yield('content')
            @include('MemberArea.Components.footer')
        </div>
    </section>

    @yield('modal')

    <!-- End Go Top Area -->
    <div class="modal fade ml-6" id="logoutModal" tabindex="-1" data-backdrop="show" role="dialog"
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
                        <h4 class="heading mt-4">Are You Sure!</h4>
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

    @include('MemberArea.Library.scripts')
    {{-- @include('components.messenger') --}}

</body>

</html>
