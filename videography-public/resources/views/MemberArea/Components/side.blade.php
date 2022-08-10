<aside id="leftsidebar" class="sidebar h_menu">
    <div class="container">
        <div class="row clearfix">
            <div class="col-12">
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN</li>
                        <li class="">
                            <a href=" {{ route('dashboard') }}"><i class="icon-home"></i><span>Dashboard</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('booking.all') }}"><i class="icon-basket"></i><span>My
                                Bookings</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{ route('booking') }}" class="menu-toggle"><i
                                class="icon-plus"></i><span>New
                                    Booking</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="menu-toggle"><i class="icon-user"></i><span>Profile</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="{{ route('basic.information') }}" class="menu-toggle">
                                            <i class="icon-user"></i><span>Basic Information</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('privacy.setting') }}" class="menu-toggle">
                                            <i class="icon-basket"></i><span>Privacy setting</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    