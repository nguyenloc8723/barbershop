<!-- Preloader -->
<div class="preloader-bg"></div>
<div id="preloader">
    <div id="preloader-status">
        <div class="preloader-position loader"> <span></span> </div>
    </div>
</div>
<!-- Progress scroll totop -->
<div class="progress-wrap cursor-pointer">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <a class="logo" href="{{ route('index') }}"> <img src="{{asset('client/img/logo.png')}}" class="logo-img" alt=""> </a>
            <!-- <a class="logo" href="index{{ route('index') }}"> <h2>Perukar <span>Barber Shop</span></h2> </a> -->
        </div>
        <!-- Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"><i class="ti-menu"></i></span> </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="{{ route('index') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pricing') }}">Pricing</a></li>
                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Pages <i class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('portfolio') }}" class="dropdown-item"><span>Portfolio</span></a></li>
                        <li><a href="{{ route('team') }}" class="dropdown-item"><span>Team</span></a></li>
                        <li><a href="{{ route('faq') }}" class="dropdown-item"><span>Faq</span></a></li>

                        <li><a href="" class="dropdown-item"><span>Services Page</span></a></li>

                        <li><a href="" class="dropdown-item"><span>Services Page</span></a></li>

                        <li><a href="{{ route('team-details') }}" class="dropdown-item"><span>Team Details</span></a></li>
                        <li><a href="{{ route('post') }}" class="dropdown-item"><span>Post Single</span></a></li>
                        <li><a href="{{ route('404') }}" class="dropdown-item"><span>404</span></a></li>
                        <li class="dropdown-submenu dropdown"> <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" href="#"><span>Sub Menu <i class="ti-angle-right"></i></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="dropdown-item"><span>Dropdown</span></a></li>
                                <li><a href="#" class="dropdown-item"><span>Dropdown</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown"> <a  class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">Blog <i class="ti-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item"><span>Blog 01</span></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('phone-auth') }}">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
