@extends('admin.core.master')

@section('content')

    <!-- Navbar -->
    @include('admin.layouts.nav')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.layouts.sidebar')
    <!-- /.Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    @include('admin.layouts.content')
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    @include('admin.layouts.controlbar')
    <!-- /.control-sidebar -->

    <!-- Admin Footer -->
    @include('admin.layouts.footer')

@endsection
