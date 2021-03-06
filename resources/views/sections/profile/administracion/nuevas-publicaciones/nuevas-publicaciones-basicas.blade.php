<div class="card-body align-self-center border">
	<span class="text-right"><medium ><strong>{{$inactive_basic_count_slideshow}} nuevas publicaciones.</strong></medium></span>
	<h3 class="py-3">Nuevas publicaciones <span class="bg-danger text-white px-2 rounded">Básicas</span></h3>
	<div class="w-100"><input type="text" id="searchPublicacionesBasicas" onkeyup="myFunctionPremium()" placeholder="Buscar por número de referencia..." title="Número de referencia"></div>
	<table class="table table-hover table-responsive" id="myTablePublicacionesBasicas">
		<thead>
			<tr>
				<th scope="col">Referencia</th>
				<th scope="col">Estado</th>
				<th scope="col">Tipo</th>
				<th scope="col">Ciudad</th>
				<th scope="col">fecha de publicación</th>
				<th scope="col">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@foreach($new_basic_publicity as $slider)
				<tr>
					<td scope="row"><strong>{{$slider->id}}</strong></td>

					<td scope="row">
						@if($slider->status) 
							<a href="" title="Hacer click para desactivar publicación" style="text-decoration: none;" class="text-success">
								<i class="fas fa-check"></i>
							</a> 
						@else 
							<a href="{{ url('profile/administracion/activar-publicacion/') }}/{{$slider->id}}" title="Hacer click para activar publicación" style="text-decoration: none;" class="text-danger">
								<i class="fas fa-times" ></i>
							</a> 
						@endif
					</td>
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
					<td scope="row">{{$slider->creation_date}}</td>
					<td scope="row">
						<a href="{{ url('profile/administracion/editar-rotador-principal/') }}/{{$slider->id}}" title="Editar anuncio"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
						<a href="{{ url('profile/administracion/eliminar-publicidad/') }}/{{$slider->id}}" style="cursor: pointer;" data-toggle="modal" data-target="#basicas"  title="Eliminar anuncio"><i class="fas fa-trash-alt"></i></a>
					</td>
				</tr>
				<!-- Modal -->
				<div class="modal fade" id="basicas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
				        <h5 class="modal-title" id="exampleModalLabel">¿Desea eliminar este anuncio?</h5>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
				        <a class="btn btn-outline-success" href="{{ url('profile/administracion/eliminar-publicidad/') }}/{{$slider->id}}"  title="Eliminar anuncio"><i class="fas fa-trash-alt"></i> Eliminar</a>
				      </div>
				    </div>
				  </div>
				</div>
			@endforeach
		</tbody>
	</table>

	<div class="row px-1">
    			<div class="col-md-6 offset-md-3">
			<div >{{ $new_basic_publicity->links() }}</div>
		</div>
	</div>
</div>

<script>
function myFunctionPremium() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchPublicacionesBasicas");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTablePublicacionesBasicas");
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
	#searchPublicacionesBasicas {
	  background-position: 10px 10px;
	  background-repeat: no-repeat;
	  width: 100%;
	  font-size: 16px;
	  padding: 12px 20px 12px 40px;
	  border: 1px solid #ddd;
	  margin-bottom: 12px;
	}	
</style>