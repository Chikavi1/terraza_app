
@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
<div class="color-cut">
  <p class="center white-text" style="margin-top: 0 !important;padding: 1em;"><strong>{{ $message }}</strong></p>
</div>
@endif


<h4 class="center">
	 {{ $user->name }}
</h4>



	
<div class="row padding">
  <div class="card col s12 m6 offset-m3 z-depth-5" style="padding: 3em;">
  	<center>
	  	<img src="/{{$user->photo}}" alt="" width="150" >
  	</center>
 	 	<h5 class="center-align">Datos de la cuenta</h5>
			<table class=" highlight striped">
			    <thead>
			        <tr>
			            <th>Nombre del Usuario</th>
			            <th class="right-align">{{$user->name}}</th>

			        </tr>
			    </thead>

			    <tbody >
			    	<tr >
			          <td>correo</td>
			          <td class="right-align">{{$user->email}}</td>
			        </tr>
			        <tr >
			          <td>Celular</td>
			          <td class="right-align">{{$user->cellphone}}</td>
			        </tr>
			        <tr >
			          <td>Ciudad</td>
			          <td class="right-align">{{$user->city}}</td>
			        </tr>
			    </tbody>
			</table>
		<a href='profile.password' class="btn btn-block color-cut">cambiar contraseña</a>
  </div>
</div>
<div class="row">
	<div class="col m8 offset-m2 s12 card">
			<h5 class="center-align bold">Administra tu Terraza</h5>
			@foreach($negocios as $negocio)
			<div class="row padding">
			<div class="col s12 m6">
					<img src="/{{ $negocio->image }}" alt="" class="border-radius" style="width: 100%;">
			</div>
				<div class="col s8 m6">
					<h5><a style="font-size: 1.5em;" href="{{ route('bussiness.show',$negocio->id) }}">{{$negocio->name}}</a></h5>
					<div class="col s12 m6">
						<label for="">Precio</label>
							<p class="green-text bold" style="font-size: 1.5em;">$ {{ $negocio->price }}</p>
					</div>
					<div class="col s12 m6"><label for="">Categoria</label>
					<p style="font-size: 1.5em;">{{$negocio->category}}</p></div>
					<div class="col s12 m6"><label for="">Celular</label>
					<p>{{ $negocio->phone }}</p></div>
					<div class="col s12 m6"><label for="">Limite de personas</label>
					<p>{{ $negocio->peopleLimit }}</p></div>
					<div class="col s12 m6"><label for="">Ciudad</label>
					<p>{{ $negocio->city }}</p></div>
					<div class="col s12 m6">	<label for="">Creado</label>
					<p>{{ $negocio->created_at }}</p></div>
					
				</div>
				<form action="{{ route('addImages') }}" method="POST">
					@csrf
					<input type="hidden" name="negocio" value="{{ $negocio->id }}">
					<input type="submit" class="btn " value="Agregar Más Fotos">
				</form>
			</div>
			@endforeach
			
	</div>
</div>
@endsection

