<!-- extends oznacza, że ten plik rozszerza plik główny "layout" -->
<!-- jeśli w /views/ jest podfolder /modern/, a tam plik layout.blade.php, to będzie to 'modern.layout' lub 'modern/layout' -->
@extends('layout')

@section('title','Alarmy :: eMW')

<!-- rozpoczyna sekcję "content" -->
@section('content')

Reminders modules here

<!-- kończy sekcję -->
@endsection