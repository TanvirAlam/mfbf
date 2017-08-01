<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('page_title', 'Example') | @yield('title_post', config('app.name'))</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
dy class="login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="/">
            <img src="/mfbf/images/logo-full.png" style="width:300px;margin-bottom:10px;" />
        </a>
    </div>
    <div class="login-box-body">
        @yield('content')
    </div>
</div>
</body>
</html>