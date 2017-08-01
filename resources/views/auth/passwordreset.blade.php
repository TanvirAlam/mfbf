@extends('login/layout')
@section('content')
<form action="/forgotpassword/{{ $token }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="user_id" value="{{ $user_id }}">
    @if(Session::has('error'))
    <h4 style="color: red; ">{{ Session::get('error') }}</h4>
    @endif
    <div class="form-group">
        <label for="reset_password">{{ __('Password') }}</label>
        <input type="password" name="password" class="form-control" id="reset_password" placeholder="{{ __('Password') }}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group">
        <label for="reset_password">{{ __('Confirmation') }}</label>
        <input type="password" name="password_confirmation" class="form-control" id="reset_password_r" placeholder="{{ __('Password') }}">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <input class="btn btn-primary btn-block" type="submit" value="{{ __('Reset password') }}">
    </div>
</form>
<p><a href="/" style="color:{{ Config::get('app.color') }};">{{ __('Go to login') }}</a></p>
@stop
