@extends("layouts.layout")
@section("description")
    Hotel Horizon, the most luxuriest hotel in the world
@endsection
@section("keywords")
    hotel, services, room, single room, room details
@endsection
@section("title")
    Single-Room
@endsection
@section("content")
    <div class="breadcrumb-area bg-img bg-overlay jarallax"
         style="background-image: url('{{ asset('assets/img/bg-img/16.jpg') }}');">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcrumb-content d-flex align-items-center justify-content-between pb-5">
                        <h2 class="room-title">{{$room->name}}</h2>
                        {{--                        {{dd($rooms->price)}}--}}
                        <h2 class="room-price">
                            @foreach($room->price as $p)
                                {{$p->price}}<span>/ Per Night</span>
                            @endforeach
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Single Room Details Area -->
                    <div class="single-room-details-area mb-50">
                        <!-- Room Thumbnail Slides -->
                        <div class="room-thumbnail-slides mb-50">
                            <div id="room-thumbnail--slide" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($room->images as $p)
                                        @if($loop->index == 0)
                                            <div class="carousel-item active">
                                                <img src="{{asset("assets/img/rooms/" .$p->path)}}"
                                                     class="d-block w-100" alt="{{$p->path}}">
                                            </div>
                                        @else
                                            <div class="carousel-item">
                                                <img src="{{asset("assets/img/rooms/" .$p->path)}}"
                                                     class="d-block w-100" alt="{{$p->path}}">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <ol class="carousel-indicators">
                                    @foreach($room->images as $p)
                                        @if($loop->index == 0)
                                            <li data-target="#room-thumbnail--slide" data-slide-to="{{$loop->index}}"
                                                class="active">
                                                <img src="{{asset("assets/img/rooms/" . $p->path)}}"
                                                     class="d-block w-100" alt="{{$p->path}}">
                                            </li>
                                        @else
                                            <li data-target="#room-thumbnail--slide" data-slide-to="{{$loop->index}}">
                                                <img src="{{asset("assets/img/rooms/" . $p->path)}}"
                                                     class="d-block w-100" alt="{{$p->path}}">
                                            </li>
                                        @endif
                                    @endforeach
                                </ol>
                            </div>
                        </div>

                        <!-- Room Features -->
                        <div class="room-features-area d-flex flex-wrap mb-50">
                            <h6>Size: <span>{{$room->size}} m<sup>2</sup></span></h6>
                            <h6>Capacity:<span>Maxium people {{$room->type->capacity}}</span></h6>
                            <h6>Beds:
                                <span>
                                    @foreach($room->beds as $bed)
                                            <?php
                                            $array = $bed->pivot->where("room_id", $room->id)->pluck("quantity");
                                            $indeks = $loop->index;
                                            ?>
                                        {{$array[$indeks]}}
                                        {{ $bed->name }}
                                        @if(!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </span>
                            </h6>
                            <h6>Services:
                                <span>
                                    @for($i = 0; $i < 2; $i++)
                                        {{$room->services[$i]->name}}
                                        @if($i == 0)
                                            ,
                                        @elseif($i == 1)
                                            ...
                                        @endif
                                    @endfor
                                </span>
                            </h6>
                        </div>
                        <p>{{$room->description}}</p>
                    </div>
                    <!-- Room Service -->
                    <div class="room-service mb-50">
                        <h4>Room Services</h4>
                        <ul>
                            @foreach($room->services as $service)
                                <li><img src="{{asset("assets/img/services/" . $service->path)}}"
                                         alt="">{{$service->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Room Review -->
                    <div class="room-review-area mb-100">
                        <h4>Room Review</h4>
{{--                        <div class="d-flex">--}}
{{--                        <p>Average rating based on out customers reviews: </p>--}}
{{--                        <div class="average-rating-stars ml-3">--}}
{{--                            @for($i = 0; $i < 5; $i++)--}}
{{--                                @if($i < $averageRating)--}}
{{--                                    <i class="fa fa-star zvezdica"></i>--}}
{{--                                @else--}}
{{--                                    <i class="fa fa-star praznaZvezdica"></i>--}}
{{--                                @endif--}}
{{--                            @endfor--}}
{{--                               <span>({{number_format($averageRating, 1)}})</span>--}}
{{--                        </div>--}}
{{--                        </div>--}}
                        <div id="allReviews">
                            @if($reviews->count() == 0)
                                <p id="noComment" class="font-weight-bold">No reviews yet</p>
                            @else
                                @foreach($reviews as $review)
                                    <div class="single-room-review-area d-flex align-items-center">
                                        <div class="reviwer-thumbnail">
                                            <img src="{{asset("assets/img/users/" . $review->user->profile_image)}}" alt="user">
                                        </div>
                                        <div class="reviwer-content">
                                            <div
                                                class="reviwer-title-rating d-flex align-items-center justify-content-between">
                                                <div class="reviwer-title">
                                                    <span>{{$review->created_at->format("d M Y")}}</span>
                                                    <h6>{{$review->user->username}}</h6>
                                                </div>
                                                <div class="reviwer-rating {{strlen($review->comment) < 50 ? 'short-comment' : ""}}">
                                                    @for($i = 0; $i < 5; $i++)
                                                        @if($i < $review->rating)
                                                            <i class="fa fa-star"></i>
                                                        @else
                                                            <i class="fa fa-star praznaZvezdica"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                            <p>{{$review->comment}}</p>
                                            @if(session('users') && session('users')->id == $review->user_id)
                                                <div class="edit-delete-icons">
                                                    <a class="editComment" data-id="{{$review->id}}"><i class="fa fa-edit edit-icon"></i></a>
                                                    <a class="deleteComment" data-id="{{$review->id}}"><i class="fa fa-trash delete-icon"></i></a>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="container room_details_comment mt-5">
                            <h4 class="text-center">Leave a comment and rating</h4>
                            @if(session()->has("users"))
                                <div class="col-lg-12 col-md-12 rating mb-5">
                                    <i class="fa fa-star  praznaZvezdica single-pr-zvezdica" data-rating="1"></i>
                                    <i class="fa fa-star  praznaZvezdica single-pr-zvezdica" data-rating="2"></i>
                                    <i class="fa fa-star  praznaZvezdica single-pr-zvezdica" data-rating="3"></i>
                                    <i class="fa fa-star  praznaZvezdica single-pr-zvezdica" data-rating="4"></i>
                                    <i class="fa fa-star  praznaZvezdica single-pr-zvezdica" data-rating="5"></i>
                                </div>
                                <form action="#" id="commentForm">
                                    @section("token")
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                    @endsection
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <textarea name="comment" id="comment" class="textAreaInput"
                                                      placeholder="Comment"></textarea>
                                            <p class="commError">

                                            </p>
                                            <button data-room-id="{{$room->id}}" type="submit" id="postComment"
                                                    class="btn roberto-btn mt-15">Post
                                                comment
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <p class="text-center text-danger font-weight-bold">You must be logged in to leave a
                                    comment</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <!-- Hotel Reservation Area -->
                    <div class="hotel-reservation--area mb-100">
                        <form id="avaliabilityForm">
                            <input type="hidden" id="roomId" value="{{$room->id}}">
                            <div class="form-group mb-30">
                                <div class="form-group mb-30">
                                    <div id="dates"/>
                                    <div class="row no-gutters">
                                        <div class="col-6">
                                            <label for="checkInDate">Check In</label>
                                            <input type="date" class="input-small form-control" id="checkInDate"/>
                                            <p id="checkInError"></p>
                                        </div>
                                        <div class="col-6">
                                            <label for="checkOutDate">Check Out</label>
                                            <input type="date" class="input-small form-control" id="checkOutDate"/>
                                            <p id="checkOutError"></p>
                                        </div>
                                        <p id="datesSuccess" class="text-success"></p>
                                        <p id="notice"></p>
                                        <p id="msgError"></p>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="roomId" value="{{$room->id}}">
                            <div class="form-group">
                                <button type="button"  id="checkAvailability" class="btn roberto-btn w-100">Check Availability</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="closeModal" data-bs-dismiss="modal">Cancel Reservation</button>
                </div>
            </div>
        </div>
    </div>
    @include("partials.contact-area")
    @include("partials.partners")
@endsection
