<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel='stylesheet' href='{{ asset('vendor/uicons/css/uicons-regular-rounded.css') }}'>
    @livewireStyles
    @stack("styles")
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    @stack("scriptsBefore")
</head>
<body class="bg-gray-50 dark:bg-gray-800 dark:text-gray-400 text-gray-100 flex text-sm">

<x-admin.sidebar></x-admin.sidebar>

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <x-admin.navbar></x-admin.navbar>
    <x-admin.header></x-admin.header>

    <div class="w-full overflow-x-hidden flex flex-col">
        @yield('content')

        <footer class="flex justify-end">
                <span class="font-normal text-sm my-5 mx-5 dark:text-gray-400">
                    <i class="fa fa-copyright"></i> {{date('Y')}} {{config('app.name')}}
                </span>
        </footer>
    </div>
</div>

@livewireScripts
@stack("scripts")
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
</body>
</html>
