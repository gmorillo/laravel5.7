<div class="container">
	<form @if(Auth::getUser()->role_id == 2 || Auth::getUser()->role_id == 1) action="create-slider" @else action="profile/create-slider" @endif method="POST" enctype="multipart/form-data">
		@csrf
		<input type="text" class="form-control" hidden="hidden" id="country_id" value="1">
		<input type="text" class="form-control" hidden="hidden" id="tipo_publicidad" name="tipo_publicidad" value="1"> <!-- ROTADOR PRINCIPAL -->
		<div class="dashborad-box">
			<h4 class="py-3">Datos del anuncio</h4>
			<div class="row ">
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
		            	<label for="title" class="col-form-label">Título del anuncio</label>
		            	<input type="text" class="form-control" id="title" name="title" required="required">
		          	</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="form-group">
		            	<label for="mail" class="col-form-label">Correo electronico <small>(Opcional)</small></label>
		            	<input type="email" class="form-control" id="mail" name="mail" required="required">
		          	</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
					<label for="category_id" class="col-form-label">¿Sexualidad donde quieres que aparezca tu anuncio?</label>
		        	<select class="custom-select" id="category_id" name="category_id" required="require">
		    			<option></option>
		    			@foreach($category as $categories)
							<option value="{{$categories->id}}">{{$categories->name}}</option>
						@endforeach
		  			</select>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
					<label for="city_id" class="col-form-label">¿Ciudad donde quieres que aparezca tu anuncio?</label>
				        	<select class="custom-select" id="city_id" name="city_id" required="require">
				    			<option></option>
				    			@foreach($city as $cities)
							<option value="{{$cities->id}}">{{$cities->name}}</option>
						@endforeach
				  			</select>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 pt-2">
					<div class="form-group">
		            	<label for="phone" class="col-form-label">Teléfono</label>
		            	<input type="number" class="form-control" id="phone" name="phone" required="required">
		          	</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 pt-2">
					<div class="form-group">
		            	<label for="langues" class="col-form-label">Idiomas </label> <br>
		            	<input type="text" class="form-control" id="langues" name="langues" placeholder="Español, Ingles, Italiano, Portugues, Etc...">
		          	</div>
				</div>
			</div>
		</div>
		<div class="form-group py-3 dashborad-box" style="overflow: hidden;">
			<h4 class="py-3">Imagen principal de tu anuncio <span><a tabindex="0" class="btn btn-md btn-primary" role="button" data-toggle="popover" data-trigger="focus" title="Información adicional" data-content="La imágen principal debe ser una imágen horizontal para una mejor visualización del anuncio. se recomienda que las 5 imágenes secundarias sean verticales. (Opcional)"><i class="fas fa-info"></i></a></span></h4>
	    	<div class="input-group">
	            
	            <div class="mx-3">
	            	<input type="file" name="principal_img"  id="gallery-photo-add" max="2">
					<div class="gallery"></div>
	            </div>
	    	</div>
	  	</div>
	  	<div class="form-group py-3 dashborad-box" style="overflow: hidden;">
			<!--<h4 class="py-3">Agregar más imágenes</h4>-->
    		<div class="row">
    			<div class="uploader__box js-uploader__box l-center-box">
	                <div class="uploader__contents">
	                    <label class="button button--secondary" for="fileinput">Select Files</label>
	                    <input id="fileinput" class="uploader__file-input" type="file" multiple name="secondary_img[]">
	                </div>
	        	</div>
	            <!--<div class="mx-3">
	            	<input type="file" name="secondary_img[]" multiple id="gallery-photo-add" max="2">
					<div class="gallery"></div>
	            </div>-->
    		</div>
    		
	  	</div>
	  	<div class="form-group dashborad-box py-3">
	    	<label for="description" class="col-form-label "><h4>Descripción del anuncio</h4></label>
	    	<textarea class="form-control" rows="5" id="description" name="description" required="required"></textarea>
	  	</div>
	  	<div class="form-group dashborad-box py-3">
	    	<label for="description" class="col-form-label "><h4>Rango de fechas del anuncio</h4></label>
	    	<div class="input-group mb-2 mr-sm-2">
				<input 	type="text"
				    data-range="true"
				    data-multiple-dates-separator=" - "
				    data-language="en"
				    class="datepicker-here form-control" id="fecha-anuncios-principal" required  placeholder="Selecciona el rango de fecha en la que será visible tú anuncio"/>
			    <div class="input-group-prepend">
					<div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
				</div>
			</div>
	    	
	  	</div>
		<div class="form-group dashborad-box py-3">
	    	<label for="description" class="col-form-label "><h4>Rango de horas del anuncio</h4></label>
	    	<div class="row">
	    		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
	    			<div class="inputGroup" style="border:1px solid #cecccc;">
					    <input id="12AM-6AM-RT" name="12AM-6AM-RT" type="checkbox" checked/>
					    <label for="12AM-6AM-RT" class="m-0">DE 12:00AM a 6:00AM <br> <small>De 12 de la noche a 6 de la mañana</small></label>
				  	</div>
				  	<div class="inputGroup" style="border:1px solid #cecccc;">
						<input id="6AM-12PM-RT" name="6AM-12PM-RT" type="checkbox"/>
						<label for="6AM-12PM-RT" class="m-0">DE 6:00AM a 12:00PM <br> <small>De 6 de la mañana a 12 del medio día</small></label>
					</div>
	    		</div>
	    		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
	    			<div class="inputGroup" style="border:1px solid #cecccc;">
					    <input id="12PM-6PM-RT" name="12PM-6PM-RT" type="checkbox"/>
					    <label for="12PM-6PM-RT" class="m-0">DE 12:00PM a 6:00PM <br> <small>De 12 del medio día a 6 de la tarde</small></label>
				  	</div>
				  	<div class="inputGroup" style="border:1px solid #cecccc;">
						<input id="6PM-12AM-RT" name="6PM-12AM-RT" type="checkbox"/>
						<label for="6PM-12AM-RT" class="m-0">DE 6:00PM a 12:00AM <br> <small>De 6 de la tarde a 12 de la noche</small></label>
					</div>
	    		</div>
	    	</div>
	    </div>
	  	<div class="row justify-content-center">
	  		<button class="btn btn-success btn-lg" type="submit">Tramitar pedido</button>
	  	</div>
	</form>
