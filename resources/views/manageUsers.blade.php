<!-- extends oznacza, że ten plik rozszerza plik główny "layout" -->
<!-- jeśli w /views/ jest podfolder /modern/, a tam plik layout.blade.php, to będzie to 'modern.layout' lub 'modern/layout' -->
@extends('layout')

@section('title','Użytkownicy :: eMW')

<!-- rozpoczyna sekcję "content" -->
@section('content')
@if((!(session()->get('status') === null)) || isset($status))
      <div class="alert @if((session()->get('status') == true) || ($status ?? 'null' === true)) alert-success @elseif((session()->get('status') == false) || ($status ?? 'null' == false)) alert-danger @endif">
        <div class="glyphicon">
        @if((session()->get('status') == true) || ($status ?? 'null' === true)) <i class="fas fa-check-circle"></i> @elseif((session()->get('status') == false) || ($status ?? 'null' == false)) <i class="fas fa-times-circle"></i> @endif
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
 @if(isset($status))
  @if($status === false)
 Brak uprawnień do wyświetlenia strony.
  @endif
 @else
<h2>Użytkownicy <small class="text-muted">dodawanie, edycja, usuwanie</small></h2>

<button class="btn btn-success float-right openmodaladd"><i class="fas fa-user-plus"></i> Dodaj użytkownika</button>
    <!-- The Modal -->
    <div class="modaladd">
                  <!-- Modal content -->
                  <div class="modal-content">
                  <span class="closeadd">&times; <font size="5pt">Zamknij</font></span>

                  <form action="{{ url('users/add') }}" method="post" autocomplete="off">
                    @csrf
                    <h3>Dodaj nowego użytkownika</h3>
                    <label class="sr-only" for="nazwa">Nazwa</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Nazwa</div>
                      </div>
                      <input type="text" name="name" placeholder="Imię i nazwisko użytkownika" class="form-control" required>
                    </div>

                    <label class="sr-only" for="nazwa">E-mail</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">E-mail</div>
                      </div>
                      <input type="text" name="email" placeholder="E-mail użytkownika" class="form-control" required>
                    </div>

                    <label class="sr-only" for="rola">Rola</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Rola</div>
                      </div>
                      <select class="form-control modalselect" name="role" required>
                          <option value="admin">Administrator</option>
                          <option value="user" selected>Użytkownik</option>
                      </select>
                    </div>

                    <label class="sr-only" for="nazwa">Hasło</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Hasło</div>
                      </div>
                      <input type="password" name="pass" minlength="8" placeholder="Hasło do konta użytkownika" class="form-control" autocomplete="new-password" required>
                    </div>
                    
                    @if(isset($_GET['page']) && isset($_GET['counter']))
                      <input type="hidden" name="page" value="{{ $_GET['page'] }}" />
                      <input type="hidden" name="counter" value="{{ $_GET['counter'] }}"/>
                    @endif
                    <input type="hidden" name="csrf" value="{{ csrf_token() }}"/>

                      <input type="submit" value="Dodaj użytkownika" class="btn btn-outline-success float-right" name="submit">
                  </form> 
                  </div>
                  </div>

