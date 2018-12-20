<div class="container">
	<form @if(Auth::getUser()->role_id == 2 || Auth::getUser()->role_id == 1) action="create-slider" @else action="profile/create-slider" @endif method="POST" enctype="multipart/form-data">
		@csrf
		<input type="text" class="form-control" hidden="hidden" id="country_id" value="1">
		<input type="text" class="form-control" hidden="hidden" id="tipo_publicidad" name="tipo_publicidad" value="2"> <!-- ROTADOR PRINCIPAL -->
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
			<h4 class="py-3">Imagen principal de tu anuncio</h4>
	    	<div class="input-group">
	            <div class="mx-3">
	            	<input type="file" name="principal_img"  id="premium" max="2">
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
	            	<input type="file" name="secondary_img[]" multiple id="premium-gallery-photo-add" max="2">
					<div class="gallery"></div>
	            </div>-->
    		</div>
	  	</div>
	  	<div class="form-group dashborad-box py-3">
	    	<label for="description" class="col-form-label "><h4>Descripción del anuncio</h4></label>
	    	<textarea class="form-control" rows="5" id="description" name="description" required="required"></textarea>
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

    $('#premium').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
});
</script>