<div class="container">
	<form action="profile/create-slider" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="text" class="form-control" hidden="hidden" id="country_id" value="1">
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
				        	<select class="custom-select" id="category_id" name="category_id" required="required">
				    			<option selected>Seleccionar sexualidad</option>
				    			@foreach($category as $categories)
							<option value="{{$categories->id}}">{{$categories->name}}</option>
						@endforeach
				  			</select>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
					<label for="city_id" class="col-form-label">¿Ciudad donde quieres que aparezca tu anuncio?</label>
				        	<select class="custom-select" id="city_id" name="city_id" required="required">
				    			<option selected>Seleccionar ciudad.</option>
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
	            <div class="custom-file">
	                <input type="file" class="" name="principal_img" id="principal_img" required="required">
	            </div>
	    	</div>
	  	</div>
	  	<div class="form-group py-3 dashborad-box" style="overflow: hidden;">
			<h4 class="py-3">Agregar más imágenes</h4>
    		<div class="row">
	            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
	            	<div class="custom-file">
	            	    <input type="file" class="" name="secondary_img1" id="secondary_img1">
	            	</div>
	            </div>
	            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
	            	<div class="custom-file">
	            	    <input type="file" class="" name="secondary_img2" id="secondary_img2">
	            	</div>
	            </div>
	            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
	            	<div class="custom-file">
	            	    <input type="file" class="" name="secondary_img3" id="secondary_img3">
	            	</div>
	            </div>
	            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
	            	<div class="custom-file">
	            	    <input type="file" class="" name="secondary_img4" id="secondary_img4">
	            	</div>
	            </div>
	            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
	            	<div class="custom-file">
	            	    <input type="file" class="" name="secondary_img5" id="secondary_img5">
	            	</div>
	            </div>
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