@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col s12 offset-m3 m6">
        <center>
            
        <img src="{{ asset('img/images.svg') }}" alt="" style="width: 60%;">
        </center>
        <p class="bold color-principal" style="font-size: 1.7em;">Agregas más fotos a tu terraza.</p>
<p style="font-size: 1.4em;">Te recomendamos que agregues entre 4 a 6 imagenes para que los clientes puedan ver con más detalle el lugar.</p>
<p>Tus fotos</p>
@foreach($images as $image)
    <img src="{{ $image->image }}" alt="" width="220">
@endforeach
<form action="{{ route('saveImages') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="negocioId" value="{{$negocioId}}">
<input type="file"  accept="image/*" multiple name="image[]" id="gallery-photo-add"  style="padding: 4em;" required="">
<div class="gallery" ></div>
<input type="submit" value="Enviar Fotos" class="btn fondo-principal" style="width: 100%;">
</form>

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
                    $($.parseHTML('<img>')).attr('width',240).attr('src', event.target.result).css("padding","1em").appendTo(placeToInsertImagePreview);
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
@endsection