<!-- extends oznacza, że ten plik rozszerza plik główny "layout" -->
<!-- jeśli w /views/ jest podfolder /modern/, a tam plik layout.blade.php, to będzie to 'modern.layout' lub 'modern/layout' -->
@extends('layout')

@section('title','viewStock')

<!-- rozpoczyna sekcję "content" -->
@section('content')

    <h1>sekcja testowa dla stanu magazynu</h1>
    <!-- mamy przekazany parametr $table, więc chcemy go teraz wypisać -->
    @if(isset($table))
        @foreach($table as $tab)
        <!-- wypisanie zmiennej -->
        <li>{{$tab}}</li>
        @endforeach
    @endif

<!-- kończy sekcję -->
@endsection