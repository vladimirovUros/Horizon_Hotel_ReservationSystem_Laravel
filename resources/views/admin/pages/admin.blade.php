<DOCTYPE html>
    <html lang="en">
    @include("fixed.head")
    <body>
    <div id="adminDiv">
        <div id="navAdmin">
            <p id="adminSite">Hotel Horizon</p>
            @csrf
            <a href="{{route("home")}}" id="home">Home</a>
            <ul>
                @php
                    $links = [
                        ["url" => route("admin.activity.index"), "icon" => "fas fa-chart-line", "text" => "Activities"],
                        ["url" => route("admin.rooms.index"), "icon" => "fas fa-hotel", "text" => "Rooms"],
                        ["url" => route("admin.users.index"), "icon" => "fas fa-users", "text" => "Users"],
                        ["url" => route("admin.types.index"), "icon" => "fas fa-tag", "text" => "Types"],
                        ["url" => route("admin.services.index"), "icon" => "fas fa-tv", "text" => "Services"],
                        ["url" => route("admin.beds.index"), "icon" => "fas fa-bed", "text" => "Beds"],
                        ["url" => route("admin.messages.index"), "icon" => "fa fa-envelope", "text" => "Message"],
                        ["url" => route("admin.reservations.index"), "icon" => "fas fa-television", "text" => "Reservations"],
                        ["url" => route("admin.newsletters.index"), "icon" => "fas fa-hashtag", "text" => "Newsletters"],
                        ["url" => route("admin.reviews.index"), "icon" => "fa fa-comments", "text" => "Reviews"],
                        ["url" => route("admin.socials.index"), "icon" => "fas fa-share-alt", "text" => "Socials"],
                        ["url" => route("logout"), "icon" => "fas fa-sign-out-alt", "text" => "Logout"],
                    ];
                @endphp
                @foreach($links as $link)
                    @if(strpos($link['text'], 'all') === false && strpos($link['text'], 'add') === false)
                        <li>
                            <a href="{{$link['url']}}">
                                <i class="{{$link['icon']}}"></i> {{$link['text']}}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div id="mainAdmin">
            @yield('content')
        </div>
    </div>
    @include("fixed.scripts")
    </body>
    </html>
