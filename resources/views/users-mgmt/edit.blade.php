@extends('users-mgmt.base')

@section('action-content')
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <div class="col-md-8">
                    <div class="container">
                        <div class="row"> 
                            <div class="col-md-17 col-md-offset-1">
                                <div class="box-title">
                                    <h4>Update user</h4>
                                </div>
                                    <div class="box">
                                        <form class="form-horizontal" role="form" method="POST" action="{{ route('user-management.update', ['id' => $user->id]) }}" style="margin-top:10px">
                                            <input type="hidden" name="_method" value="PATCH">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        
                                            <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
                                                <label for="user_type" class="col-md-2 col-md-offset-1">User Type</label>

                                                <div class="col-md-6">
                                                    <select id="user_type" type="text" class="form-control" name="user_type"required>
                                                        @if ($user->user_type == '0')
                                                           <option> Admin</option>
                                                        @elseif ($user->user_type == '1' or $user->user_type == '2')
                                                            <option value="{{$user->user_type}}">                     
                                                                @if($user->user_type == '0')
                                                                    <h5> Admin</h5>
                                                                @elseif($user->user_type == '1')
                                                                    <h5> Operator </h5>
                                                                @elseif($user->user_type == '2')
                                                                    <h5> Verifikator </h5>
                                                                @endif
                                                            </option>
                                                            <option value="{{$user->user_type = 1}}">Operator</option>
                                                            <option value="{{$user->user_type = 2}}">Verifikator</option>
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('user_type'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('user_type') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                                <label for="username" class="col-md-2 col-md-offset-1">Username</label>

                                                <div class="col-md-6">
                                                    <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" required autofocus>

                                                    @if ($errors->has('username'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('username') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        
                                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                                <label for="firstname" class="col-md-2 col-md-offset-1">First Name</label>

                                                <div class="col-md-6">
                                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $user->firstname }}" required>

                                                    @if ($errors->has('firstname'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('firstname') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        
                                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                                <label for="lastname" class="col-md-2 col-md-offset-1">Last Name</label>

                                                <div class="col-md-6">
                                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" >

                                                    @if ($errors->has('lastname'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('lastname') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-2 col-md-offset-1">New Password</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="password">

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
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <br><br><br>
                                                <div class="col-md-12 col-md-offset-8 text-right">
                                                    <button type="button" class="btn btn-secondary col-md-2"  onclick="window.location='{{ url("user-management") }}'" >Cancel</button>
                                                    <button type="submit" class="btn btn-primary col-md-2" style="margin-left:5px">Update</button>
                                                    
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
