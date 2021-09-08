<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="min-h-screen min-w-full dark:bg-gray-800 bg-gray-200 flex justify-center items-center relative">
        <nav class="absolute top-0 right-0">
            <div class="container p-5">
                <a href="{{url('/login')}}" class="text-gray-700 dark:text-gray-300 font-bold">LOGIN</a>
            </div>
        </nav>
        <div>
            <h1 class="text-red-500 lg:text-8xl text-6xl font-bold">{{config('app.name')}}</h1>
        </div>
    </div>
</body>
</html>
