@extends('layouts.app')
@section('content')
<style>
	.title{
		font-size: 1.5em;
		font-weight: bold;
	}
	.border-1{
		border-radius: 1em;
	}
</style>


<div class="row">
	<div class="col m3">
		<p class="center-align"><b>Busqueda por</b></p>
		<h5 class="center-align">{{$place}}</h5>
		<p class="right-align"><a href="{{ route('welcome') }}">cambiar lugar</a></p>
		<div class="card padding">
			<h5>Filtrar</h5>
			<form action="{{ route('search') }}" method="GET">
			<p>Por precio</p>
			<div class="row">
				<div class="col m6"><input type="text" placeholder="mínimo" name="minimo" value="{{$minimum}}"></div>
				<div class="col m6"><input type="text" placeholder="máximo" name="maximo" value="{{$maximum}}"></div>
			</div>
				<input type="hidden" name="place" value="{{$place}}">
				
			<p>Por servicios</p>
			<input type="text" placeholder="servicios" name="servicios">
				<input type="submit" value="Aplicar" class="btn fondo-principal">
			</form>
		</div>
	</div>
	<div class="col m7 offset-m1">
			@if(!$terraices->isEmpty())
			@foreach($terraices as $terrace)
			<a href="{{ route('bussiness.show',$terrace->id) }}">
			<div class="card horizontal border-1">
		      <div class="card-image">
		        <img src="{{ $terrace->image }}" style="border-radius: 1em 0em 0em 1em;">
		      </div>
		      <div class="card-stacked">
		        <div class="card-content">
		         <p class="title">{{$terrace->name}}</p>
							<p>{{ $terrace->city }}</p>
							<p>limite de personas: <b>{{ $terrace->peopleLimit }}</b></p>
							<h5 style="color:green;">${{ $terrace->price }} MXN</h5>
		        </div>
		        
		      </div>
    		</div>
    	</a>
			@endforeach
  		@else
  		<center style="margin-top: 3em;">
  			<img src="{{ asset('img/not_found.svg')  }}" alt="" width="200">
				<h5>no encontramos nada.</h5>
  		</center>

  		@endif
		
	</div>
</div>
	

@endsection