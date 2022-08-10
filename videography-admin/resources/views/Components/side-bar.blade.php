<nav class="bg-white sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="mb-4 text-center sidenav-header">
            <a class="navbar-brand text-primary" href="{{ url('/') }}">
                <img src="{{ asset('img/logo/logo.png') }}" alt="homepage" class="dark-logo" />
            </a>
        </div>
        <br>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ $curr_url=='dashboard'?'active':'' }}" href="{{ route('dashboard') }}">
                            <i class="fas fa-desktop"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['categories.new','categories.all','categories.edit'])?'active':'' }}"
                            href="{{ route('categories.all') }}">
                            <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                            <span class="hide-menu">Category Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['packages.new','packages.all','packages.edit'])?'active':'' }}"
                            href="{{ route('packages.all') }}">
                            <i class="fas fa-cube" aria-hidden="true"></i>
                            <span class="hide-menu">Package Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['events.new','events.all','events.edit'])?'active':'' }}"
                            href="{{ route('events.all') }}">
                            <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                            <span class="hide-menu">Event Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['portfolios.new','portfolios.all','portfolios.edit'])?'':'collapsed' }}"
                            href="#portfolios-menu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                            <i class="fa fa-shopping-bag"></i>Portfolio Management</a>
                        <ul class="collapse list-unstyled" id="portfolios-menu">
                            <li class="nav-item">
                                <a class="nav-link {{ in_array($curr_url,['portfolios.new','portfolios.all','portfolios.edit'])?'active':'' }}"
                                    href="{{ route('portfolios.all') }}">
                                    <i class="ml-4 fas fa-camera-retro" aria-hidden="true"></i>
                                    <span class="hide-menu">Images</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ in_array($curr_url,['portfolios.video.all'])?'active':'' }}"
                                    href="{{ route('portfolios.video.all') }}">
                                    <i class="ml-4 fas fa-video-camera" aria-hidden="true"></i>
                                    <span class="hide-menu">Videos</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['booking.new','booking.all','booking.edit','booking.view'])?'active':'' }}"
                            href="{{ route('booking.all') }}">
                            <i class="fas fa-bookmark" aria-hidden="true"></i>
                            <span class="hide-menu">Booking Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['customers.all','customers.edit','customers.view','customers.new'])?'active':'' }}"
                            href="{{ route('customers.all') }}">
                            <i class="fas fa-users-cog" aria-hidden="true"></i>
                            <span class="hide-menu">Customer Management</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ in_array($curr_url,['requests.all','requests.view'])?'active':'' }}"
                            href="{{ route('requests.all') }}">
                            <i class="fas fa-envelope-open-text" aria-hidden="true"></i>
                            <span class="hide-menu">Request Management</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
