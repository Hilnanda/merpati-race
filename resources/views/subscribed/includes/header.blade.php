<header class="header-area">
    <!-- Navbar Area -->
    <div class="musica-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container-fluid">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="musicaNav">
                    @if (count($nama_website)!=0)
                    @foreach ($nama_website as $item)
                    <a href="/" class="nav-brand"><h3 style="color: white">{{ $item->name_website }}</h3></a>

                    @endforeach
                    @else
                    <a href="/" class="nav-brand"><h3 style="color: white">Nama Website</h3></a>
                    @endif
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="">Product & Service</a></li>
                                        <li><a href="{{ route('home-news') }}">News</a></li>
                                        <li><a href="{{ route('about-us') }}">About Us</a></li>
                                        <li><a href="{{ route('contact') }}">Contact</a></li>
                                    </ul>
                                </li>
                                <li><a href="/pigeons">My Loft</a></li>
                                <li><a href="/events/index">Lomba</a></li>
                                <li><a href="">Hasil</a></li>
                                <li><a href="/club">Club</a></li>
                                <li><a href="/team">Team</a></li>
                                @guest
                                    <li>
                                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endguest
                            </ul>

                            <!-- Social Button -->
                            <div class="top-social-info">
                                @foreach ($data_medsos as $item)
                                <a href="{{ $item->url_medsos }}{{ $item->username_medsos }}"><i class="fa {{ $item->icon_medsos }}" aria-hidden="true"></i></a>

                                @endforeach
                                
                            </div>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>