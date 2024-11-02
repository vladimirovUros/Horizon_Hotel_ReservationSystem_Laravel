@extends("layouts.layout")
@section("description") Hotel Horizon, the most luxuriest hotel in the world @endsection
@section("keywords")  hotel, services @endsection
@section("title") Contact @endsection
@section("content")
    @include("partials.breadcrumb")
    <!-- Google Maps & Contact Info Area Start -->
    <section class="google-maps-contact-info m-auto">
        <div class="container-fluid">
            <div class="google-maps-contact-content">
                <div class="row">
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <h4>Phone</h4>
                            <p>+01-234-567-890</p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <h4>Address</h4>
                            <p>Land of Sorrow and Hope 345 S.</p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <h4>Open time</h4>
                            <p>10:00 am to 23:00 pm</p>
                        </div>
                    </div>
                    <!-- Single Contact Info -->
                    <div class="col-6 col-lg-3">
                        <div class="single-contact-info">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <h4>Email</h4>
                            <p>hotelhorizon@org.com</p>
                        </div>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d82774.69671830302!2d24.077286625210185!3d56.96328499537209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfb0e5073ded%3A0x400cfcd68f2fe30!2sRiga%2C+Latvia!5e0!3m2!1sen!2sbd!4v1549536732147" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- Google Maps & Contact Info Area End -->
    <!-- Contact Form Area Start -->
    <div class="roberto-contact-form-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h6>Contact Us</h6>
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Form -->
                    <div class="roberto-contact-form">
{{--                        {{dd(session()->get("users"))}}--}}
                            <form  id="contactForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                        <input type="text" name="full_name" id="full_name" class="form-control mb-30" placeholder="Your Full Name">
{{--                                        @if($errors->has("full_name"))--}}
{{--                                            <p class="text-danger">{{$errors->first("full_name")}}</p>--}}
{{--                                        @endif--}}
                                        <p id="contactErrorFullName"></p>
                                    </div>
                                    <div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
                                        <input type="email" name="email" id="email" class="form-control mb-30" placeholder="Your Email">
{{--                                        @if($errors->has("email"))--}}
{{--                                            <p class="text-danger">{{$errors->first("email")}}</p>--}}
{{--                                        @endif--}}
                                        <p id="contactErrorEmail"></p>
                                    </div>
                                    <div class="col-12 wow fadeInUp" data-wow-delay="100ms">
                                        <textarea name="message" id="message" class="form-control mb-30" placeholder="Your Message"></textarea>
{{--                                        @if($errors->has("message"))--}}
{{--                                            <p class="text-danger">{{$errors->first("message")}}</p>--}}
{{--                                        @endif--}}
                                        <p id="contactErrorMessage"></p>
                                    </div>
                                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
                                        <button type="submit" id="sendMesssage" class="btn roberto-btn mt-15">Send Message</button>
                                    </div>
                                </div>
{{--                                @if(session("msgSuccess"))--}}
{{--                                    <p class="text-success">{{session("msgSuccess")}}</p>--}}
{{--                                @endif--}}
                                <p id="contact"></p>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form Area End -->
    @include("partials.contact-area")
    @include("partials.partners")
@endsection

