@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> <i class="fa fa-user" aria-hidden="true"></i><t>Biotrop Management</t></h1>


      <ol class="breadcrumb">
        <!-- li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li-->
        <li class="active">
          <i class="fa fa-link"></i>
          Biotrop Management
        </li>
      </ol>
    </section>
    @yield('action-content')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-14">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-14">
                                    <div class="box-title">
                                        <h4>Update Picture Biotrop</h4>
                                    </div>
                                    <div class="box">
                                        <form enctype="multipart/form-data" class="form-horizontal" role="form"   method="POST" action="{{ route('biotrop-management.picture') }}" style="margin-top:10px">
                                            {{ csrf_field() }}

                                            <div class="form-group" >
                                                <label for="picture" class="col-md-3 col-md-offset-1" style="text-align:left">Image Biotrop 1 to Update</label>
                                                <div class="col-md-7 col-md-offset-4">
                                                    <div class="col-md-6">
                                                        <input type="file" name="image" id="inputgambar" accept="image/*" value=""/>
                                                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                        <img src="http://placehold.it/200x200" id="showgambar" style="width: 100%;height:100%;float:left;"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <br><br><br>
                                                <div class="col-md-12 col-md-offset-8 text-right">
                                                    <button type="submit" class="btn btn-primary col-md-2" style="margin-left:10px">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form enctype="multipart/form-data" class="form-horizontal" role="form"   method="POST" action="{{ route('biotrop-management.picture') }}" style="margin-top:10px">
                                            {{ csrf_field() }}

                                            <div class="form-group" >
                                                <label for="picture" class="col-md-3 col-md-offset-1" style="text-align:left">Image Biotrop 1 to Update</label>
                                                <div class="col-md-7 col-md-offset-4">
                                                    <div class="col-md-6">
                                                        <input type="file" name="image2" id="inputgambar" accept="image/*" value=""/>
                                                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                        <img src="http://placehold.it/200x200" id="showgambar" style="width: 100%;height:100%;float:left;"/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <br><br><br>
                                                <div class="col-md-12 col-md-offset-8 text-right">
                                                    <button type="submit" class="btn btn-primary col-md-2" style="margin-left:10px">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form enctype="multipart/form-data" class="form-horizontal" role="form"   method="POST" action="{{ route('biotrop-management.picture') }}" style="margin-top:10px">
                                            {{ csrf_field() }}

                                            <div class="form-group" >
                                                <label for="picture" class="col-md-3 col-md-offset-1" style="text-align:left">Image Biotrop 1 to Update</label>
                                                <div class="col-md-7 col-md-offset-4">
                                                    <div class="col-md-6">
                                                        <input type="file" name="image3" id="inputgambar" accept="image/*" value=""/>
                                                        <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                                        <img src="http://placehold.it/200x200" id="showgambar" style="width: 100%;height:100%;float:left;"/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <br><br><br>
                                                <div class="col-md-12 col-md-offset-8 text-right">
                                                    <button type="submit" class="btn btn-primary col-md-2" style="margin-left:10px">Update</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </div>
@endsection

