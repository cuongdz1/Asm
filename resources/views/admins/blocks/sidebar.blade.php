            <!-- Left Sidebar Start -->
            <div class="app-sidebar-menu">
                <div class="h-100" data-simplebar>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <div class="logo-box">
                            <a class='logo logo-light' href='index.html'>
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt=""
                                        height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt=""
                                        height="24">
                                </span>
                            </a>
                            <a class='logo logo-dark' href='index.html'>
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt=""
                                        height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt=""
                                        height="24">
                                </span>
                            </a>
                        </div>

                        <ul id="side-menu">

                            <li class="menu-title">Quản trị</li>

                            <li>
                                <a class='tp-link' href='{{ route('admins.dashboard') }}'>
                                    <i data-feather="home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a class='tp-link' href='{{ route('admins.taikhoans.index') }}'>
                                    <i data-feather="users"></i>
                                    <span> Quản lý tài khoản </span>
                                </a>
                            </li>

                            <li>
                                <a class='tp-link' href='{{ route('admins.donhangs.index') }}'>
                                    <i data-feather="shopping-bag"></i>
                                    <span> Quản lý đơn hàng </span>
                                </a>
                            </li>

                        </ul>

                        <ul id="side-menu">

                            <li class="menu-title">Kinh doanh</li>

                            <li>
                                <a class='tp-link' href='{{ route('admins.danhmucs.index') }}'>
                                    <i data-feather="align-center"></i>
                                    <span> Danh mục sản phẩm </span>
                                </a>
                            </li>

                            <li>
                                <a class='tp-link' href='{{ route('admins.sanphams.index') }}'>
                                    <i data-feather="package"></i>
                                    <span>Danh sách sản phẩm</span>
                                </a>
                            </li>

                            <li>
                                <a class='tp-link' href='#'>
                                    <i data-feather="pie-chart"></i>
                                    <span>Báo cáo thống kê</span>
                                </a>
                            </li>

                            <li>
                                    <div class="">
                                        <div class="container">
                                            <a class="brand" href="{{ url('/') }}">
                                                {{ config('app.name', 'Laravel') }}
                                            </a>
                                            <button class="btn btn-danger" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#SupportedContent" aria-controls="SupportedContent"
                                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                                <span>Logout</span>
                                            </button>

                                            <div class="collapse -collapse" id="SupportedContent">
                                                <!-- Left Side Of  -->
                                                <ul class="-nav me-auto">

                                                </ul>

                                                <!-- Right Side Of  -->
                                                <ul class="-nav ms-auto">
                                                    <!-- Authentication Links -->
                                                    @guest
                                                        @if (Route::has('login'))
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                                                            </li>
                                                        @endif

                                                        @if (Route::has('register'))
                                                            <li class="nav-item">
                                                                <a class="nav-link"
                                                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                                                            </li>
                                                        @endif
                                                    @else
                                                        <li class="nav-item dropdown">
                                                            <a id="Dropdown" class="nav-link dropdown-toggle"
                                                                href="#" role="button" data-bs-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false" v-pre>
                                                                {{ Auth::user()->name }}
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="Dropdown">
                                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                                    onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                                                    {{ __('Logout') }}
                                                                </a>

                                                                <form id="logout-form" action="{{ route('logout') }}"
                                                                    method="POST" class="d-none">
                                                                    @csrf
                                                                </form>
                                                            </div>
                                                        </li>
                                                    @endguest
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                            </li>


                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
            </div>
            <!-- Left Sidebar End -->
