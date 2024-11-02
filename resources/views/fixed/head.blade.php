
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield("description")">
    <meta name="keywords" content="@yield('keywords')" />

    <!-- Title -->
    <title>HorizonHotel | @yield("title") </title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset("assets/img/logo/hotel.png")}}">
    <!--Font awsome-->
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Uključite jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Uključite Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
    @if(Request::routeIs("login") || Request::routeIs("register"))
        <link rel="stylesheet" href="{{asset("assets/css/form.css")}}">
    @endif
    @if(Request::routeIs("profile"))
        <link rel="stylesheet" href="{{asset("assets/css/profile.css")}}">
    @endif
    @if(request()->routeIs("admin"))
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    @endif

