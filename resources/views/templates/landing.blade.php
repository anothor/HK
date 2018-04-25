<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="robots" content="@yield('robots')">
    @include('partials.head')
</head>

<body>
    <div class="wrapper">
      @yield('header')
      <div class="main">
        @yield('content')
      </div>
    </div>
</body>
@include('partials.scripts')
</html>
