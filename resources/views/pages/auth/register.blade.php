@extends("layouts.layout")
@section("description") Hotel Horizon, the most luxuriest hotel in the world @endsection
@section("keywords")  hotel, services @endsection
@section("title") Contact @endsection
@section("content")
<section class="gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase login-h2">CREATE ACCOUNT</h2>}
                            <form action="{{route("register.register")}}" method="POST">
                                @csrf
                            <div class="form-outline form-white mb-4">
                                <input type="text" id="fullName" name="fullname" class="form-control form-control-lg" placeholder="Your Full Name" value="{{old("fullname")}}"/>
                                <label class="form-label" for="fullName">FullName</label>
                                @error('fullname')
                                <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline form-white mb-4">
                                <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Username" value="{{old("username")}}"/>
                                <label class="form-label" for="username">Username</label>
                                @error('username')
                                <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Your Email" value="{{old("email")}}"/>
                                <label class="form-label" for="email">Email</label>
                                @error('email')
                                <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline form-white mb-4">
                                <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" value="{{old("password")}}"/>
                                <label class="form-label" for="password">Password</label>
                                @error('password')
                                <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-outline form-white mb-4">
                                <input type="password" id="passwordRepeat" name="passwordRepeat" class="form-control form-control-lg" placeholder="Repeat your password" value="{{old("passwordRepeat")}}"/>
                                <label class="form-label" for="passwordRepeat">Repeat your password</label>
                                @error('passwordRepeat')
                                <div class="alert text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                            </form>
                        <div>
                            <p class="mb-0 acc m">Have already an account ? <a href="{{route("login")}}" class="sign">Login </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
