@extends('layouts.app')

@if(Auth::getUser()->role_id == 2 || Auth::getUser()->role_id == 1)
	@section('content')
		<div class="container-fluid">
		    <div class="row ">
		    	<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-4">
					@include('sections.profile.menu-izquierdo-profile')
				</div>
				<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-xs-12 mt-4">
					@include('sections.profile.botones-comprar.botones')
					@include('sections.profile.administracion.nuevas-publicaciones.main-nuevas-publicaciones')
					@include('sections.profile.administracion.rotador-principal.main-rotador-principal')
				</div>
		    </div>
		</div>
	@endsection
@endif

@section('script')
	<script src="{{ asset('js/datepicker.js') }}"></script>
	<script src="{{ asset('js/datepicker.es.js') }}"></script>
@endsection