</div>

<style>
	.dashborad-box {
	    padding: 12px;
	    margin-bottom: 30px;
	    -webkit-box-shadow: 0 0 20px rgba(38,38,38,.2);
	    box-shadow: 0 0 20px rgba(38,38,38,.2);
	}

	.inputGroup {
	  background-color: #fff;
	  display: block;
	  margin: 10px 0;
	  position: relative;
	}
	.inputGroup label {
	  padding: 12px 30px;
	  width: 100%;
	  display: block;
	  text-align: left;
	  color: #3C454C;
	  cursor: pointer;
	  position: relative;
	  z-index: 2;
	  transition: color 200ms ease-in;
	  overflow: hidden;
	}
	.inputGroup label:before {
	  width: 10px;
	  height: 10px;
	  border-radius: 50%;
	  content: '';
	  background-color: #38c172;
	  position: absolute;
	  left: 50%;
	  top: 50%;
	  -webkit-transform: translate(-50%, -50%) scale3d(1, 1, 1);
	          transform: translate(-50%, -50%) scale3d(1, 1, 1);
	  transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
	  opacity: 0;
	  z-index: -1;
	}
	.inputGroup label:after {
	  width: 32px;
	  height: 32px;
	  content: '';
	  border: 2px solid #D1D7DC;
	  background-color: #fff;
	  background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
	  background-repeat: no-repeat;
	  background-position: 2px 3px;
	  border-radius: 50%;
	  z-index: 2;
	  position: absolute;
	  right: 30px;
	  top: 50%;
	  -webkit-transform: translateY(-50%);
	          transform: translateY(-50%);
	  cursor: pointer;
	  transition: all 200ms ease-in;
	}
	.inputGroup input:checked ~ label {
	  color: #fff;
	}
	.inputGroup input:checked ~ label:before {
	  -webkit-transform: translate(-50%, -50%) scale3d(56, 56, 1);
	          transform: translate(-50%, -50%) scale3d(56, 56, 1);
	  opacity: 1;
	}
	.inputGroup input:checked ~ label:after {
	  background-color: #54E0C7;
	  border-color: #54E0C7;
	}
	.inputGroup input {
	  width: 32px;
	  height: 32px;
	  order: 1;
	  z-index: 2;
	  position: absolute;
	  right: 30px;
	  top: 50%;
	  -webkit-transform: translateY(-50%);
	          transform: translateY(-50%);
	  cursor: pointer;
	  visibility: hidden;
	}

</style>
<script>
$(function(){
            var options = {};
            $('.js-uploader__box').uploader(options);
        }());
</script>
<script>
	
    $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).addClass('w-25 mx-1 my-2').appendTo(placeToInsertImagePreview);
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

<script type="text/javascript">
	// Initialization
	$('#fecha-anuncios-principal').datepicker([{
		language: 'es',
		range: true, 
		toggleSelected: false,

	}]);

	$('#fecha-anuncios-principal').datepicker({
	    language: 'es',
	    minDate: new Date(), // Now can select only dates, which goes after today
	    clearButton: true,
	})

	// Access instance of plugin
	$('#fecha-anuncios-principal').data('datepicker');



</script>

