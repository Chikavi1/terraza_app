@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" />
<link rel="stylesheet" href="{{ asset('css/showbussiness.css') }}">

<script>
	const reservationsDays = [];
	console.log(reservationsDays);
	 @foreach ($reservations as $reservation)
       reservationsDays.push('{{ $reservation->day }}');
    @endforeach
	var dateToday = new Date();
  $(document).ready(function(){
    $('.materialboxed').materialbox();
    $('.datepicker').datepicker({
    	format: 'yyyy-mm-dd',
    	 disableDayFn: function(date) {
		    var dateParsed = date.toISOString().split("T")[0];
		    return (reservationsDays.indexOf(dateParsed) > -1 );
  	}, minDate: dateToday,
  	maxDate: new Date(2020,dateToday.getMonth()+3,1)    });
  });
</script>

<div class="row">
	<div class="col m8 s12 offset-m2 card border-radius" 
	style="height:30em; background-repeat: no-repeat;   background-size: cover;
	background-image: url('../{{$terrace->image}}');">
	</div>
</div>
<div class="row">

	<div class="col m10 offset-m1 ">
		<div class="row">
			<div class="col m5 offset-m1 s12">
				<h4>{{ $terrace->name }}</h4>	
			</div>
			<div class="col m5 hide-on-small-only">
				<h4 class="right green-text bold">$ {{ $terrace->price }} MXN</h4>
			</div>
		</div>

		<div class="row">
			<div class="col m5 offset-m1 s12">
				<p>{{$terrace->description}}</p>
				<div class="row padding">
					<h4>Servicios</h4>
					@foreach($services as $service)
					<div class="col s6 ">
						<p class="bold capitalize">{{ $service }}</p>
					</div>
					@endforeach	
				</div>
				<hr>
				<h4>Reseñas</h4>

	@foreach($reviews as $review)
	<div class="row valign-wrapper">
      <div class="col s2">
       <img
       width="50"
	    data-sizes="auto"
	    data-src="https://materializecss.com/images/yuna.jpg"
	    data-srcset="https://materializecss.com/images/yuna.jpg" class="lazyload" />
      </div>
      <div class="col s10">
      	<p class="bold">{{ $review->users()->pluck('name')[0] }}</p>
   		 		<blockquote>
      		<p>{{$review->description}}</p>
    			</blockquote>
      </div>
    </div>
	
		@endforeach
	</div>

			<div class="col m4 offset-m1 s12 hide-on-small-only" >
				<div class="card border-radius padding"  >
					<h5 class="center-align">Reserva</h5>
					<form action="{{ route('checking') }}" method="POST" class="padding">
						@csrf
						<input type="hidden" value="{{ $terrace->id }}" name="terrace">
					 <input type="text" name="day" class="datepicker  " required placeholder="Fecha de reservación">
						<button class="btn btn-block fondo-principal" style="margin-bottom: 5em;">Siguiente</button>
						<!-- <div class="footer hide-on-med-and-up valing-wrapper z-depth-3 ">
							<div class="row">
								<div class="col s3 offset-s2">
									 <input type="text" name="day" class="datepicker  " required placeholder="Fecha de reservación">
								</div>
								<div class="col s6" style="padding: 1em;">
									<button class="btn btn-block fondo-principal" >Siguiente</button>
								</div>
							</div>
						</div> -->
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col m11 offset-m1">
				<h4>Fotos</h4>
				<div class="row">
					@foreach($imagenes as $imagen)
						<div class="col s12 m3">
							<img
							style="width:100%;"
					    data-sizes="auto"
					    data-src="/{{$imagen->image}}"
					    data-srcset="/{{$imagen->image}} " class="lazyload" />
						</div>
					@endforeach
				</div>
						<h4>Ubicacion</h4>
				<div class="padding">
					
						<h5>{{$terrace->city}}</h5>
						 <div id="map-template" class="border-radius"></div>
				</div>
		</div>
		</div>
		
	</div>
</div>
	
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>
	<script>
		var map = L.map('map-template',{attributionControl: false}).setView([{{$terrace->	latitude}}, {{$terrace->longitude}}], 13);
		L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png').addTo(map)

		let iconmarker = L.icon({
			iconUrl: "https://image.flaticon.com/icons/png/512/235/235854.png",
			iconSize: [30,30],
		})
		L.marker([{{$terrace->latitude}}, {{$terrace->longitude}}], {icon: iconmarker}).addTo(map);


	</script>
@endsection