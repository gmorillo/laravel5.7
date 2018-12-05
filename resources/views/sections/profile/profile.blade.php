@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
    	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-4">
			@include('sections.profile.menu-izquierdo-profile')
		</div>
		<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 mt-4">
			@include('sections.profile.botones-comprar.botones')
		</div>
    </div>
</div>
@endsection