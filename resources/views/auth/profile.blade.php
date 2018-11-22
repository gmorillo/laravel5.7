@extends('layouts.app')

@section('content')
<div class="container  ">
    <div class="row ">
    	<!--<img src="/img/profiles/{{ Auth::user()->profile_img}}" alt="">-->
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi maxime unde saepe velit soluta reprehenderit, consequuntur necessitatibus porro magni veniam atque recusandae minus dicta qui quo, dolorum, cumque earum. Consectetur expedita voluptatum ullam reprehenderit debitis, excepturi unde, vero ipsum odio molestias a quas porro, in aliquid enim atque magnam cum.</p>
        <form action="/profile" method="POST" enctype="multipart/form-data">
        	@csrf
			<!--<div class="form-group">
        		<input type="file" name="profile_img">
        		<input type="submit" class="float-right btn-sm btn btn-file btn-outline-primary" value="Enviar">
			</div>-->
			<div class="input-group">
				<div class="custom-file">
					<input type="file" class="custom-file-input bnn btn-outline-secondary" name="profile_img" id="profile_img">
					<label class="custom-file-label" for="profile_img">Seleccionar imágen</label>
				</div>
				<div class="input-group-append">
					<button class="btn btn-outline-danger" type="submit">Enviar</button>
				</div>
			</div>
			{{$errors->has('name')}}
        </form>
    </div>
</div>


@endsection
