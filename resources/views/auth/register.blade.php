@extends('layouts.app')

@section('content')

<div class="row" style="margin-top: 2em;">
  <div class="col m6">
    <img src="{{ asset('img/login.svg') }}" style="width: 70%;padding: 2em;margin-left: 4em;margin-top: 3em;" alt="">
  </div>
  <div class="col m6">
    <h2>Registrate</h2>

    <div class="card-body">
       <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="row">

            <div class="input-field col s12 m10 ">
              <input id="name" type="text"  name="name" required >
              <label for="first_name">Nombre</label>
            </div>

            <div class="input-field col s12 m10 ">
              <input id="email" type="email" name="email"  required >
              <label for="first_name">Correo Electronico</label>
            </div>

            <div class="input-field col s12 m5 ">
              <input id="password" type="password" name="password" required >
              <label for="last_name">Contraseña</label>
            </div>
            <div class="input-field col s12 m5 ">
              <input id="password-confirm" type="password" name="password_confirmation" required >
              <label for="last_name">Confirma Contraseña</label>
            </div>
            <div class="col s12 m8">
               <button type="submit" class="btn right btn-primary" style="background: #3668A6;">
                      Registrarme
                  </button>
            </div>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection


