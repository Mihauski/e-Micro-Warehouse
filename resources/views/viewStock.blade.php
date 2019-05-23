<!-- extends oznacza, że ten plik rozszerza plik główny "layout" -->
<!-- jeśli w /views/ jest podfolder /modern/, a tam plik layout.blade.php, to będzie to 'modern.layout' lub 'modern/layout' -->
@extends('layout')

@section('title','Magazyn :: eMW')

<!-- rozpoczyna sekcję "content" -->
@section('content')

    <h1>Stany magazynowe na dzień {{ date('d-m-Y') }}</h1>
    <!-- mamy przekazany parametr $table, więc chcemy go teraz wypisać -->
    <div class="table-container">
      @include('viewStock-table')
    </div>

<!-- kończy sekcję -->
@endsection
