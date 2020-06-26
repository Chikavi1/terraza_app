@extends('layouts.app')

@section('content')

 <script>
  $(document).ready(function(){
    $('select').formSelect();    
    $('.timepicker').timepicker();
    $('.modal').modal();
    $('.chips').chips();
    $('textarea').ckeditor();
 });

</script>

@if($errors->any())
<style>
  .imh{
    padding: 1em !important;
  }
  .error-parrafo
  {
    margin-top: 0 !important;
    font-size:1.5em;
  }
  #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #address {
        background: red !important;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
      }
       #btns {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 50px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 30px;
      }

      #address:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
     
     
</style>
  @if ($message = Session::get('success'))
<div class="color-cut">
  <h5 class="center white-text" style="margin-top: 0 !important;padding: 1em;"><strong>{{ $message }}</strong></h5>
</div>
@endif

<div class="color-cut">
  <p class="center white-text error-parrafo" >
    <strong>Tenermos errores</strong>
     @foreach($errors->all() as $error)
     <p class="center-align white-text">{{ $error }}</p>
      @endforeach
  </p>
  <br>
</div>

@endif
<div class="row padding-1">
  <div class="col s12 m6 offset-m3 ">
    <div class="card  border-button fondo-gris padding-1">
        <h4 class="padding-1 color-principal bold">Crea tu perfil de vendedor</h4>
        
       <form method="post"   action="{{ route('bussiness.store') }}"  enctype="multipart/form-data">
                    @csrf
                <div class=" padding-1 border-button">
                    <h6 class="bold">Información del negocio</h6>
                    <div class="input-field">
                    <i class="material-icons prefix">storefront</i>
                        <input type="text" class="form-control" name="name"/>
                        <label for="name">Nombre de la Terraza</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">phone</i>
                        <input id="cellphone"  min="0" max="10" name="phone" type="tel" pattern="[0-9]+">
                        <label for="phone">Numero de celular</label>
                    </div>
                    <div class="file-field input-field">
                        <div class="btn fondo-principal">
                            <i class="material-icons center ">photo_camera</i>
                            <input type="file" name="image" >
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Imagen principal de la terraza" name="image">
                        </div>
                    </div>
                    {!! $errors->first('image','<span class="error"> :message</span>') !!}
                    <p><strong>Describe las caracteristicas de tu terraza</strong></p>
                    <div class="input-field">
                    <textarea name="description" id="description">
                    </textarea>
                    </div>
                    
                    <div class="input-field">
                    <i class="material-icons prefix">storefront</i>
                        <input type="text" class="form-control" name="category"/>
                        <label for="category">Categoria del negocio</label>
                    </div>

                     <div class="input-field">
                    <i class="material-icons prefix">attach_money</i>
                        <input type="text" class="form-control" name="price"/>
                        <label for="price">Precio</label>
                    </div>

                </div>                

                <div class=" padding-1 border-button">
                    <h6 class="bold">Disponibilidad del negocio y lugar</h6>

                    <input id="address" name="direction" class="controls" type="text" style="padding:.4em;border-radius:.5em;width:88%;background:rgba(108,99,255,0.68);" placeholder=" Introduce tu direccion" required>
                    <div id="map" style="width: 100%; height: 350px;" class="margin-top-1"></div>


                <h6 >Horario</h6>
                  <div class="row">
                    <div class="input-field">
                        <div class="col s6">
                          <input type="text" class="timepicker" name="inicia" placeholder="Inicia">
                        </div>
                    </div>
                    
                     <div class="input-field">
                        <div class="col s6">
                          <input type="text" class="timepicker" name="finaliza" placeholder="Finaliza" >
                        </div>
                    </div>
                  </div>
                  <div>

                    <input type="text" placeholder="longitude (se borrara ya cuando tenga cuenta de google)" name="longitude" id="user_longitude" >
                    <input type="text" placeholder="latitude (se borrara ya cuando tenga cuenta de google)" name="latitude"  id="user_latitude"  >
                    <input type="text" placeholder="city (se borrara ya cuando tenga cuenta de google)" name="city"  id="city"  >
                  </div>
  <div class="card" style="padding: 3em;">
    <h5>Agrega Imagenes</h5>
    <input type="file"  multiple name="images[]" id="gallery-photo-add">
    <div class="gallery" ></div>
  </div>                

<div class="card" style="padding: 3em;">
  <h5>Servicios</h5>
  <p><label>
      <input type="checkbox" name="services[]" value="wifi" />
      <span>Wifi</span>
    </label>
  </p>
  <p>
    <label>
      <input type="checkbox" name="services[]" value="Refrigerador" />
      <span>Refrigerador</span>
    </label>
  </p>
  <p>
    <label>
      <input type="checkbox" name="services[]" value="Asador" />
      <span>Asador</span>
    </label>
  </p>
  <p>
    <label>
      <input type="checkbox" name="services[]" value="Hielera" />
      <span>Hielera</span>
    </label>
  </p>
  <p>
    <label>
      <input type="checkbox" name="services[]" value="Bocina bluetooth" />
      <span>Bocina bluetooth</span>
    </label>
  </p>
   <p>
    <label>
      <input type="checkbox" name="services[]" value="Brincolin" />
      <span>Brincolin</span>
    </label>
  </p>
   <p>
    <label>
      <input type="checkbox" name="services[]" value="Grupos mayores de 4." />
      <span>Grupos mayores de 4.</span>
    </label>
  </p>
</div>

 <div class="input-field">
                        <i class="material-icons prefix">supervisor_account</i>
                        <input id="cellphone"  min="0" max="10" name="peopleLimit" type="tel" pattern="[0-9]+">
                        <label for="peopleLimit">Limites de personas</label>
                    </div>
                </div>
                <p class="padding-1">
                  <label>
                    <input type="checkbox" required />
                    <span>Acepto <a class=" modal-trigger" href="#modal1">Terminos y condiciones</a></span>
                  </label>
                </p>
                <p align="right">
                <button  type="submit" class="btn btn-large fondo-principal border-button">Crear Perfil</button>
                </p>
            </div> 
       </form>
    </div>
  </div>
</div>

<script>
  $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img class="imh">')).attr('width',240).attr('src', event.target.result).css("padding","1em").appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>

<script>
     
     
    var valor=document.getElementById("address").value;
      function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:  22.144178, lng: -101.600103},
          zoom: 4,
          mapTypeId: 'roadmap',
          streetViewControl: false,
          mapTypeControl: false,
          fullScreenControl: false,
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('address');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          console.log(valor);
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: "https://i.ibb.co/QjQJrrq/mercado-1.png",
              size: new google.maps.Size(50, 50),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(0, 0),
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            document.getElementById('user_longitude').value =  place.geometry.location.lng();
            document.getElementById('user_latitude').value  =  place.geometry.location.lat();
           
            console.log(place.geometry.location.lat());
            console.log(place.geometry.location.lng());

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }

</script>

     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOlpW1fYkGXKr6K4ZzU7j1VTO4DCcrueI&libraries=places&callback=initAutocomplete"
         async defer></script> 


@endsection