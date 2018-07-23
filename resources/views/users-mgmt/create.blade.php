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
                                    <h4>Add New User</h4>
                                </div>
                                <div class="box">
                                    <form class="form-horizontal" role="form"   method="POST" action="{{ route('user-management.store') }}" style="margin-top:10px">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
                                            <label for="user_type" class="col-md-2 col-md-offset-1" style="text-align= left">User Type</label>

                                            <div class="col-md-6">
                                                <select id="user_type" type="user_type" class="form-control" name="user_type" required>
                                                    <option>-- Select --</option>
                                                    <option value="1">Operator</option>
                                                    <option value="2">Verifikator</option>>
                                                </select>
                                                @if ($errors->has('user_type'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('user_type') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label for="username" class="col-md-2 col-md-offset-1" style="text-align= left">User Name</label>

                                            <div class="col-md-6">
                                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                                @if ($errors->has('username'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('username') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-2 col-md-offset-1" style="text-align= left">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                            <label for="firstname" class="col-md-2 col-md-offset-1" style="text-align= left">First Name</label>

                                            <div class="col-md-6">
                                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required>

                                                @if ($errors->has('firstname'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('firstname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                            <label for="lastname" class="col-md-2 col-md-offset-1" style="text-align= left">Last Name</label>

                                            <div class="col-md-6">
                                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required>

                                                @if ($errors->has('lastname'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('lastname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-2 col-md-offset-1" style="text-align= left">Password</label>

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
                                            <label for="password-confirm" class="col-md-2 col-md-offset-1" style="text-align= left">Confirm Password</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <br><br><br>
                                            <div class="col-md-12 col-md-offset-8 text-right">
                                                <button type="button" class="btn btn-secondary col-md-2" onclick="window.location='{{ url("user-management") }}'" >Cancel</button>
                                                <button type="submit" class="btn btn-primary col-md-2" style="margin-left:10px">Create</button>
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
