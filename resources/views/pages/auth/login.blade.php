@extends("layouts.layout")
@section("description") Hotel Horizon, the most luxuriest hotel in the world @endsection
@section("keywords")  hotel, services @endsection
@section("title") Contact @endsection
@section("content")
<section class="gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white radius">
                    <div class="card-body p-5 text-center">
                        <form action="{{ route('login.login') }}" method="POST">
                            @csrf
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password</p>
                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email" value="{{old("email")}}"/>
                                    <label class="form-label" for="email">Email</label>
                                    @error("email")
                                    <div class="alert text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" value="{{old("password")}}"/>
                                    <label class="form-label" for="password">Password</label>
                                    @error('password')
                                    <div class="alert text text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                            </div>
                            @if(session("success"))
                            <div class="alert alert-success">
                                <p>{{session("success")}}</p>
                            </div>
                            @endif
                            @if(session("error"))
                            <div class="alert alert-danger">
                                <p>{{session("error")}}</p>
                            </div>
                            @endif
                        </form>
                        <div>
                            <p class="mb-0">Don't have an account? <a href="{{route("register")}}" class="reg">Register now</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
