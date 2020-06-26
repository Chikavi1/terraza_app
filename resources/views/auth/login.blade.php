@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top: 2em;">
        <div class="col m6">
            <img src="{{ asset('img/fun.svg') }}" style="width: 70%;padding: 2em;margin-left: 4em;margin-top: 2em;" alt="">
        </div>
        <div class="col m6">
           <h2>Inicia Sesión</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" >
                        @csrf
                        <div class="row">
                            <div class="input-field col s12 m8 ">
                              <input id="email" type="email" name="email"  required autocomplete="off" >
                              <label for="first_name">Correo Electronico</label>
                            </div>
                            <div class="input-field col s12 m8 ">
                              <input id="password" type="password" name="password" required >
                              <label for="last_name">Contraseña</label>
                            </div>
                            <div class="col s12">
                                 <a class="center" href="{{ route('password.request') }}">
                                      Olvidé mi contraseña
                                 </a>
                            </div>
                            <div class="col s12 m8">
                                
                                  <button type="submit" class="right btn btn-primary " style="background: #3668A6;">
                                    Iniciar
                                </button>
                            </div>
                        </div>
                    </form>
</div>
        </div>
    </div>
                
@endsection
