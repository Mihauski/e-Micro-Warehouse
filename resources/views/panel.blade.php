<!-- extends oznacza, że ten plik rozszerza plik główny "layout" -->
<!-- jeśli w /views/ jest podfolder /modern/, a tam plik layout.blade.php, to będzie to 'modern.layout' lub 'modern/layout' -->
@extends('layout')

@section('title','Panel Kontrolny :: eMW')

<!-- rozpoczyna sekcję "content" -->
@section('content')

Panel modules here

<!-- kończy sekcję -->
@endsection