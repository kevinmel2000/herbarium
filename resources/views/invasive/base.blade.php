@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <h1><i class="fa fa-file-text-o"></i> Invasive Alien Species Management</h1> 

      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Home</li>
        <li class="active"><i class="fa fa-file-text-o"></i> Invasive Alien Species Management</li>
      </ol>

    </section
    @yield('action-content')
  </div>
@endsection
