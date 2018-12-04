@extends('layouts.app')

@section('content')
<div class="container p-0">
    <div class="row ">
    	<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 mt-4">
			@include('sections.profile.menu-izquierdo-profile')
		</div>
		<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 mt-4">
			@include('sections.profile.botones-comprar.botones')
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi maxime unde saepe velit soluta reprehenderit, consequuntur necessitatibus porro magni veniam atque recusandae minus dicta qui quo, dolorum, cumque earum. Consectetur expedita voluptatum ullam reprehenderit debitis, excepturi unde, vero ipsum odio molestias a quas porro, in aliquid enim atque magnam cum.</p>
		</div>
    </div>
</div>


@endsection
