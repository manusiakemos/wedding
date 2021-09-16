<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include("themes._meta")
    <meta name="theme-color" content="#a1886c">


    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset("themes/{$invitation->theme->key}/css/app.css")}}?version=1.1">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @stack("style")

    @stack("scriptBefore")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>
<body>

@yield('content')

<script src="{{asset("themes/{$invitation->theme->key}/js/app.js")}}"></script>

<script defer src="{{ asset("themes/{$invitation->theme->key}/libs/fa/js/all.min.js") }}"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
   $(document).ready(function (){
       AOS.init({
           duration: 500
       });
   });
</script>

@stack("script")

</body>
</html>
