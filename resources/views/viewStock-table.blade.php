<table class="table table-striped table-hover justify-content-center">
              <thead class="thead-light">
                <tr>
                  <th>Lp.</th>
                  <th>@sortablelink('nazwa', 'Produkt')</th>
                  <th>@sortablelink('typ', 'Typ')</th>
                  <th>@sortablelink('ilosc', 'Ilość')</th>
                  <th>@sortablelink('jednostka', 'Jednostka')</th>
                  <th>Uwagi</th>
                  <th>@sortablelink('alarm', 'Alarm')</th>
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
                  <td>@if($item->alarm === 1) <font color="red"><b>TAK</b></font> @else NIE @endif</td>
                  <td class="stockAction"><button class="btn btn-outline-primary btn-sm openmodal"><i class="far fa-edit"></i> Edytuj</button>
                  <!-- The Modal -->
                  <div class="modal">
                  <!-- Modal content -->
                  <div class="modal-content">
                  <span class="close">&times; <font size="5pt">Zamknij</font></span>

                  <form action="/stock/edit" method="post" autocomplete="off">
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
                      <input type="text" name="nazwa" value="{{ $item->nazwa }}" class="form-control" required>
                    </div>
                      
                    <label class="sr-only" for="nazwa">Typ</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Typ</div>
                      </div>
                      <input type="text" name="typ" value="{{ $item->typ }}" class="form-control" required>
                    </div>

                    <label class="sr-only" for="nazwa">Ilość</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Ilość</div>
                      </div>
                      <input type="number" name="ilosc" value="{{ $item->ilosc }}" class="form-control" min="0" required>
                    </div>

                    <label class="sr-only" for="nazwa">Jednostka</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Jednostka</div>
                      </div>
                      <select class="form-control modalselect" name="jednostka" required>
                          <option value="">(nie wybrano)</option>
                          <option value="szt" @if($item->jednostka == 'szt') selected @endif>sztuki [szt]</option>
                          <option value="g" @if($item->jednostka == 'g') selected @endif>gramy [g]</option>
                          <option value="kg" @if($item->jednostka == 'kg') selected @endif>kilogramy [kg]</option>
                          <option value="ml" @if($item->jednostka == 'ml') selected @endif>mililitry [ml]</option>
                          <option value="l" @if($item->jednostka == 'l') selected @endif>litry [l]</option>
                          <option value="cm" @if($item->jednostka == 'cm') selected @endif>centymetry [cm]</option>
                          <option value="m" @if($item->jednostka == 'm') selected @endif>metry [m]</option>
                      </select>
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

                  <form action="/stock/delete" method="post" autocomplete="off">
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
            {!! $stock->appends(\Request::except('page'))->appends('counter', $counter)->render() !!}