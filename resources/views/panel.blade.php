<!-- extends oznacza, że ten plik rozszerza plik główny "layout" -->
<!-- jeśli w /views/ jest podfolder /modern/, a tam plik layout.blade.php, to będzie to 'modern.layout' lub 'modern/layout' -->
@extends('layout')

@section('title','Panel Kontrolny :: eMW')

<!-- rozpoczyna sekcję "content" -->
@section('content')

<!-- Podsumowanie alarmów (ile/ile aktywnych), podsumowanie towaru (ilość wpisów) -->
<div class="row justify-content-around paneltop">
    <div class="col-4">
      <h3>Witaj, <em>{{ $user->name }}</em>!</h3>
      <p>Oto Twój panel kontrolny. Znajdziesz tu szybkie podsumowanie najważniejszych rzeczy.</p>
      <p>Ta aplikacja jest wciąż w fazie rozwoju. Wkrótce będzie ładnieć i przybierać na funkcjonalności!</p>
    </div>
    <div class="col-4">
    <h3>Dokumentacja</h3>
      <p>Do tego systemu opracowana została szczegółowa instrukcja obsługi wraz z dokumentacją.</p>
      <p>Więcej szczegółów znajdziesz tutaj: &lt;link&gt;</p>
    </div>
  </div>

<div class="row justify-content-around paneltop">
    <div class="col-4">
      <h3>Alarmy w magazynie</h3>
      <p>Ustawionych: <strong>{{ $alarms }}</strong></p>
      <p class="warning">Aktywnych: <strong>{{ $stock_alarms }}</strong></p>
      <p>Przejdź do zakładki <a href="{{ url('reminders') }}">Alarmy</a>, aby wyświetlić więcej szczegółów.</p>
    </div>
    <div class="col-4">
    <h3>Produkty w magazynie</h3>
      <p>Ilość produktów: <strong>{{ $stock_amount }}</strong></p>
      <p class="warning">Z alarmami: <strong>{{ $stock_alarms }}</strong></p>
      <p>Przejdź do zakładki <a href="{{ url('stock') }}">Magazyn</a>, aby wyświetlić więcej szczegółów.</p>
    </div>
  </div>
<!-- kończy sekcję -->
@endsection