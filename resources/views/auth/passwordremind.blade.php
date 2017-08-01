@extends('login/layout')
@section('content')
<p class="login-box-msg"></p>
<form action="/forgotpassword" method="post">
    @if(Session::has('success'))
        <h4 style="color: green; ">{{ Session::get('success') }}</h4>
    @endif
    @if(Session::has('error'))
        <h4 style="color: red; ">{{ Session::get('error') }}</h4>
    @endif
    <div style="color:red;">
        {{ __($errors->first('email')) }}
        {{ __($errors->first('password')) }}
    </div>
    <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control input-lg" placeholder="{{ __('Enter email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-12 pull-right">
            <input class="btn btn-primary btn-block" type="submit" value="{{ __('Send password reset mail') }}">
        </div>
    </div>
</form>
<p><a href="/">{{ __('Go to login page') }}</a></p>
@stop
