@extends('layouts.layout')
@section("description")
    Hotel Horizon, the most luxuriest hotel in the world
@endsection
@section("keywords")
    hotel, services
@endsection
@section("title")
    Room
@endsection
@section('content')
    <div class="container">
        <div class="main-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route("home")}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Your Profile</li>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="text text-info">Hello!</p>
                            <h4 class="text-center" id="accFullName">{{$user->full_name}}</h4>
                            <div class="d-flex flex-column align-items-center text-center">
                                @if($user->profile_image)
                                    <img src="{{asset("assets/img/users/" . $user->profile_image)}}" alt="profile_image"
                                         class="rounded-circle" width="150">
                                @else
                                    <img src="{{asset("assets/img/users/default.jpg")}}" alt="profile_image"
                                         class="rounded-circle" width="150">
                                @endif
                                <div class="mt-3">
                                    <h4 id="accUserName">{{$user->username}}</h4>
                                </div>
                                <form action="{{route("profilePicture")}}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12 text-secondary text-center">
                                            <input type="file" name="profile_image" id="profile_image" class="chsPic">
                                            <p id="errorEditPicture"></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary" type="submit">Upload Picture</button>
                                        </div>
                                    </div>
                                    @if(session('success'))
                                        <div class="text-success font-weight-bold">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if(session('error'))
                                        <div class="text-danger font-weight-bold">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            @section('token')
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                            @endsection
                            <form id="updateProfileForm">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="username_fullname" id="username_fullname"
                                               value="{{$user->full_name}}" size="25">
                                        <p id="errorEditFullName"></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="email_user" id="email_user" size="25"
                                               value="{{$user->email}}">
                                        <p id="errorEditEmail"></p>

                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">User Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" name="username_user" id="username_user"
                                               value="{{$user->username}}" size="25">
                                        <p id="errorEditUserName"></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="password" name="username_password" id="username_password" placeholder="New Password" size="25" value="">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fa fa-eye-slash " aria-hidden="true"></i>
                                        </button>
                                        <p id="errorEditPassword"></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary" id="editUser" type="button">Edit</button>
                                    </div>
                                </div>
                                <p id="successEdit"></p>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Reservation History</h5>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Room</th>
                                        <th class="width">Check-in</th>
                                        <th class="width">Check-out</th>
                                        <th>Price</th>
                                        <th>Date Reserved</th>
                                        <th>No. of People</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($user->reservation as $reservation)
                                        <tr>
                                            <td>{{ $reservation->room->name }}</td>
                                            <td>{{ $reservation->check_in }}</td>
                                            <td>{{ $reservation->check_out }}</td>
                                            <td>${{ $reservation->price }}</td>
                                            <td>{{ $reservation->created_at }}</td>
                                            <td>{{ $reservation->no_of_people }}</td>
                                            <td>
                                                    @if(\Carbon\Carbon::parse($reservation->check_in)->subDays(1)->gte(\Carbon\Carbon::now()))
                                                        <form action="{{ route('reservations.destroy', ['id' => $reservation->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Cancel</button>
                                                        </form>
                                                    @else
                                                    <span class="text-danger">Cannot cancel
                                                    <span data-toggle="tooltip" data-placement="bottom"
                                                          title="You cannot delete this reservation because it starts tomorrow.Read again out police">
                                                        <i class="fas fa-info-circle infoIcon"></i>
                                                         </span>
                                                    </span>
                                                @endif
                                            </td>
{{--                                            <td>--}}
{{--                                                <a href="{{ route('reservations.edit', ['id' => $reservations->id]) }}" class="btn btn-primary">Show</a>--}}
{{--                                            </td>--}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No reservations found.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if(session('reservation_cancel_success'))
                            <div class="alert alert-success">
                                {{ session('reservation_cancel_success') }}
                            </div>
                        @endif
                        @if(session('reservation_error'))
                            <div class="alert alert-danger">
                                {{ session('reservation_error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
