<!-- extends oznacza, że ten plik rozszerza plik główny "layout" -->
<!-- jeśli w /views/ jest podfolder /modern/, a tam plik layout.blade.php, to będzie to 'modern.layout' lub 'modern/layout' -->
@extends('layout')

@section('title','Strona logowania')

<!-- rozpoczyna sekcję "content" -->
@section('content')

    @if(!isset($action))
    <h1>sekcja testowa dla strony logowania</h1>
    @endif

    @if(isset($action) && $action == "lostpass")
    <h1>Strona logowania - widok przywracania hasła</h1>
    @endif

<!-- kończy sekcję -->
@endsection