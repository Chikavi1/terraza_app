@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col m3 offset-m1 card border-radius " style="position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;">
    <div class="padding">
    <img src="{{ Auth::user()->photo }}" class="circle responsive-img" width="120" alt="">
    <div class="padding">
      
    <h4 class="bold">{{ Auth::user()->name }}</h4>
     <label for="">Correo</label>
    <p class="bold">{{ Auth::user()->email }}</p>
     <label for="">Celular</label>
    <p class="bold">{{ Auth::user()->cellphone }}</p>
     <label for="">Desde</label>
    <p class="bold">{{ Auth::user()->created_at }}</p>
    <a href="{{ route('profile') }}">Ver perfil</a>
    </div>
    </div>
  </div> 
  <div class="col m6 offset-m1 border-radius card" style="height: 1200px;">
    contenido
  </div>
</div>
@endsection
