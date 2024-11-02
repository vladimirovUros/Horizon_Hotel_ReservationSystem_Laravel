@extends("layouts.layout")
@section("description") Hotel Horizon, the most luxuriest hotel in the world @endsection
@section("keywords")  hotel, services, about, 20 years @endsection
@section("title") About @endsection
@section("content")
    <!-- Breadcrumb Area Start -->
    @include("partials.breadcrumb")
    <!-- Breadcrumb Area End -->
    <!-- About Us Area Start -->
    <section class="roberto-about-us-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="about-thumbnail pr-lg-5 mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <img src="{{asset("assets/img/bg-img/51.jpg")}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <!-- Section Heading -->
                    <div class="section-heading wow fadeInUp" data-wow-delay="300ms">
                        <h6>Out journey</h6>
                        <h2>20 Years Of Experience</h2>
                    </div>
                    <div class="about-content mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <p>For two decades, our hotel has stood as a beacon of hospitality, welcoming guests from around the globe with warmth and dedication. As we celebrate our 20th anniversary, we reflect on the remarkable journey of growth and progress that has defined our establishment.</p>
                        <p>Over the years, we have witnessed remarkable transformations and milestones. From the expansion of our property to the introduction of innovative amenities and services.</p>
                        <img src="{{asset("assets/img/core-img/signature.png")}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Area End -->
    <!-- Video Area Start -->
    <div class="roberto--video--area bg-img bg-overlay jarallax section-padding-0-100" style="background-image: url({{ asset('assets/img/bg-img/20.jpg') }});">
    <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-12 col-md-6">
                    <!-- Section Heading -->
                    <div class="section-heading text-center white wow fadeInUp" data-wow-delay="100ms">
                        <h6>Ultimate Solutions</h6>
                        <h2>Our Hotel &amp; Room</h2>
                    </div>
                    <div class="video-content-area mt-100 wow fadeInUp" data-wow-delay="500ms">
                        <a href="https://www.youtube.com/watch?v=WLVussEG4C8" class="video-play-btn"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Area End -->
    <!-- Service Area Start -->
    <section class="roberto-service-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h6>Ultimate Solutions</h6>
                        <h2>Our Hotel &amp; Room</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <img src="{{asset("assets/img/bg-img/21.jpg")}}" alt="">
                        <div class="service-title d-flex align-items-center justify-content-center">
                            <h5>Restaurant &amp; Bar</h5>
                        </div>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="{{asset("assets/img/bg-img/22.jpg")}}" alt="">
                        <div class="service-title d-flex align-items-center justify-content-center">
                            <h5>Spa &amp; Fitness</h5>
                        </div>
                    </div>
                </div>
                <!-- Single Service Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area mb-100 wow fadeInUp" data-wow-delay="700ms">
                        <img src="{{asset("assets/img/bg-img/23.jpg")}}" alt="">
                        <div class="service-title d-flex align-items-center justify-content-center">
                            <h5>Pool &amp; Party</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Area End -->
    <!-- Call To Action Area Start -->
    @include("partials.contact-area")
    <!-- Call To Action Area Start -->
    <!-- Partner Area Start -->
    @include("partials.partners")
    <!-- Partner Area End -->
@endsection
