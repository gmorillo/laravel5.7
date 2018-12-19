<div id="accordion" class="mt-2">
	<div class="card">
		<div class="card-header bg-danger" id="RotadorPrincipal" data-toggle="collapse" data-target="#collapseRotadorPrincipal" aria-expanded="true" aria-controls="collapseRotadorPrincipal" style="cursor: pointer;">
			<h4 class="mb-0 text-white">
				Anuncios de rotador principal
			</h4>
		</div>
		<div id="collapseRotadorPrincipal" class="collapse py-3" aria-labelledby="RotadorPrincipal" data-parent="#accordion">
			<div class="row">
				<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12 px-4">
					@include('sections.profile.administracion.rotador-principal.publicaciones-activas-rotador-principal')
				</div>
				<div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-xs-12 px-4">
					@include('sections.profile.administracion.rotador-principal.publicaciones-inactivas-rotador-principal')
				</div>
			</div>
		</div>
	</div>
</div>


