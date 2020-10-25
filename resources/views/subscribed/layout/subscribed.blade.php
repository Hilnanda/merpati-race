<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('image/favicon.ico') }}">


    @stack('top-style')
    @include('subscribed.includes.style')
    @stack('bottom-style')
    <!-- Core Stylesheet -->

</head>

<body>
    <!-- ##### Preloader ##### -->
    @include('subscribed.includes.header')
    <!-- ##### Header Area End ##### -->

    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    @include('subscribed.includes.footer')
    <!-- ##### Footer Area Start ##### -->

    @stack('top-script')
    @include('subscribed.includes.script')
    @stack('bottom-script')
</body>

</html>
