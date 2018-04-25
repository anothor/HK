<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @include('partials.head')
</head>
<body>
        <div class="page-header" filter-color="black">
            <div class="page-header-image" style="background-image:url({{ asset('img/bg2.jpg') }})"></div>
            <div class="content-center">
              @yield('content')
            </div>
        </div>
</body>
@include('partials.scripts')
</html>
