<!-- extends oznacza, że ten plik rozszerza plik główny "layout" -->
<!-- jeśli w /views/ jest podfolder /modern/, a tam plik layout.blade.php, to będzie to 'modern.layout' lub 'modern/layout' -->
@extends('layout')

@section('title','Strona logowania')

<!-- rozpoczyna sekcję "content" -->
@section('content')

    <h1>sekcja testowa dla strony logowania</h1>

<!-- kończy sekcję -->
@endsection