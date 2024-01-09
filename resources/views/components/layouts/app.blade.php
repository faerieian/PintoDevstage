<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="{{ asset('css/style_dashboard.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style_useraddress.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style_userinfo.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style_createuser.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style_health.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style_recipes.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style_edituser.css') }}" rel="stylesheet">


        <meta charset="utf-8">
        <meta name="viewport" content="width=1600"/>
        <title>{{ $title ?? 'Pintoplus' }}</title>

    </head>
    <body>
        <header>
            <!-- header content here -->
            <livewire:header />
        </header>
        <div class="dashboard">

            @livewire('sidebar')

            <div class="main-content">
                <!-- Dynamic content will be injected here -->
                {{ $slot }}
            </div>
        </div>

    </body>
</html>
