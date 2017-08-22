<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('page_title', 'Example') | @yield('title_post', config('app.name'))</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
<body>
<div id="app">
    <section class="hero is-bold topbar">
        <div class="hero-head">
            <nav class="nav">
                <div class="nav-left">
                    <a class="nav-item is-hidden-tablet">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="nav-center">
                    <a href="/" class="nav-item hero-brand">
                        <!-- Some <img /> tag with a logo here, maybe? -->
                        <div class="is-hidden-mobile">
                            <span class="header-title-1">{{ config('layout.header.name1', 'Project') }}</span><strong class="header-title-2">{{ config('layout.header.name2', 'Name') }}</strong>
                        </div>
                    </a>
                </div>
                <div class="nav-right is-flex"></div>
            </nav>
        </div>
    </section>
    <aside class="menu sidebar">
        <p class="menu-label">General</p>
        <ul class="menu-list">
            <li>
                <a href="/">
                        <span class="icon is-small">
                            <i class="fa fa-dashboard"></i>
                        </span>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
    </aside>
    <section class="content">
        @yield('content')
    </section>
</div>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
