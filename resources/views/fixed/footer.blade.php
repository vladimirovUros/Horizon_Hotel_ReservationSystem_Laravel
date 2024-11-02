<footer class="footer-area section-padding-80-0">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row align-items-baseline justify-content-between">
                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Footer Logo -->
                        <a href="#" class="footer-logo"><img src="{{asset("assets/img/core-img/logo2.png")}}" alt=""></a>

                        <h4>+12 345-678-9999</h4>
                        <span>Info.colorlib@gmail.com</span>
                        <span>856 Cordia Extension Apt. 356, Lake Deangeloburgh, South Africa</span>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Our Blog</h5>

                        <!-- Single Blog Area -->
                        <div class="latest-blog-area">
                            <a href="#" class="post-title">Freelance Design Tricks How</a>
                            <span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i> Jan 02, 2019</span>
                        </div>

                        <!-- Single Blog Area -->
                        <div class="latest-blog-area">
                            <a href="#" class="post-title">Free Advertising For Your Online</a>
                            <span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i> Jan 02, 2019</span>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-4 col-lg-2">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Links</h5>

                        <!-- Footer Nav -->
                        <ul class="footer-nav">
                            <li><a href="{{ route('home') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Home</a></li>
                            <li><a href="{{ route('about') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> About Us</a></li>
                            <li><a href="{{ route('rooms') }}"><i class="fa fa-caret-right" aria-hidden="true"></i>Rooms</a></li>
                            <li><a href="{{ route('contact') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Contact</a></li>
                            <li><a href="{{ route('author') }}"><i class="fa fa-caret-right" aria-hidden="true"></i> Author</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Single Footer Widget Area -->
                <div class="col-12 col-sm-8 col-lg-4">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h5 class="widget-title">Subscribe Newsletter</h5>
                        <span>Subscribe our newsletter gor get notification about new updates.</span>
                        <!-- Newsletter Form -->
{{--                        @section('token')--}}
{{--                            <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--                        @endsection--}}
                        <form action="{{route("newsletter")}}" class="nl-form" method="POST">
                            <input type="email" id="emailNews" name="emailNews" class="form-control" placeholder="Enter your email..." />
                            <button type="submit" id="btnSendNews" name="btnSendNews"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                            <p class="msgError"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copywrite Area -->
    <div class="container">
        <div class="copywrite-content">
            <div class="row align-items-center">
                <div class="col-12 col-md-8">
                    <!-- Copywrite Text -->
                    <div class="copywrite-text">
                        <p>
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Uros Vladimirov
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <!-- Social Info -->
                    <div class="social-info">
                        @foreach($socialMedias as $social)
                            <a href="{{$social->link}}"><i class="{{$social->icon}}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

{{--@if(session("message") || $errors->any())--}}
{{--    <div class="modal fade bd-example-modal-sm d-block modalOpacity mt-5" tabindex="-1" role="dialog"--}}
{{--         aria-labelledby="mySmallModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-sm">--}}
{{--            <div class="modal-content py-1 px-3 " >--}}
{{--                <p id="close-modal" class="pt-4">x</p>--}}
{{--                @if($errors->any())--}}
{{--                    @foreach($errors->all() as $error)--}}
{{--                        <p class="text-danger msgError">{{ $error }}</p>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
{{--                    {{session("message" )}}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}
