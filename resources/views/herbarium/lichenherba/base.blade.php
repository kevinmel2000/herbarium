@extends('layouts.app-template')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Lichen Herbarium </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-file-text"></i>
                    Herbarium Management > Lichen Herbarium
                </li>
            </ol>
        </section>
        @yield('action-content')
    </div>
@endsection