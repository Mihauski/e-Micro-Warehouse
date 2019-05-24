<!-- extends oznacza, że ten plik rozszerza plik główny "layout" -->
<!-- jeśli w /views/ jest podfolder /modern/, a tam plik layout.blade.php, to będzie to 'modern.layout' lub 'modern/layout' -->
@extends('layout')

@section('title','Magazyn :: eMW')

<!-- rozpoczyna sekcję "content" -->
@section('content')

    <h2>Stany magazynowe <small class="text-muted">na dzień {{ date('d-m-Y') }}</small></h2>
    <!-- mamy przekazany parametr $table, więc chcemy go teraz wypisać -->
    @if(!(session()->get('status') === null))
      <div class="alert @if(session()->get('status') == true) alert-success @elseif(session()->get('status') == false) alert-danger @endif">
        <div class="glyphicon">
        @if(session()->get('status') == true) <i class="fas fa-check-circle"></i> @elseif(session()->get('status') == false) <i class="fas fa-times-circle"></i> @endif
        </div>
        <div>
          {{ session()->get('statustext') }}
        </div>
      </div>
    @endif
    <button class="btn btn-success float-right openmodaladd"><i class="fas fa-plus"></i> Dodaj produkt</button>
    <!-- The Modal -->
    <div class="modaladd">
                  <!-- Modal content -->
                  <div class="modal-content">
                  <span class="closeadd">&times; <font size="5pt">Zamknij</font></span>

                  <form action="/stock/add" method="post" autocomplete="off">
                    @csrf
                    <label class="sr-only" for="nazwa">Nazwa</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Nazwa</div>
                      </div>
                      <input type="text" name="nazwa" placeholder="Nazwa produktu, np. &quot;Mąka pszenna&quot;" class="form-control" required>
                    </div>
                      
                    <label class="sr-only" for="nazwa">Typ</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Typ</div>
                      </div>
                      <input type="text" name="typ" placeholder="Typ produktu, np. &quot;Mąka&quot;" class="form-control" required>
                    </div>

                    <label class="sr-only" for="nazwa">Ilość</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Ilość</div>
                      </div>
                      <input type="number" name="ilosc" placeholder="Ilość jednostek produktu, np. &quot;25&quot;" class="form-control" required>
                    </div>

                    <label class="sr-only" for="nazwa">Jednostka</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield" required>Jednostka</div>
                      </div>
                      <select class="form-control modalselect" name="jednostka" required>
                          <option value="">(nie wybrano)</option>
                          <option value="szt">sztuki [szt]</option>
                          <option value="g">gramy [g]</option>
                          <option value="kg">kilogramy [kg]</option>
                          <option value="ml">mililitry [ml]</option>
                          <option value="l">litry [l]</option>
                          <option value="cm">centymetry [cm]</option>
                          <option value="m">metry [m]</option>
                      </select>
                    </div>

                    <label class="sr-only" for="nazwa">Uwagi</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Uwagi</div>
                      </div>
                      <textarea class="form-control" id="uwagi" name="uwagi" rows="3" placeholder="Dowolne uwagi (notatki) dotyczące produktu."></textarea>
                    </div>

                    <input type="hidden" name="csrf" value="{{ csrf_token() }}"/>

                      <input type="submit" value="Dodaj produkt" class="btn btn-outline-success float-right" name="submit">
                  </form> 
                  </div>
                  </div>
    <div class="table-container">
      @include('viewStock-table')
    </div>

<!-- kończy sekcję -->
@endsection
