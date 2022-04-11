
    <!-- header -->
    <header id="display-pc">
        <div class="container">
            <div class="row" style=" display:flex; align-items: center;">
                <div class="col-lg-4 col-md-4 left-menu">
                    <nav class=" navbar-expand-lg navbar-light bg-light">
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="{{route ('index')}}">HOME</a>
                                <a class="nav-link" href="#competitions"> COMPETITION</a>
                                <a class="nav-link" href="#mini-competitions"> MINI COMPETITION</a>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('public/assets/website') }}/images/logo.png" class="img-fluid">
                    </a>
                </div>
                <div class="col-lg-4    col-md-4 left-menu">
                    <nav class=" navbar-expand-lg navbar-light bg-light">
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link active" aria-current="page" href="{{route ('winner') }}">WINNERS </a>
                                <a class="nav-link" href="{{route ('sold-out')}}"> SOLD OUT</a>
                                <a class="nav-link" href="{{route ('result')}}">RESULTS</a>
                                <a class="nav-link" href="{{route ('faqs')}}">FAQ</a>
                                <a class="nav-link" href="{{route ('login')}}">
                                    <i class="fa fa-user"></i>
                                </a>
                                <a class="nav-link" href="cart">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <header id="responsive-menu">
        <div class="container">
            <div class="row" style=" display:flex; align-items: center;">
                <div class="col-lg-4 col-md-3">
                    <a class="logo-responive" href="{{ route('index') }}">
                        <img src="{{ asset('public/assets/website') }}/images/logo.png" class="img-fluid">
                    </a>
                </div>
                <div class="col-lg-4 col-md-9 left-menu">
                    <span style="font-size:30px;cursor:pointer" class="toogle-responsive-menu" onclick="openNav()">&#9776; </span>
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <div class="navbar-nav">
                            <div class="logo">
                                <a class="logo-responive" href="{{ route('index') }}">
                                    <img src="{{ asset('public/assets/website') }}/images/logo.png" class="img-fluid">
                                </a>
                            </div>
                            <a class="nav-link active" aria-current="page" href="{{ route('index') }}">HOME</a>
                            <a class="nav-link" href="#competitions"> COMPETITION</a>
                            <a class="nav-link" href="#mini-competitions"> MINI COMPETITION</a>
                            <a class="nav-link active" aria-current="page" href="{{route ('winner')}}">WINNERS </a>
                            <a class="nav-link" href="{{route ('sold-out')}}"> SOLD OUT</a>
                            <a class="nav-link" href="{{route ('result')}}">RESULTS</a>
                            <a class="nav-link" href="{{route ('faqs')}}">FAQ</a>
                            <a class="nav-link" href="{{route ('login')}}">
                                <i class="fa fa-user"></i>
                            </a>
                            <a class="nav-link" href="cart">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header -->