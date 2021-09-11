@extends("themes.{$invitation->theme->key}.layout_container")

@section("content")

    @include("themes.{$invitation->theme->key}.includes._preloader")

    @include("themes.{$invitation->theme->key}.includes._cover")

    @include("themes.{$invitation->theme->key}.includes._hello")

    @include("themes.{$invitation->theme->key}.includes._wedding_event")

    @include("themes.{$invitation->theme->key}.includes._direction")

    @include("themes.{$invitation->theme->key}.includes._gallery")

    @include("themes.{$invitation->theme->key}.includes._teaser")

    @include("themes.{$invitation->theme->key}.includes._protocol")

    @include("themes.{$invitation->theme->key}.includes._also_invite")

@endsection

