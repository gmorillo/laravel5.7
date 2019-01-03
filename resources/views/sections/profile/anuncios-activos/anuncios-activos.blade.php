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
				<th scope="col"><i class="fas fa-calendar-alt"></i> Desde </th>
				<th scope="col"><i class="fas fa-calendar-alt"></i> Hasta </th>
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
								@elseif($slider->publicity_type == 2) 
									Básicos 
								@endif
							</strong>
						</small>
					</td>
					<td scope="row">@if($slider->status)<i class="fas fa-check text-success" title="Activo"></i> @else <i class="fas fa-times text-success" ></i> @endif</td>
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
					<td scope="row"><small>{{$slider->publish_date}}</small></td>
					<td scope="row"><small>{{$slider->unpublish_date}}</small></td>
					<td scope="row">
						<a href="{{ url('profile/editar-rotador-principal/') }}/{{$slider->id}}" title="Editar anuncio"><i class="fas fa-edit"></i> <small>Editar</small></a>
					</td>
				</tr>
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
</style>