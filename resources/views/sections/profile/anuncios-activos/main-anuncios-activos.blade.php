@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
    	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-4">
			@include('sections.profile.menu-izquierdo-profile')
		</div>
		<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 mt-4">
			<div id="accordion">
				<div class="card">
					<div class="card-header bg-danger" id="AnunciosActivos" data-toggle="collapse" data-target="#anunciosActivos" aria-expanded="true" aria-controls="anunciosActivos" style="cursor: pointer;">
						<h4 class="mb-0 text-white">
							Mis anuncios activos
						</h4>
					</div>
					<div id="anunciosActivos" class="collapse py-3 show" aria-labelledby="AnunciosActivos" data-parent="#accordion">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 px-4">
								@include('sections.profile.anuncios-activos.anuncios-activos')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection

