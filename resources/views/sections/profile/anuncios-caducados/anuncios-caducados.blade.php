@if (session('slider'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <p class="mb-0"><strong>{{ session('slider') }}</strong></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="card-body align-self-center ">
	<div class="w-100"><input type="text" id="myInputActive" onkeyup="myFunctionBasic()" placeholder="Buscar por número de referencia..." title="Número de referencia"></div>
	<table class="table table-hover table-responsive" id="myTableActive">
		<thead>
			<tr>
				<th scope="col">Ref.</th>
				<th scope="col">Publicado en</th>
				<th scope="col">Estado</th>
				<th scope="col">Categoría</th>
				<th scope="col">Ciudad</th>
				<th scope="col"><i class="fas fa-calendar-alt"></i> Caducó el </th>
				<th scope="col">&nbsp;</th>

			</tr>
		</thead>
		<tbody>
			@foreach($data as $slider)
				<tr>
					<td scope="row"><strong>{{$slider->id}}</strong></td>
					<td scope="row">
						<small>
							<strong>
								@if($slider->publicity_type == 1)
									Rotador Principal 
								@elseif($slider->publicity_type == 2) 
									Rotador Premium 
								@elseif($slider->publicity_type == 3) 
									Básicos 
								@endif
							</strong>
						</small>
					</td>
					<td scope="row">@if($slider->status)<i class="fas fa-check text-danger" title="Activo"></i> @else <i class="fas fa-times text-danger" title="Inactivo" ></i> @endif</td>
					<td scope="row">
						@foreach($category as $cat)
							<small>
								@if($slider->category_id == $cat->id)
									{{$cat->name}}
								@endif
							</small>
						@endforeach
					</td>
					<td scope="row">
						@foreach($city as $ciudad)
							<small>
								@if($slider->city_id == $ciudad->id)
									{{$ciudad->name}}
								@endif
							</small>
						@endforeach
					</td>
					<td scope="row"><small>{{$slider->unpublish_date}}</small></td>
					<td scope="row">
						@if($slider->time_activated != NULL && $slider->status == 0)
							<a href="{{ url('/profile/rebuy') }}/{{$slider->id}}" title="Si quieres volver a reactivar este anuncio, haz click aqui!!!" class="text-white btn  btn-success"><i class="fas fa-redo-alt text-white"></i> <small>Volver a comprar</small></a>
						@else
						<p class="badge badge-warning w-100"><span class="py-2 px-1 "><i class="fas fa-pause-circle" ></i> en espera de pago</span></p>
						@endif
						<br> <a href="" data-toggle="modal" data-target=".bd-example-modal-lg-{{$slider->id}}"><small class="text-right bg-info text-white badge-pill">Ver anuncio</small></a>
					</td>
				</tr>

				<div class="modal fade bd-example-modal-lg-{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg">
				    <div class="modal-content p-3">
						<div class="dashborad-box" >
							<h4 class="py-3">Datos del anuncio</h4>
							<div class="row ">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
						            	<label for="title" class="col-form-label">Título del anuncio</label>
						            	<input readonly type="text" class="form-control" id="title" name="title" value="{{$slider->title}}" >
						          	</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<div class="form-group">
						            	<label for="mail" class="col-form-label">Correo electronico <small>(Opcional)</small></label>
						            	<input readonly type="email" class="form-control" id="mail" name="mail"  
						            	value="{{$slider->mail}}">
						          	</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
									<label for="category_id" class="col-form-label">¿Donde quieres que aparezca tu anuncio?</label>
						        	<select disabled="disabled" class="custom-select" id="category_id" name="category_id" >
						    			
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
						        	<select disabled="disabled" class="custom-select" id="city_id" name="city_id" >
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
						            	<input readonly type="number" class="form-control" id="phone" name="phone" value="{{$slider->phone}}" >
						          	</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 pt-2">
									<div class="form-group">
						            	<label for="langues" class="col-form-label">Idiomas </label> <br>
						            	<input readonly type="text" class="form-control" id="langues" name="langues" value="{{$slider->langues}}">
						          	</div>
								</div>
							</div>
						</div>
						<div class="form-group py-3 dashborad-box" style="overflow: hidden;">
							<h4 class="py-3">Imágenes del anuncio</h4>
					    	<div class="input-group">
					            <div class="mx-3 ">
					            	<img src="/img/rotador-principal/{{$slider->principal_img}}" alt="" class="img-fluid w-auto mt-3" style="height: 235px;">
									@foreach($photos_slideshow as $secondary_img)
										@if($secondary_img->slideshow_id == $slider->id)
											<img src="/img/rotador-principal/imagenes_secundarias/{{$secondary_img->img}}" class="w-auto mt-3" style="height: 235px;">
										@endif
									@endforeach
					            </div>
					    	</div>
					  	</div>

					  	<div class="form-group dashborad-box py-3">
					    	<label for="description" class="col-form-label "><h4>Descripción del anuncio</h4></label>
					    	<textarea disabled class="form-control" rows="5" id="description" name="description">{{$slider->description}}</textarea>
					  	</div>
					  	<div class="row justify-content-center">
					  		<a href="{{ url('/profile/rebuy') }}/{{$slider->id}}" class="btn btn-success btn-lg" type="submit">Volver a comprar</a>
					  	</div>
				    </div>
				  </div>
				</div>
			@endforeach
		</tbody>
	</table>

	<div class="row px-1">
		<div class="col-md-6 offset-md-3">
			<div >{{ $data->links() }}</div>
		</div>
	</div>
</div>

<script>
function myFunctionBasic() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputActive");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTableActive");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


<style>
	#myInputActive {
	  background-position: 10px 10px;
	  background-repeat: no-repeat;
	  width: 100%;
	  font-size: 16px;
	  padding: 12px 20px 12px 40px;
	  border: 1px solid #ddd;
	  margin-bottom: 12px;
	}	

	.dashborad-box {
	    padding: 12px;
	    margin-bottom: 30px;
	    -webkit-box-shadow: 0 0 20px rgba(38,38,38,.2);
	    box-shadow: 0 0 20px rgba(38,38,38,.2);
	}
</style>
