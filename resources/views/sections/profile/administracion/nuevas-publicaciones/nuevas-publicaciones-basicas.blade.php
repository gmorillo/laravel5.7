<div class="card-body align-self-center border">
	<span class="text-right"><medium ><strong>{{$inactive_count_slideshow}} nuevas publicaciones.</strong></medium></span>
	<h3 class="py-3">Nuevas <span class="bg-danger text-white px-2 rounded">Publicaciones Básicas</span></h3>
	<div class="w-100"><input type="text" id="myInputBasic" onkeyup="myFunctionBasic()" placeholder="Buscar por número de referencia..." title="Número de referencia"></div>
	<table class="table table-hover table-responsive" id="myTableBasic">
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
			@foreach($inactive_slideshow as $slider)
				<tr>
					<td scope="row"><strong>{{$slider->id}}</strong></td>

					<td scope="row">@if($slider->status) <a href="#active" title="Hacer click para desactivar publicación" style="text-decoration: none;" class="text-success"><i class="fas fa-check"></i></a> @else <a href="#inactive" title="Hacer click para activar publicación" style="text-decoration: none;" class="text-danger"><i class="fas fa-times" ></i></a> @endif</td>
					<td scope="row">{{$slider->category_id}}</td>
					<td scope="row">{{$slider->city_id}}</td>
					<td scope="row">{{$slider->creation_date}}</td>
					<td scope="row">
						<a href="#" title="Editar anuncio"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
						<a href="#" title="Eliminar anuncio"><i class="fas fa-trash-alt"></i></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="row px-1">
    			<div class="col-md-6 offset-md-3">
			<div >{{ $inactive_slideshow->links() }}</div>
		</div>
	</div>
</div>

<script>
function myFunctionBasic() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputBasic");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTableBasic");
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
	#myInputBasic {
	  background-position: 10px 10px;
	  background-repeat: no-repeat;
	  width: 100%;
	  font-size: 16px;
	  padding: 12px 20px 12px 40px;
	  border: 1px solid #ddd;
	  margin-bottom: 12px;
	}	
</style>