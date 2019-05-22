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
                  <th>Lp.</th>
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
                    @php
                      $counter = 1;
                    @endphp
                  @foreach($stock as $item)
                <tr @if ($item->alarm == true) class="alarm" @endif>
                  <td><b>{{ $counter++ }}</b></td>
                  <td>{{ $item->nazwa }}</td>
                  <td>{{ $item->typ }}</td>
                  <td>{{ $item->ilosc }}</td>
                  <td>{{ $item->jednostka }}</td>
                  <td>
                  @if($item->uwagi == null)(brak)
                  @else
                    <button class="collapsible">Pokaż   <i class="fas fa-plus"></i></button>
                    <div class="collapsible-content">
                     {{ $item->uwagi }} 
                    </div>
                  @endif
                  </td>
                  <td>@if($item->alarm === 1) TAK @else NIE @endif</td>
                  <td class="stockAction"><button class="btn btn-outline-primary btn-sm openmodal"><i class="far fa-edit"></i> Edytuj</button>
                  <!-- The Modal -->
                  <div class="modal">
                  <!-- Modal content -->
                  <div class="modal-content">
                  <span class="close">&times; <font size="5pt">Zamknij</font></span>

                  <form action="/stock/edit" method="post">
                    @csrf
                    <label class="sr-only" for="id">ID</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text modalfield">ID</div>
                        </div>
                        <input type="text" name="id" value="{{ $item->id }}" class="form-control" readonly>
                    </div>
                    
                    <label class="sr-only" for="nazwa">Nazwa</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Nazwa</div>
                      </div>
                      <input type="text" name="nazwa" value="{{ $item->nazwa }}" class="form-control">
                    </div>
                      
                    <label class="sr-only" for="nazwa">Typ</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Typ</div>
                      </div>
                      <input type="text" name="typ" value="{{ $item->typ }}" class="form-control">
                    </div>

                    <label class="sr-only" for="nazwa">Ilość</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Ilość</div>
                      </div>
                      <input type="number" name="ilosc" value="{{ $item->ilosc }}" class="form-control">
                    </div>

                    <label class="sr-only" for="nazwa">Jednostka</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Jednostka</div>
                      </div>
                      <input type="text" name="jednostka" value="{{ $item->jednostka }}" class="form-control">
                    </div>

                    <label class="sr-only" for="nazwa">Uwagi</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Uwagi</div>
                      </div>
                      <textarea class="form-control" id="uwagi" name="uwagi" rows="3">{{ $item->uwagi }}</textarea>
                    </div>

                    <label class="sr-only" for="nazwa">Alarm</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Alarm</div>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="alarm" id="alarmnie" value="1" @if($item->alarm == 1) checked @endif>
                        <label class="form-check-label" for="inlineRadio1">Tak</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="alarm" id="alarmtak" value="0" @if($item->alarm == 0) checked @endif>
                        <label class="form-check-label" for="inlineRadio2">Nie</label>
                      </div>
                    </div>
                    <input type="hidden" name="action" value="edit"/>
                    <input type="hidden" name="csrf" value="{{ csrf_token() }}"/>

                      <input type="submit" value="Zaktualizuj" class="btn btn-outline-success float-right" name="submit">
                  </form> 
                  </div>
                  </div>

                  <button type="submit" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i> Usuń</button></td>
                </tr>
                @endforeach
              </tbody>
            </table>

<!-- kończy sekcję -->
@endsection