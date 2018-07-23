@extends('layouts.app-template')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Bryovita Herbarium Verified</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-check-square-o"></i>
                    Briovita Herbarium Verified > Verified
                </li>
            </ol>
        </section>
        @yield('action-content')
    </div>
@endsection