<!DOCTYPE html>
<html lang="en">
<head>
    @include("fixed.head")
    @yield("token")
</head>

<body>
    <!-- Page Preloder -->
    @include("fixed.preloader")

    <!-- Header Section Begin -->
    @include('fixed.header')
    <!-- Header End -->

    @yield("content")

    @include("fixed.footer")

    @include("fixed.scripts")
</body>
</html>
