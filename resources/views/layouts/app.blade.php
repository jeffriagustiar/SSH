<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  {{-- Style --}}
  @stack('pre-style')
  @include('includes.style')
  @stack('addon-style')

</head>
<body class="hold-transition login-page">

<!-- /.login-box -->
@yield('content')

{{-- Script --}}
@stack('pre-script')
@include('includes.script')
@stack('addon-script')
</body>
</html>
