@extends('auth/layout')
@section('content')
<p class="login-box-msg"></p>

<form url="login" method="post">

    @if(Session::has('success'))
        <h4 style="color: green; ">{{ Session::get('success') }}</h4>
    @endif
    <div class="form-group has-feedback">
        <input type="text" name="email" placeholder="{{ __('Email') }}" class="form-control" id="email" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>

    <div class="form-group has-feedback">
        <input type="password" name="password" placeholder="{{ __('Password') }}" class="form-control" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>

    <div class="row">
        <div class="col-xs-7" style="padding-top:10px;">
            <a href="/forgotpassword">{{ __('I forgot my password') }}</a>
        </div>
        <div class="col-xs-5">
            <button type="submit" class="btn btn-default btn-block">{{ __('Login') }}</button>
        </div>
    </div>

</form>

<script type="text/javascript">
    $(document).ready(function() {
        $("#email").focus();
    });
</script>
@stop
