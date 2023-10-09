<!DOCTYPE html>
<html lang="zxx">
<!-- css -->
@include('client.layouts.divide.head')

<body>
<!-- Menu -->
@include('client.layouts.divide.menu')
<!-- Begin Page Content -->
@yield('content')
<!-- Footer -->
@include('client.layouts.divide.footer')
<!-- jQuery -->
@include('client.layouts.divide.js')

@yield('js')
</body>
</html>
