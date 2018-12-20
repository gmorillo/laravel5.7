@if (session('slider'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="mb-0"><strong>{{ session('slider') }}</strong></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="@if(Auth::getUser()->role_id == 2 || Auth::getUser()->role_id == 1) d-none @else d-block @endif">
	<div class="mb-4">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title text-danger"><strong>Comprar anuncio en Rotador Principal</strong></h5>
						<div class="col-1 p-0 bg-danger"><hr></div>
						<p class="card-text">Lleva tus anuncios a otro nivel, aumenta tus visitas hasta en <strong class="text-danger">100%.</strong></p>
						<a href="#" class="btn btn-danger shadow-button" data-toggle="modal" data-target="#exampleModalCenter">Comprar anuncio Rotador Principal</a>

						<a tabindex="0" class="btn btn-md btn-primary" role="button" data-toggle="popover" data-trigger="focus" title="Información adicional" data-content="Las dimensiones de la imágen principal deben ser de 1920px(ancho) X 850px(alto) como mínimo."><i class="fas fa-info"></i></a>
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
						<div class="col-2 p-0 bg-danger"><hr></div>
						<p class="card-text">Tu anuncio aparece en las primeras posiciones de nuestra sección premium. Aumenta tus visitas en un <strong class="text-danger">90%.</strong></p>
						<a href="#" class="btn btn-danger shadow-button" data-toggle="modal" data-target="#ModalPremium">Comprar anuncio Premium</a>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title text-danger"><strong>Comprar anuncio Basic</strong></h5>
						<div class="col-2 p-0 bg-danger"><hr></div>
						<p class="card-text">Tu anuncio aparece cada 1 hora en las primeras posiciones de nuestra sección basic. Aumenta tus visitas en un <strong class="text-danger">80%.</strong></p>
						<a href="#" class="btn btn-danger shadow-button">Comprar anuncio Basic</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="@if(Auth::getUser()->role_id == 2 || Auth::getUser()->role_id == 1) d-block @else d-none @endif">
	<div class="mb-4">
		<div class="row">
			<div class="col-xl-4 col-md-6 col-sm-4 col-xs-12">
				<div class="card">
					<div class="card-body ">						
						<a href="#" class="btn btn-danger btn-lg shadow-button w-100" data-toggle="modal" data-target="#exampleModalCenter">Crear anuncio Rotador Principal</a>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 col-sm-4 col-xs-12">
				<div class="card">
					<div class="card-body">
						<a href="#" class="btn btn-danger btn-lg shadow-button w-100" data-toggle="modal" data-target="#ModalPremium">Crear anuncio Premium</a>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 col-sm-4 col-xs-12">
				<div class="card">
					<div class="card-body">
						<a href="#" class="btn btn-danger btn-lg shadow-button w-100">Crear anuncio Basic</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Rotador principal-->
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

<!-- Modal Rotador Premium-->
<div class="modal fade" id="ModalPremium" tabindex="-1" role="dialog" aria-labelledby="examplePremiumModalCenterTitle" aria-hidden="true">
  	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLongTitle" >Anuncio en Rotador Premium</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	        	@include('sections.formularios.form-premium')
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
	    box-shadow: 0 0 20px rgba(38,38,38,.2);
	}
</style>