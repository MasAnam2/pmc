<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ $title }}</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    @include('layouts.link-rel')
</head>

<body class="theme-red">
    {{-- @include('layouts.page-loader') --}}
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    @include('layouts.topbar')
    <section>
        @include('layouts.leftbar')
        @include('layouts.rightbar')
    </section>

    @yield('content')

    @include('layouts.js')
    
</body>

</html>