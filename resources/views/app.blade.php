<!DOCTYPE html>
<html lang="id">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('head')
</head>
<body data-kt-name="metronic" id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
@yield('content')
</body>
@yield('footer')
</html>
