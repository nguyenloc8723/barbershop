<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "130292070164763");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v18.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- Parallax Image -->
<!-- Preloader -->
<div class="preloader-bg"></div>
<div id="preloader">
    <div id="preloader-status">
        <div class="preloader-position loader"><span></span></div>
    </div>
</div>
<!-- Progress scroll totop -->
<div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <a class="logo" href="{{ route('index') }}"> <img src="{{asset('client/img/logo.png')}}" class="logo-img"
                                                              alt=""> </a>
            <!-- <a class="logo" href="index{{ route('index') }}"> <h2>Perukar <span>Barber Shop</span></h2> </a> -->
        </div>
        <!-- Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"><i class="ti-menu"></i></span></button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="{{ route('index') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pricing') }}">Pricing</a></li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button"
                                                 data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                 aria-expanded="false">Pages <i class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('portfolio') }}" class="dropdown-item"><span>Portfolio</span></a></li>
                        <li><a href="{{ route('team') }}" class="dropdown-item"><span>Team</span></a></li>
                        <li><a href="{{ route('faq') }}" class="dropdown-item"><span>Faq</span></a></li>

                        <li><a href="" class="dropdown-item"><span>Services Page</span></a></li>

                        <li><a href="" class="dropdown-item"><span>Services Page</span></a></li>

                        <li><a href="{{ route('team-details') }}" class="dropdown-item"><span>Team Details</span></a>
                        </li>
                        <li><a href="{{ route('post') }}" class="dropdown-item"><span>Post Single</span></a></li>
                        <li><a href="{{ route('404') }}" class="dropdown-item"><span>404</span></a></li>
                        <li class="dropdown-submenu dropdown"><a class="dropdown-item dropdown-toggle"
                                                                 data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                                 aria-expanded="false" href="#"><span>Sub Menu <i
                                        class="ti-angle-right"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item"><span>Dropdown</span></a></li>
                                <li><a href="#" class="dropdown-item"><span>Dropdown</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="{{route('blog') }}"
                                                 role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                                 aria-expanded="false">Blog <i class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('blog') }}" class="dropdown-item"><span>Blog 01</span></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>


                @auth

                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                           data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span  class="pro-user-name ms-1">
                            <i class="fa-solid fa-user-shield"></i>     User-Phone <i class="mdi mdi-chevron-down"></i>
                                </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->

                            <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fe-log-out"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('phone-auth') }}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