<table class="table table-striped table-hover justify-content-center">
              <thead class="thead-light">
                <tr>
                  <th>Lp.</th>
                  <th>@sortablelink('name', 'Kto')</th>
                  <th>@sortablelink('email', 'E-Mail')</th>
                  <th>@sortablelink('role', 'Rola')</th>
                  <th>@sortablelink('created_at', 'Utworzono')</th>
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
                  @foreach($users as $user)
                <tr>
                  <td><b>{{ $counter++ }}</b></td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>@if($user->role == 'admin')Administrator @elseif($user->role == 'user')Użytkownik @endif</td>
                  <td>{{ $user->created_at }}
                  <td class="stockAction" style="width:20%;">

                  <button class="btn btn-outline-primary btn-sm openmodal"><i class="far fa-edit"></i> Edytuj</button>
                  <!-- The Modal -->
                  <div class="modal">
                  <!-- Modal content -->
                  <div class="modal-content">
                  <span class="close">&times; <font size="5pt">Zamknij</font></span>

                  <form action="{{ url('users/edit')}}" method="post" autocomplete="off">
                    @csrf
                    <label class="sr-only" for="id">ID</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text modalfield">ID</div>
                        </div>
                        <input type="text" name="id" value="{{ $user->id }}" class="form-control" readonly>
                    </div>
                    
                    <label class="sr-only" for="name">Kto</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Kto</div>
                      </div>
                      <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                    </div>
                      
                    <label class="sr-only" for="email">E-Mail</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">E-Mail</div>
                      </div>
                      <input type="text" name="email" value="{{ $user->email }}" class="form-control" required>
                    </div>

                    <label class="sr-only" for="rola">Rola</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Rola</div>
                      </div>
                      <select class="form-control modalselect" name="role" required>
                          <option value="admin" @if($user->role == 'admin') selected @endif>Administrator</option>
                          <option value="user" @if($user->role == 'user') selected @endif>Użytkownik</option>
                      </select>
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

                  <button class="btn btn-warning btn-sm openmodalpwd" style="margin:0;"><i class="fas fa-shield-alt"></i> Zmień hasło</button>
                 <!-- The Modal -->
                 <div class="modalpwd">
                  <!-- Modal content -->
                  <div class="modal-content">
                  <span class="closepwd">&times; <font size="5pt">Zamknij</font></span>

                  <form action="{{ url('users/editpwd') }}" method="post" autocomplete="off">
                    @csrf
                    <label class="sr-only" for="id">ID</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text modalfield">ID</div>
                        </div>
                        <input type="text" name="id" value="{{ $user->id }}" class="form-control" readonly>
                    </div>

                    <label class="sr-only" for="email">E-Mail</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">E-Mail</div>
                      </div>
                      <input type="text" name="email" value="{{ $user->email }}" class="form-control" disabled>
                    </div>

                    <label class="sr-only" for="nazwa">Hasło</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Hasło</div>
                      </div>
                      <input type="password" name="password" minlength="8" placeholder="Wpisz nowe hasło" autocomplete="new-password" class="form-control" required>
                    </div>
                    
                    @if(isset($_GET['page']) && isset($_GET['counter']))
                      <input type="hidden" name="page" value="{{ $_GET['page'] }}" />
                      <input type="hidden" name="counter" value="{{ $_GET['counter'] }}"/>
                    @endif
                    <input type="hidden" name="csrf" value="{{ csrf_token() }}"/>

                      <input type="submit" value="Zmień hasło" class="btn btn-warning float-right" name="submit">
                  </form> 
                  </div>
                  </div>

                  <button type="submit" class="btn btn-outline-danger btn-sm openmodaldel"><i class="far fa-trash-alt"></i> Usuń</button></td>
                  <!-- The Modal -->
                  <div class="modaldel">
                  <!-- Modal content -->
                  <div class="modal-content">
                  <span class="closedel">&times; <font size="5pt">Zamknij</font></span>

                  <form action="{{ url('users/delete') }}" method="post" autocomplete="off">
                    @csrf
                    <h3>Czy chcesz usunąć tego użytkownika?</h3>
                    <label class="sr-only" for="id">ID</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text modalfield">ID</div>
                        </div>
                        <input type="text" name="id" value="{{ $user->id }}" class="form-control" readonly>
                    </div>
                    
                    <label class="sr-only" for="nazwa">Kto</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text modalfield">Kto</div>
                        </div>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" disabled readonly>
                      </div>

                      <label class="sr-only" for="nazwa">E-mail</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text modalfield">E-mail</div>
                        </div>
                        <input type="text" name="name" value="{{ $user->email }}" class="form-control" disabled readonly>
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

            {!! $users->appends(\Request::except('page'))->appends('counter', $counter)->render() !!}

@endif

<!-- kończy sekcję -->
@endsection