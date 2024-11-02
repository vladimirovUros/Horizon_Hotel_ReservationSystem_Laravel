@extends("layouts.layout")
@section("description") Hotel Horizon, the most luxuriest hotel in the world @endsection
@section("keywords")  hotel, services @endsection
@section("title") Author @endsection
@section("content")
    <!-- Offcanvas Menu Begin -->

    <!-- Header Section Begin -->

    <div id="authorBlock">
        <div class="container col-xxl-8 px-4 py-5">
            <div class="row flex-lg-row align-items-center justify-content-center g-5 py-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold lh-1 mb-3 heading">Author</h2>
                    <p class="lead uv-p">My name is Uroš Vladimirov. I'm 21 years old and I'm from Belgrade, I'm on my third year at ICT College, Web programming module.</p>
                    <p class="lead">Index number: 45/21</p>
                </div>
                <div class="col-10 col-sm-8 col-lg-6" id="aboutPhoto">
                    <img src="{{asset("assets/img/author/author.jpeg")}}" class="d-block mx-lg-auto img-fluid" id="aboutPhoto" alt="author"/>
                </div>
            </div>
        </div>
    </div>
@endsection
