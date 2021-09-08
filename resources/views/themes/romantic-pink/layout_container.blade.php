<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="countdown-until" content="{{$meta['reception']['date']}} {{$meta['reception']['start']}}">

   @include("themes._meta")

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset("themes/{$invitation->theme->key}/css/app.css")}}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.8.1/simple-lightbox.css">
    @stack("style")
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>

@yield('content')

<script src="{{asset("themes/{$invitation->theme->key}/js/app.js")}}"></script>

<script defer src="{{ asset("themes/{$invitation->theme->key}/libs/fa/js/all.min.js") }}"></script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 500
    });
</script>

@stack("script")

</body>
</html>
