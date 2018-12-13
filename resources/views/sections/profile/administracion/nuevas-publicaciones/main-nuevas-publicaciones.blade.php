@extends('layouts.app')

@if(Auth::getUser()->role_id == 2)
	@section('content')
		<div class="container-fluid">
		    <div class="row ">
		    	<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-4">
					@include('sections.profile.menu-izquierdo-profile')
				</div>
				<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-xs-12 mt-4">

					@include('sections.profile.botones-comprar.botones')
					<div id="accordion">
						@include('sections.profile.administracion.nuevas-publicaciones.nuevas-publicaciones-rotador-principal')
						@include('sections.profile.administracion.nuevas-publicaciones.nuevas-publicaciones-rotador-premium')
						@include('sections.profile.administracion.nuevas-publicaciones.nuevas-publicaciones-basicas')
					</div>
				</div>
		    </div>
		</div>
	@endsection
@endif