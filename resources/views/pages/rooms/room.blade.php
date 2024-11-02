@extends("layouts.layout")
@section("description")
    Hotel Horizon, the most luxuriest hotel in the world
@endsection
@section("keywords")
    hotel, services, rooms, beds, services, capacity, price, size, room type
@endsection
@section("title")
    Room
@endsection
@section("content")
    <!-- Breadcrumb Area Start -->
    @include("partials.breadcrumb")
    <!-- Breadcrumb Area End -->
    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8" id="roomContainer">
                    @foreach($rooms as $room)
                        <!-- Single Room Area -->
                        <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp"
                             data-wow-delay="100ms">
                            <!-- Room Thumbnail -->
                            <div class="room-thumbnail">
                                <img src="{{asset('assets/img/rooms/' . $room->main_image_path)}}"
                                     alt="{{$room->name}}">
                            </div>
                            <!-- Room Content -->
                            <div class="room-content">
                                <h2> {{$room->name}}</h2>
                                <h4 class="font-weight-bold">{{ $room->price()->first()->price }}$ <span
                                        class="font-weight-bold">/ Day</span></h4>
                                <div class="room-feature">
                                    <h6 class="font-weight-bold">Size: <span>{{$room->size}} m<sup>2</sup> </span></h6>
                                    <h6 class="font-weight-bold">Capacity:
                                        <span>Max people: {{$room->type->capacity}}</span></h6>
                                    <h6 class="font-weight-bold">Beds:
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
                                    <h6 class="font-weight-bold">Services: <span>
                                            @php
                                                $servicesRoom = $room->services->shuffle()->take(3);
                                            @endphp
                                            @foreach($servicesRoom as $service)
                                                {{$service->name}}
                                                @if(!$loop->last)
                                                    ,
                                                @endif
                                                @if($loop->last)
                                                    ...
                                                @endif
                                            @endforeach
                                        </span></h6>
                                </div>
                                <a href="{{route("room.show", ["id" => $room->id])}}" class="btn view-detail-btn">View
                                    Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    @endforeach
                    <!-- Single Room Area -->
                    <!-- Pagination -->
                    <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="300ms">
                        <ul class="pagination">
                            @for($i = 0; $i < $countRooms/6; $i++)
                                @if($i == 0)
                                    <li class="page-item active"><span class="page-link">{{$i + 1}}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link page-rooms" href="">{{$i + 1}}</a></li>
                                @endif
                            @endfor
                        </ul>
                    </nav>
                </div>
                <div class="col-12 col-lg-4">
                    <!-- Hotel Reservation Area -->
                    <div class="hotel-reservation--area mb-100">
                        <form>
                            <div class="form-group mb-30">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <input type="text" class="input-small form-control" id="keyword"
                                                   name="keyword" placeholder="Search room">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-30">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-check-label peopleLabel" for="adults">Sort by:</label>
                                        <select name="sort" id="sort" class="form-control">
                                            <option value="0" selected disabled>Default</option>
                                            <option value="name-asc">Name ASC</option>
                                            <option value="name-desc">Name DESC</option>
                                            <option value="price-asc">Price ASC</option>
                                            <option value="price-desc">Price DESC</option>
                                            <option value="popular">Most popular</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-30">
                                <label for="checkInDate" class="mt-15">Date</label>
                                <div id="dates"/>
                                <div class="row no-gutters">
                                    <div class="col-6">
                                        <input type="date" class="input-small form-control" id="checkInDate"/>
                                    </div>
                                    <div class="col-6">
                                        <input type="date" class="input-small form-control" id="checkOutDate"/>
                                    </div>
                                    <p id="datesError" class="text-danger"></p>
                                </div>
                            </div>
                    </div>
                    <div class="form-group mb-30">
                        <label for="guests">Guests</label>
                        <div class="row">
                            <div class="col-6">
                                <label class="form-check-label peopleLabel" for="adults">Adults</label>
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
                            <div class="col-6">
                                <label class="peopleLabel" for="children ">Children</label>
                                <select name="children" id="children" class="form-control">
                                    <option value="0">None</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-50">
                        <label for="roomType">Room Type</label>
                        <select name="roomType" id="roomType" class="form-control inherit">
                            <option value="0">All</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-50">
                        <label for="services">Services</label>
                        <div class="checkbox-group row d-flex flex-wrap">
                            @foreach($services as $service)
                                <div class="form-check col-lg-6 col-md-6 col-sm-12">
                                    <input class="form-check-input" type="checkbox" id="service-{{$service->id}}"
                                           name="services" value="{{$service->id}}">
                                    <label class="form-check-label" for="service-{{$service->id}}">{{$service->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group mb-50">
                        <label for="beds">Beds</label>
                        <div class="checkbox-group row d-flex flex-wrap">
                            @foreach($beds as $bed)
                                <div class="form-check col-lg-6 col-md-6 col-sm-12">
                                    <input class="form-check-input" type="checkbox" id="bed-{{$bed->id}}"
                                           name="beds" value="{{$bed->id}}">
                                    <label class="form-check-label" for="bed-{{$bed->id}}">{{$bed->name}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group mb-50">
                        <div class="form-group mt-30">
                            <button type="button" id="filterButton" name="filterButton" value="Search"
                                    class="btn roberto-btn w-100">Check Available
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms Area End -->
    <!-- Call To Action Area Start -->
    @include("partials.contact-area")
    <!-- Partner Area Start -->
    @include("partials.partners")
    <!-- Partner Area End -->
@endsection
