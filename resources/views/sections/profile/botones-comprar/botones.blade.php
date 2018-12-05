@if (session('slider'))
    <div class="alert alert-success">
        {{ session('slider') }}
    </div>
@endif
<div class="mb-4">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title text-danger"><strong>Comprar anuncio en Rotador Principal</strong></h5>
					<p class="card-text">Lleva tus anuncios a otro nivel, aumenta tus visitas hasta en <strong class="text-danger">100%.</strong></p>
					<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Comprar anuncio Rotador Principal</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="mb-4">
	<div class="row">
		<div class="col-sm-6 mb-4">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title text-danger"><strong>Comprar anuncio Premium</strong></h5>
					<p class="card-text">Tu anuncio aparece en las primeras posiciones de nuestra sección premium. Aumenta tus visitas en un <strong class="text-danger">90%.</strong></p>
					<a href="#" class="btn btn-danger">Comprar anuncio Premium</a>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title text-danger"><strong>Comprar anuncio Basic</strong></h5>
					<p class="card-text">Tu anuncio aparece cada 1 hora en las primeras posiciones de nuestra sección basic. Aumenta tus visitas en un <strong class="text-danger">80%.</strong></p>
					<a href="#" class="btn btn-danger">Comprar anuncio Basic</a>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLongTitle">Anuncio en Rotador Principal</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	        	@include('sections.formularios.form-rotador-principal')
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	      	</div>
	    </div>
  	</div>
</div>

<style>
	.card {
	    position: relative;
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    -webkit-box-orient: vertical;
	    -webkit-box-direction: normal;
	    -ms-flex-direction: column;
	    flex-direction: column;
	    min-width: 0;
	    word-wrap: break-word;
	    background-color: #fff;
	    background-clip: border-box;
	    border: 1px solid rgba(255, 0, 0, 0.23);
	    border-radius: 0.25rem;
	}
</style>