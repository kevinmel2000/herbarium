@extends('profile-base')
@section('action-content')
<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-sm-8">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-17 col-md-offset-1">
                                <div class="box-title"> 
                                    <h4>Edit Profile</h4> 
                                </div>
                                    <div class="box">
                                        <form class="form-horizontal" role="form" method="POST" action="[{Auth::user{}->username}]">
                                            <input type="hidden" name="_method" value="PATCH">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                           
                                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}" style="margin-top: 10px">
                                                <label for="username" class="col-md-2 col-md-offset-1">Username</label>

                                                <div class="col-md-6">
                                                    <input id="username" type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" required autofocus>

                                                    @if ($errors->has('username'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('username') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-2 col-md-offset-1">Email</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-2 col-md-offset-1">Current Password</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-2 col-md-offset-1">New Password</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label for="password-confirm" class="col-md-2 col-md-offset-1">Confirm Password</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <br><br><br>
                                                <div class="col-md-12 col-md-offset-8 text-right">
                                                    <button type="button" onclick="window.location='{{url("")}}'" class="btn btn-secondary col-md-2">Cancel</button>
                                                    <button type="submit" class="btn btn-primary col-md-2"  style="margin-left:5px">Update</button>
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

@endsection
