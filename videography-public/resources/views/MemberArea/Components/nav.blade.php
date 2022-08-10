<nav class="top_navbar">
    <div class="container">
        <div class="row clearfix">
            <div class="col-12">
                <div class="navbar-logo">
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="{{ route('home') }}"><span class="text-warning">MR. Wickramaarachchi</span><small class="text-white">Videography</small>
                    </a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="nav-item hidden-xs">
                        <a href="{{ route('home') }}"
                            class="nav-link ">Home</a>
                    </li>
                    <li class="nav-item hidden-xs">
                        <a href="{{ route('portfolio') }}"
                            class="nav-link ">Portfolio</a>
                    </li>
                    <li class="nav-item hidden-xs">
                        <a href="{{ route('pricing') }}"
                            class="nav-link ">Pricing</a>
                    </li>
                    <li class="nav-item hidden-xs">
                        <a href="{{ route('contact') }}" class="nav-link ">Contact
                            Us</a>
                    </li>

                    <li class="dropdown profile">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <img class="rounded-circle" src="{{ asset('img/avatar-red.png') }}" alt="User"> <span
                                class="text-white"> Hi {{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            @guest
                            <li><a href=""><i class="icon-notebook m-r-10"></i><span>Login</span></a>
                            </li>
                            @else
                            <li><a href="#"><i
                                        class="icon-notebook m-r-10"></i><span>Dashboard</span></a></li>
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal"><i
                                        class="icon-power m-r-10"></i><span>Sign Out</span></a></li>
                            @endguest
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
