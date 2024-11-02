@extends("layouts.layout")
@section("description") Hotel Horizon, the most luxuriest hotel in the world @endsection
@section("keywords")  hotel, services @endsection
@section("title") Home @endsection
@section("content")
<!-- Welcome Area Start -->
<section class="welcome-area">
    <div class="welcome-slides owl-carousel">
        <!-- Single Welcome Slide -->
        <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url('{{ asset("assets/img/bg-img/16.jpg") }}');" data-img-url="{{ asset("assets/img/bg-img/16.jpg") }}">
            <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12">
                            <div class="welcome-text text-center">
                                <h6 data-animation="fadeInLeft" data-delay="200ms">Hotel &amp; Resort</h6>
                                <h2 data-animation="fadeInLeft" data-delay="500ms">Welcome To Horizon</h2>
                                <a href="{{route("rooms")}}" class="btn roberto-btn btn-2" data-animation="fadeInLeft" data-delay="800ms">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Welcome Slide -->
        <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url('{{ asset("assets/img/bg-img/17.jpg") }}');" data-img-url="{{ asset("assets/img/bg-img/17.jpg") }}">
            <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12">
                            <div class="welcome-text text-center">
                                <h6 data-animation="fadeInUp" data-delay="200ms">Hotel &amp; Resort</h6>
                                <h2 data-animation="fadeInUp" data-delay="500ms">Welcome To Roberto</h2>
                                <a href="#" class="btn roberto-btn btn-2" data-animation="fadeInUp" data-delay="800ms">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Welcome Slide -->
        <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url('{{ asset("assets/img/bg-img/18.jpg") }}');" data-img-url="{{ asset("assets/img/bg-img/18.jpg") }}">
            <!-- Welcome Content -->
            <div class="welcome-content h-100">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <!-- Welcome Text -->
                        <div class="col-12">
                            <div class="welcome-text text-center">
                                <h6 data-animation="fadeInDown" data-delay="200ms">Hotel &amp; Resort</h6>
                                <h2 data-animation="fadeInDown" data-delay="500ms">Welcome To Horizon</h2>
                                <a href="#" class="btn roberto-btn btn-2" data-animation="fadeInDown" data-delay="800ms">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Welcome Area End -->

<!-- About Us Area Start -->
<section class="roberto-about-area section-padding-100-0">
    <!-- Hotel Search Form Area -->
    <div class="hotel-search-form-area">
        <div class="container-fluid">
            <div class="hotel-search-form">
                <form action="#" method="post">
                    <div class="row justify-content-between align-items-end">
                        <div class="col-12 col-md-2 col-lg-3">
                            <label for="checkIn">Check In</label>
                            <input type="date" class="form-control" id="checkInDate" name="checkin-date">
                        </div>
                        <div class="col-12 col-md-2 col-lg-3">
                            <label for="checkOut">Check Out</label>
                            <input type="date" class="form-control" id="checkOutDate" name="checkout-date">
                        </div>
                        <div class="col-6 col-md-1">
                            <label for="adults">Adulst</label>
                            <select name="adults" id="adults" class="form-control">
                                <option value="0">None</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div class="col-6 col-md-2 col-lg-1">
                            <label for="children">Children</label>
                            <select name="children" id="children" class="form-control">
                                <option value="0">None</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="button" id="btnSubmit" class="form-control btn roberto-btn w-100">Check Availability</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-100">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <!-- Section Heading -->
                <div class="section-heading wow fadeInUp" id="sliderText" data-wow-delay="100ms">
                    <h6>About Us</h6>
                    <h2>Welcome to <br>Horizon Hotel Luxury</h2>
                </div>
                <div class="about-us-content mb-100">
                    <h5 class="wow fadeInUp" data-wow-delay="300ms">Welcome to Horizon Hotel Luxury, where exceptional hospitality meets unparalleled comfort. With over 340 hotels worldwide, Horizon Hotel Luxury is proudly part of the NH Hotel Group, renowned for its commitment to excellence in hospitality.</h5>
                    <p class="wow fadeInUp" data-wow-delay="400ms">Manager: <span>Michen Taylor</span></p>
                    <img src="{{asset("assets/img/core-img/signature.png")}}" alt="" class="wow fadeInUp" data-wow-delay="500ms">
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="about-us-thumbnail mb-100 wow fadeInUp" data-wow-delay="700ms">
                    <div class="row no-gutters">
                        <div class="col-6">
                            <div class="single-thumb">
                                <img src="{{asset("assets/img/bg-img/13.jpg")}}" alt="">
                            </div>
                            <div class="single-thumb">
                                <img src="{{asset("assets/img/bg-img/14.jpg")}}" alt="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="single-thumb">
                                <img src="{{asset("assets/img/bg-img/15.jpg")}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Area End -->

