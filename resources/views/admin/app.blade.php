<!DOCTYPE html>
<html>
<head>
 @include('admin.layouts.meta')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin.layouts.header')

    @include('admin.layouts.menu')
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  {{-- Footer --}}
  @include('admin.layouts.footer')

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('admin.layouts.script')

</body>
</html>
