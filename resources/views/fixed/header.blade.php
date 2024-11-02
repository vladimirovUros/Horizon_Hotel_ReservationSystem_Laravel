{{--{{dump(session()->get("users"))}}--}}
<header class="header-area">
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="top-header-content d-flex m-2" id="loggedInUser">
                        <ul id="login" class="d-flex align-items-center">
                            @if(session()->has("users"))
                                <a class="userSlikaProfil" href="{{route("profile")}}">
                                    <li><img src="{{asset("assets/img/users/" . session()->get("users")->profile_image)}}" alt="defaultImg" class="defaultImg"><span id="userName">{{session()->get("users")->username}}</span></li>
                                </a>
                                <span id="logOutSpan"><li><i class='fa fa-sign-in ikonica mr-1'></i><a
                                            href='{{route("logout")}}'>Logout</a></li></span>
                                @if(session()->get("users")->role_id == 1)
                                    <span id="adminSpan"><li><a href='{{route("admin.admin")}}'>Admin</a></li></span>
                                @endif
                            @else
                                <span id="loginSpan"><li><i class='fa fa-sign-in ikonica'></i><a
                                            href='{{route("login")}}'>Login</a></li></span>
                                <span id="registerSpan"><li><i class='fa fa-sign-in ikonica'></i><a
                                            href='{{route("register")}}'>Register</a></li></span>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                    <div class="top-header-content">
                        <!-- Top Social Area -->
                        <div class="top-social-area ml-auto">
                            @foreach($socialMedias as $social)
                                <a href="{{$social->link}}"><i class="{{$social->icon}}"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Header Area End -->

    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="robertoNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="{{route("home")}}"><img src="{{asset("assets/img/core-img/logo.png")}}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Nav Start -->
                            <div id="menuSmall">
                                @if(session()->has("users"))
                                    <a class="userHide" href="{{route("profile")}}"><img class="defaultImg" src="{{asset("assets/img/users/" . session()->get("users")->profile_image)}}" alt="user"></a><span id="nameHide">{{session()->get("users")->username}}</span>

                                @endif
                            </div>
                        <div class="classynav pt-0">
                            <ul id="nav">
                                @foreach($menu as $link)
                                    <li class="active"><a href="{{route($link->url)}}">{{$link->name}}</a></li>
                                @endforeach
                                @if(!session()->has("users"))
                                    <li class="additional-links"><a href="{{route("register")}}">Register</a></li>
                                    <li class="additional-links"><a href="{{route("login")}}">Login</a></li>
                                @endif
                                    @if(session()->has("users"))
                                        <li class="additional-links"><a href="{{route("logout")}}">Logout</a></li>
                                    @endif
                            </ul>
                            <!-- Search -->
{{--                            <div class="search-btn ml-4">--}}
{{--                                <i class="fa fa-search" aria-hidden="true"></i>--}}
{{--                            </div>--}}
                            <!-- Book Now -->
                            <div class="book-now-btn ml-3 ml-lg-5">
                                <a href="{{route("rooms")}}">Book Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
