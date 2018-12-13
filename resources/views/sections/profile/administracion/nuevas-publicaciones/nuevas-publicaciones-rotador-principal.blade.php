<div class="card">
	<div class="card-header bg-danger" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="cursor: pointer;">
		<h4 class="mb-0 text-white">
			Nuevas publicaciones <span class="bg-white text-danger px-2 rounded">Rotador Principal</span>
		</h4>
	</div>

	<div id="collapseOne" class="collapse show align-self-center" aria-labelledby="headingOne" data-parent="#accordion">
		<div class="card-body">
			<table class="table table-hover table-responsive">
				<thead>
					<tr>
						<th scope="col">#Referencia</th>
						<th scope="col">Ciudad</th>
						<th scope="col">fecha de publicación</th>
						<th scope="col">Handle</th>
					</tr>
				</thead>
				<tbody>
					@foreach($slideshow as $slider)
						<tr class="text-center">
							<th scope="row">{{$slider->id}}</th>
							<td>{{$slider->city_id}}</td>
							<td>{{$slider->creation_date}}</td>
							<td>@mdo</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="align-content-end">{{ $slideshow->links() }}</div>
		</div>
	</div>
</div>