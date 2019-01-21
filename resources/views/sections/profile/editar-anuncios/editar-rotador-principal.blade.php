@extends('layouts.app')


	@section('content')
		<div class="container">
		    <div class="row ">
		    	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-4">
					@include('sections.profile.menu-izquierdo-profile')
				</div>
				<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 mt-4">
					<div class="container">
						@foreach($active_slideshow as $slider)
							<form action="/profile/administracion/edit-slider/{{$slider->id}}" method="POST" enctype="multipart/form-data" style="background-color: white;">
								@csrf
								<input type="hidden" name="publicity_type" id="publicity_type" value="{{$slider->publicity_type}}">
								<input type="text" class="form-control" hidden="hidden" id="country_id" value="1">
								<div class="dashborad-box" >
									<h4 class="py-3">Editar datos del anuncio</h4>
									<div class="row ">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
								            	<label for="title" class="col-form-label">Título del anuncio</label>
								            	<input type="text" class="form-control" id="title" name="title" value="{{$slider->title}}" >
								          	</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<div class="form-group">
								            	<label for="mail" class="col-form-label">Correo electronico <small>(Opcional)</small></label>
								            	<input type="email" class="form-control" id="mail" name="mail"  
								            	value="{{$slider->mail}}">
								          	</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
											<label for="category_id" class="col-form-label">¿Donde quieres que aparezca tu anuncio?</label>
								        	<select class="custom-select" id="category_id" name="category_id" >
								    			@foreach($category as $categories)
								    				@if($slider->category_id == $categories->id)
														<option value="{{$categories->id}}" selected="selected">{{$categories->name}}</option>
														@else
														<option value="{{$categories->id}}">{{$categories->name}}</option>
													@endif
												@endforeach
								  			</select>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
											<label for="city_id" class="col-form-label">¿Ciudad donde quieres que aparezca tu anuncio?</label>
								        	<select class="custom-select" id="city_id" name="city_id" >
								    			@foreach($city as $cities)
													@if($slider->city_id == $cities->id)
														<option value="{{$cities->id}}" selected="selected">{{$cities->name}}</option>
														@else
														<option value="{{$cities->id}}">{{$cities->name}}</option>
													@endif
												@endforeach
								  			</select>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 pt-2">
											<div class="form-group">
								            	<label for="phone" class="col-form-label">Teléfono</label>
								            	<input type="number" class="form-control" id="phone" name="phone" value="{{$slider->phone}}" >
								          	</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 pt-2">
											<div class="form-group">
								            	<label for="langues" class="col-form-label">Idiomas </label> <br>
								            	<input type="text" class="form-control" id="langues" name="langues" value="{{$slider->langues}}">
								          	</div>
										</div>
									</div>
								</div>
								<div class="form-group py-3 dashborad-box" style="overflow: hidden;">
									<h4 class="py-3">Actualizar imagen principal de tu anuncio</h4>
							    	<div class="input-group">
							            <div class="mx-3 ">
							            	<input type="file" name="principal_img"  id="gallery-photo-add">
							            	<img src="/img/rotador-principal/{{$slider->principal_img}}" alt="" class="img-fluid w-100 mt-3">
											<div class="gallery"></div>
							            </div>
							    	</div>
							  	</div>
							  	<div class="form-group py-3 dashborad-box" style="overflow: hidden;">
						    		<div class="row">
						    			<div class="uploader__box js-uploader__box l-center-box">
						    				<ul class="js-uploader__file-list uploader__file-list">
												<li class="uploader__file-list__item" data-index="0">
													<span class="uploader__file-list__thumbnail">
														@foreach($photos_slideshow as $secondary_img)
														<img src="/img/rotador-principal/imagenes_secundarias/{{$secondary_img->img}}" class="thumbnail">
														@endforeach
													</span>
												</li>
											</ul>
						        		</div>
						    		</div>
							  	</div>
							  	<div class="form-group dashborad-box py-3">
							    	<label for="description" class="col-form-label "><h4>Editar descripción del anuncio</h4></label>
							    	<textarea class="form-control" rows="5" id="description" name="description">{{$slider->description}}</textarea>
							  	</div>
							  	<div class="row justify-content-center">
							  		<button class="btn btn-success btn-lg" type="submit">Editar</button>
							  	</div>
							</form>
						@endforeach
					</div>
				</div>
		    </div>
		</div>
	@endsection
<style>
	.dashborad-box {
	    padding: 12px;
	    margin-bottom: 30px;
	    -webkit-box-shadow: 0 0 20px rgba(38,38,38,.2);
	    box-shadow: 0 0 20px rgba(38,38,38,.2);
	}

</style>
@section('script')
	<script>
		$(function(){
	        var options = {};
	        $('.js-uploader__box').uploader(options);
	    }());

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

		function goBack() {
		    window.history.back();
		}
	</script>
@endsection