<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
   <div class="row">
   	<div class="col m4 offset-m4">
   	 <form action="{{ route('create_reservation')  }}">
			<input type="text" value="550" name="price">
			<input type="text" value="reserva ajja" name="description">
			<input type="text" class="datepicker"  name="day">
			<input type="submit">
		</form>
   	</div>
   </div>


 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
    $('.datepicker').datepicker({
    	format: "dd/mm/yyyy",
    	i18n: {
    		 months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                weekdays: ["Domingo","Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                weekdaysShort: ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                weekdaysAbbrev: ["D","L", "M", "M", "J", "V", "S"],
            cancel: 'Cancelar',
            clear: 'Limpar',
            done: 'Ok'
        },
    });
  });
          
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
