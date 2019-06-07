@extends('layout')

@section('title','Moje konto :: eMW')

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
<div class="container logindiv">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Twoje <strong>konto użytkownika :: eMW</strong></div>

                <div class="card-body">
                    <p>Witaj, <em>{{ $user->name }}!</em></p>
                    <p>&mdash; <strong>Twoja rola</strong> w systemie: <strong>@if($user->role == 'admin')Administrator @elseif($user->role == 'user')Użytkownik @endif</strong><br/>
                    &mdash; <strong>Twój email</strong>: {{ $user->email }}</p>
                    <button class="btn btn-outline-primary btn-md openmodal"><i class="far fa-edit"></i> Edytuj swoje dane</button>
                  <!-- The Modal -->
                  <div class="modal">
                  <!-- Modal content -->
                  <div class="modal-content">
                  <span class="close">&times; <font size="5pt">Zamknij</font></span>

                  <form action="{{ url('myaccount/edit')}}" method="post" autocomplete="off">
                    @csrf
                    <h3>Edytuj swoje dane</h3>
                    <label class="sr-only" for="id">ID</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text modalfield">ID</div>
                        </div>
                        <input type="text" name="id" value="{{ $user->id }}" class="form-control" readonly>
                    </div>
                    
                    <label class="sr-only" for="name">Nazwa</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text modalfield">Nazwa</div>
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
                
                  <button class="btn btn-warning btn-md openmodalpwd" style="margin:0;"><i class="fas fa-shield-alt"></i> Zmień swoje hasło</button>
                 <!-- The Modal -->
                 <div class="modalpwd">
                  <!-- Modal content -->
                  <div class="modal-content">
                  <span class="closepwd">&times; <font size="5pt">Zamknij</font></span>

                  <form action="{{ url('myaccount/editpwd') }}" method="post" autocomplete="off">
                    @csrf
                    <h3>Zmień swoje hasło</h3>
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
                      <input id="pass" type="password" name="password" minlength="8" placeholder="Wpisz nowe hasło" autocomplete="new-password" class="form-control" required>
                    </div>
                    <p onclick="document.getElementById('pass').type = 'text';" style="cursor:pointer; color:maroon; text-decoration:underline;">(odkryj hasło)</p>
                    
                    @if(isset($_GET['page']) && isset($_GET['counter']))
                      <input type="hidden" name="page" value="{{ $_GET['page'] }}" />
                      <input type="hidden" name="counter" value="{{ $_GET['counter'] }}"/>
                    @endif
                    <input type="hidden" name="csrf" value="{{ csrf_token() }}"/>

                      <input type="submit" value="Zmień hasło" class="btn btn-warning float-right" name="submit">
                  </form> 
                  </div>
                  </div>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
