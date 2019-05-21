<!-- extends oznacza, że ten plik rozszerza plik główny "layout" -->
<!-- jeśli w /views/ jest podfolder /modern/, a tam plik layout.blade.php, to będzie to 'modern.layout' lub 'modern/layout' -->
@extends('layout')

@section('title','Magazyn :: eMW')

<!-- rozpoczyna sekcję "content" -->
@section('content')

    <h1>Stany magazynowe na dzień {{ date('d-m-Y') }}</h1>
    <!-- mamy przekazany parametr $table, więc chcemy go teraz wypisać -->
    <table class="table table-striped table-hover justify-content-center">
              <thead class="thead-light">
                <tr>
                  <th>Produkt</th>
                  <th>Typ</th>
                  <th>Ilość</th>
                  <th>Jednostka</th>
                  <th>Uwagi</th>
                  <th>Alarm</th>
                  <th>Akcje</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($stock as $item)
                <tr @if ($item->alarm == true) class="alarm" @endif>
                  <td>{{ $item->nazwa }}</td>
                  <td>{{ $item->typ }}</td>
                  <td>{{ $item->ilosc }}</td>
                  <td>{{ $item->jednostka }}</td>
                  <td>{{ $item->uwagi }}</td>
                  <td>@if($item->alarm === 1) TAK @else NIE @endif</td>
                  <td class="stockAction"><button type="submit" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i> Edytuj</button> <button type="submit" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i> Usuń</button></td>
                </tr>
                @endforeach
              </tbody>
            </table>

<!-- kończy sekcję -->
@endsection