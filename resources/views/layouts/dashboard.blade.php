<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  @stack('pre-style')
  @include('includes.style')
  @stack('addon-style')

</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-footer-fixed">
  @include('includes.topbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('includes.navbar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('includes.footer')
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@stack('pre-script')
@include('includes.script')
@stack('addon-script')

</body>
</html>