<!-- Service Area Start -->
<div class="roberto-service-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="service-content d-flex align-items-center justify-content-between">
                    <!-- Single Service Area -->
                    <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <img src="{{asset("assets/img/core-img/icon-1.png")}}" alt="">
                        <h5>Transportion</h5>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <img src="{{asset("assets/img/core-img/icon-2.png")}}" alt="">
                        <h5>Reiseservice</h5>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <img src="{{asset("assets/img/core-img/icon-3.png")}}" alt="">
                        <h5>Spa Relaxtion</h5>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="700ms">
                        <img src="{{asset("assets/img/core-img/icon-4.png")}}" alt="">
                        <h5>Restaurant</h5>
                    </div>

                    <!-- Single Service Area -->
                    <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="900ms">
                        <img src="{{asset("assets/img/core-img/icon-1.png")}}" alt="">
                        <h5>Bar &amp; Drink</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Area End -->

<!-- Our Room Area Start -->
<section class="roberto-rooms-area">
    <div class="rooms-slides owl-carousel">
        <!-- Single Room Slide -->
        @foreach($rooms as $room)
            <div class="single-room-slide d-flex align-items-center">
                <!-- Thumbnail -->
                <div class="room-thumbnail h-100 bg-img" style="background-image: url('{{ asset("assets/img/rooms/" . $room->main_image_path)}}');"></div>
                <!-- Content -->
                <div class="room-content">
                    <h2 data-animation="fadeInUp" data-delay="100ms">{{$room->name}}</h2>
                    <h3 data-animation="fadeInUp" data-delay="300ms">
                        @foreach($room->price as $p)
                            {{$p->price}}<span>/ Day</span>
                        @endforeach
                    </h3>
                    <ul class="room-feature" data-animation="fadeInUp" data-delay="500ms">
                        <li><span><i class="fa fa-check"></i> Size</span> <span>: {{$room->size}} m<sup>2</sup></span></li>
                        <li><span><i class="fa fa-check"></i> Capacity</span> <span>: Maximum people {{$room->type->capacity}}</span></li>
                        <li><span><i class="fa fa-check"></i> Beds</span>
                            <span>:
                                @foreach($room->beds as $bed)
                                    {{ $bed->name }}
                                    @if(!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </span>
                        </li>
                        <li><span><i class="fa fa-check"></i> Services </span>
                            <span>:
                                @php
                                    $services = $room->services->count();
                                    $limit = min(5, $services);
                                @endphp
                                @foreach($room->services->take($limit) as $service)
                                    {{$service->name}}
                                    @if(!$loop->last && $loop->iteration < $limit)
                                        ,
                                    @endif
                                @endforeach
                                @if($services > 5)
                                    ...
                                @endif
                            </span>
                        </li>
                    </ul>
                    <a href="{{route("room.show",["id" => $room->id])}}" class="btn roberto-btn mt-30" data-animation="fadeInUp" data-delay="700ms">View Details</a>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- Our Room Area End -->
<!-- Testimonials Area Start -->
<section class="roberto-testimonials-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-8 mx-auto">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h6>Testimonials</h6>
                    <h2>Our Guests Love Us</h2>
                </div>
                <!-- Testimonial Slide -->
                <div class="testimonial-slides owl-carousel mb-100">
                    <!-- Single Testimonial Slide -->
                        @foreach($reviews->unique("user_id") as $review)
                            <div class="single-testimonial-slide">
                                <div class="d-flex justify-content-center">
                                    <img src="{{asset("assets/img/users/" . $review->user->profile_image)}}" alt="slika" class="reviewImg">
                                </div>

                                <h5>{{$review->comment}}</h5>
                                <div class="rating-title">
                                    <div class="rating">
                                        @for($i = 0; $i < $review->rating; $i++)
                                                <i class="icon_star"></i>
                                        @endfor
                                    </div>
                                    <h6>{{$review->user->full_name}}</h6>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials Area End -->

<!-- Projects Area Start -->
<section class="roberto-project-area">
    <!-- Projects Slide -->
    <div class="projects-slides owl-carousel">
        <!-- Single Project Slide -->
        <div class="single-project-slide active bg-img" style="background-image: url('{{ asset("assets/img/bg-img/6.jpg")}}');">
            <!-- Project Text -->
            <div class="project-content">
                <div class="text">
                    <h6>Entertaiment</h6>
                    <h5>Racing Bike</h5>
                </div>
            </div>
            <!-- Hover Effects -->
            <div class="hover-effects">
                <div class="text">
                    <h6>Entertaiment</h6>
                    <h5>Racing Bike</h5>
                    <p>I focus a lot on helping the first time or inexperienced traveler head out prepared and confident...</p>
                </div>
                <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Project Slide -->
        <div class="single-project-slide active bg-img" style="background-image: url('{{ asset("assets/img/bg-img/7.jpg")}}');">
            <!-- Project Text -->
            <div class="project-content">
                <div class="text">
                    <h6>Entertaiment</h6>
                    <h5>Racing Bike</h5>
                </div>
            </div>
            <!-- Hover Effects -->
            <div class="hover-effects">
                <div class="text">
                    <h6>Entertaiment</h6>
                    <h5>Racing Bike</h5>
                    <p>I focus a lot on helping the first time or inexperienced traveler head out prepared and confident...</p>
                </div>
                <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Project Slide -->
        <div class="single-project-slide active bg-img" style="background-image: url('{{ asset("assets/img/bg-img/8.jpg")}}');">
            <!-- Project Text -->
            <div class="project-content">
                <div class="text">
                    <h6>Entertaiment</h6>
                    <h5>Racing Bike</h5>
                </div>
            </div>
            <!-- Hover Effects -->
            <div class="hover-effects">
                <div class="text">
                    <h6>Entertaiment</h6>
                    <h5>Racing Bike</h5>
                    <p>I focus a lot on helping the first time or inexperienced traveler head out prepared and confident...</p>
                </div>
                <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Project Slide -->
        <div class="single-project-slide active bg-img" style="background-image: url('{{ asset("assets/img/bg-img/9.jpg")}}');">
            <!-- Project Text -->
            <div class="project-content">
                <div class="text">
                    <h6>Entertaiment</h6>
                    <h5>Racing Bike</h5>
                </div>
            </div>
            <!-- Hover Effects -->
            <div class="hover-effects">
                <div class="text">
                    <h6>Entertaiment</h6>
                    <h5>Racing Bike</h5>
                    <p>I focus a lot on helping the first time or inexperienced traveler head out prepared and confident...</p>
                </div>
                <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>

        <!-- Single Project Slide -->
        <div class="single-project-slide active bg-img" style="background-image: url('{{ asset("assets/img/bg-img/8.jpg")}}');">
            <!-- Project Text -->
            <div class="project-content">
                <div class="text">
                    <h6>Entertaiment</h6>
                    <h5>Racing Bike</h5>
                </div>
            </div>
            <!-- Hover Effects -->
            <div class="hover-effects">
                <div class="text">
                    <h6>Entertaiment</h6>
                    <h5>Racing Bike</h5>
                    <p>I focus a lot on helping the first time or inexperienced traveler head out prepared and confident...</p>
                </div>
                <a href="#" class="btn project-btn">Discover Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- Projects Area End -->
@include("partials.contact-area")

@include("partials.partners")


@endsection
