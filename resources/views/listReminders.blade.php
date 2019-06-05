<!-- extends oznacza, że ten plik rozszerza plik główny "layout" -->
<!-- jeśli w /views/ jest podfolder /modern/, a tam plik layout.blade.php, to będzie to 'modern.layout' lub 'modern/layout' -->
@extends('layout')

@section('title','Alarmy :: eMW')

<!-- rozpoczyna sekcję "content" -->
@section('content')
@if((!(session()->get('status') === null)) || isset($status))
      <div class="alert @if((session()->get('status') == true) || $status == true) alert-success @elseif((session()->get('status') == false) || $status == false) alert-danger @endif">
        <div class="glyphicon">
        @if((session()->get('status') == true) || $status == true) <i class="fas fa-check-circle"></i> @elseif((session()->get('status') == false) || $status=false) <i class="fas fa-times-circle"></i> @endif
        </div>
        <div>
        @if((!(session()->get('status') === null)))
          {{ session()->get('statustext') }}
        @elseif(isset($statustext))
          {{ $statustext }}
        @endif
        </div>
      </div>
    @endif
<h2>Alarmy <small class="text-muted">na dzień {{ date('d-m-Y') }}</small></h2>

<table class="table table-striped table-hover justify-content-center">
              <thead class="thead-light">
                <tr>
                  <th>Lp.</th>
                  <th>Dotyczy</th>
                  <th>@sortablelink('prog', 'Próg ilościowy')</th>
                  <th>@sortablelink('deadline', 'Termin alarmu')</th>
                  <th>Akcje</th>
                </tr>
              </thead>
              <tbody>
                    @php
                      if(empty($_GET['counter']) || ($_GET['counter'] == 1) || !isset($_GET['page'])) {
                        $counter = 1;
                      } else if(isset($_GET['page'])) {
                        //wyliczenie prawidłowego parametru lp. w tabeli
                        $counter = ($paginate) * ($_GET['page'] - 1) +1;
                      }
                    @endphp
                  @foreach($res as $item)
                <tr @if ($item->alarm == true) class="alarm" @endif>
                  <td><b>{{ $counter++ }}</b></td>
                  <td>{{ $item->nazwa }}</td>
                  <td>@if($item->prog != null) {{ $item->prog }} @else() <i>&mdash;</i> @endif</td>
                  <td>@if($item->deadline != null) {{ $item->deadline }} @else() <i>&mdash;</i> @endif</td>
                  <td class="stockAction"><button class="btn btn-outline-primary btn-sm openmodal"><i class="far fa-edit"></i> Edytuj</button>
                  <!-- The Modal -->
                  <div class="modal">
                  <!-- Modal content -->
                  <div class="modal-content">
                  <span class="close">&times; <font size="5pt">Zamknij</font></span>

                  <form action="{{ url('reminders/edit')}}" method="post" autocomplete="off">
                    @csrf
                    <label class="sr-only" for="id">ID alarmu</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text modalfield">ID alarmu</div>
                        </div>
                        <input type="text" name="id" value="{{ $item->id }}" class="form-control" readonly>
                    </div>
                    
                    <label class="sr-only" for="nazwa">Dotyczy</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Dotyczy</div>
                      </div>
                      <input type="text" name="nazwa" value="{{ $item->nazwa }}" class="form-control" disabled>
                    </div>
                      
                    <label class="sr-only" for="nazwa">Uwagi</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Uwagi</div>
                      </div>
                      <textarea class="form-control" id="uwagi" name="uwagi" rows="3" disabled>@if($item->uwagi != null) {{ $item->uwagi }} @else() (brak) @endif</textarea>
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

                    <label class="sr-only" for="nazwa">Próg (ilość)</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Próg (ilość)</div>
                      </div>
                      <input type="number" name="prog" value="{{ $item->prog }}" placeholder="np. &quot;25&quot;" class="form-control">
                    </div>

                    <label class="sr-only" for="nazwa">Deadline</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Deadline</div>
                      </div>
                      @php
                      $date = $item->deadline ?? '';
                      @endphp
                      <input type="datetime-local" name="deadline" @if($date) value="{{ date('Y-m-d\TH:i', strtotime($date)) }}" @endif  class="form-control">
                    </div>
                    <input type="hidden" name="ilosc" value="{{ $item->ilosc }}"/>
                    <input type="hidden" name="action" value="edit"/>
                    @if(isset($_GET['page']) && isset($_GET['counter']))
                      <input type="hidden" name="page" value="{{ $_GET['page'] }}" />
                      <input type="hidden" name="counter" value="{{ $_GET['counter'] }}"/>
                    @endif
                    <input type="hidden" name="csrf" value="{{ csrf_token() }}"/>

                      <input type="submit" value="Zaktualizuj" class="btn btn-outline-success float-right" name="submit">
                  </form> 
                  </div>
                  </div>

                  <button type="submit" class="btn btn-outline-danger btn-sm openmodaldel"><i class="far fa-trash-alt"></i> Usuń</button></td>
                  <!-- The Modal -->
                  <div class="modaldel">
                  <!-- Modal content -->
                  <div class="modal-content">
                  <span class="closedel">&times; <font size="5pt">Zamknij</font></span>

                  <form action="{{ url('reminders/delete') }}" method="post" autocomplete="off">
                  <input type="text" name="paginate" value="{{ $paginate }}" hidden/>
                    @csrf
                    <h3>Czy chcesz usunąć ten produkt?</h3>
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
                        <input type="text" name="nazwa" value="{{ $item->nazwa }}" class="form-control" disabled readonly>
                      </div>
                      <p><strong>UWAGA:</strong> Tej operacji nie da się cofnąć!</p>
                      @if(isset($_GET['page']) && isset($_GET['counter']))
                      <input type="hidden" name="page" value="{{ $_GET['page'] }}" />
                      <input type="hidden" name="counter" value="{{ $_GET['counter'] }}"/>
                    @endif
                    <input type="hidden" name="csrf" value="{{ csrf_token() }}"/>

                      <input type="submit" value="Usuń" class="btn btn-outline-danger float-right" name="submit"/>
                  </form> 
                  </div>
                  </div>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="legend">
                <span style="font-weight:500;">Legenda: </span>
            <i class="fas fa-square-full" style="color:red; padding-left:10px;"></i> <i>&mdash; alarm trwający</i>
            <i class="fas fa-square-full" style="padding-left:10px;"></i> <i>&mdash; alarm ustawiony (czuwanie)</i>
            </div>
            {!! $res->appends(\Request::except('page'))->appends('counter', $counter)->render() !!}

<!-- kończy sekcję -->
@endsection