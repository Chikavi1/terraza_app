@extends('layouts.app')

@section('content')

<div class="parallax-container">
  <h3 class="center-align white-text" style="margin-top: 3em;">Encuentra tu Terraza más cercana.</h3>
  <div class="row ">
    <div class="col s12 m4 offset-m4 card">
      <form action="{{ route('search') }}" method="get" class="">
        @csrf
        <div class="row">
          <div class="col s12">
            <div class="row">
              <div class="input-field col s12 m8 offset-m2">
                <i class="material-icons prefix">search</i>
                <input type="text" name="place" id="autocomplete-input" placeholder="Ingresa municipio" class="autocomplete" autocomplete="off" required="" >

                </div>
         <!--  <center>
            <div class="chip"  onclick="hacer()">
              <div class="center-align valign-wrapper">
                <span class="material-icons ">location_on</span>Usa tu ubicación</p>
              </div>
            </div>
          </center>     -->
          </div>
          </div>
        </div>
         
               
          
             <button class="btn fondo-principal" style="width: 100%;">Buscar </button>     
        </form>    
    </div>
</div>
       
<div class="parallax">
  <img src="https://images.unsplash.com/photo-1517457373958-b7bdd4587205?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80">
</div>
</div>

<div class="row">
    <div class="container">
        <h2>Preparate</h2>
        <div class="row">
    <div class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">textsms</i>
          <input type="text" id="autocomplete-input" class="autocomplete">
          <label for="autocomplete-input">Autocomplete</label>
          <input type="submit" id="submit">
        </div>
      </div>
    </div>
  </div>
        
    </div>
</div>

<script>
   
   $(document).ready(function(){
   caca = {
        "Guadalajara": null,
        "Zapopan": null,
        "Tlaquepaque":null,
        "Ciudad De México": 'https://placehold.it/250x250'
      };
    $('input.autocomplete').autocomplete({
      data: caca ,
    })
});
</script>
@endsection