@extends('layouts.app-template')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Invasive Alien Species </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-home"></i>
                    Dashboard > Invasive Alien Spacies
                </li>
            </ol>
        </section>
        @yield('action-content')
    </div>
@endsection