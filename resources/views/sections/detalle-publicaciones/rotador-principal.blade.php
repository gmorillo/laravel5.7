@extends('layouts.app')
<title>
	@foreach($category as $cat)
		@if($info->category_id == $cat->id)
			{{$cat->name}} en
		@endif
	@endforeach
	@foreach($city as $ciudad)
		@if($info->city_id == $ciudad->id)
			{{$ciudad->name}}
		@endif
	@endforeach
</title>

@section('content')
	<div class="container mt-4">
		<div class="col-12 bg-secondary rounded">
			<p class=" text-white py-2 text-uppercase" >{{$info->title}}</p>
		</div>
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 mb-5">
				<div class="bg-info rounded">
					<p class=" p-3">
						<strong class="text-white ">
							Cuando me contactes, recuerda decir que me viste en BEMBOSEX.COM
						</strong>
					</p>
				</div>
				<div>
					<p class=" text-dark py-2 text-uppercase" >
						<i class="fas fa-phone text-danger"></i> 
						<strong class="text-danger" style="letter-spacing: 4px;"><a target="_blank" style="text-decoration: none;" class="text-danger" href="https://wa.me/507{{$info->phone}}?text=Hola,%20te%20he%20visto%20por%20la%20web%20de%20*******">{{$info->phone}}</a></strong> - {{$info->description}}
					</p>
				</div>
				<div>
					<p class=" text-dark text-uppercase" >
						<strong class="text-secondary" style="letter-spacing: 4px;">Idiomas:</strong> <span class="text-secondary">{{$info->langues}}</span>
					</p>
				</div>
				<div >
					<div class="imgBox"><img src="{{ asset('img/rotador-principal') }}/{{$info->principal_img}}" class="img-fluid mx-auto d-block"></div>
					<ul class="thumb">
						<li>
							<a href="{{ asset('img/rotador-principal') }}/{{$info->principal_img}}" target="imgBox">
								<img src="{{ asset('img/rotador-principal') }}/{{$info->principal_img}}" width="120px" class="img-fluid mx-auto d-block">
							</a>
						</li>
						@foreach($secondary_photos as $sp)
							<li>
								<a href="{{ asset('img/rotador-principal/imagenes_secundarias/') }}/{{$sp->img}}" target="imgBox">
									<img src="{{ asset('img/rotador-principal/imagenes_secundarias/') }}/{{$sp->img}}" width="120px" class="img-fluid mx-auto d-block">
								</a>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="bg-success mb-1 text-white text-center rounded">
					<div class="py-3">
						<i class="fab fa-whatsapp h4 mb-0"></i>
						<a target="_blank" style="text-decoration: none;" class="text-white h4" href="https://wa.me/507{{$info->phone}}?text=Hola,%20te%20he%20visto%20por%20la%20web%20de%20*******">Whatsapp</a>
					</div>
				</div>
				<div class="bg-secondary my-1 text-center rounded">
					<div class="py-3">
						<h4 class="mb-0">
							<a class="text-white" href="{{ url('listado-por-ciudad') }}/{{$info->city_id}}">
								@foreach($city as $ciudad)
									@if($info->city_id == $ciudad->id)
										Anuncios en {{$ciudad->name}}
									@endif
								@endforeach
							</a>
						</h4>
					</div>
				</div>
				<div class="bg-danger my-1 text-white text-center rounded">
					<div class="py-3">
						<h4 class="mb-0">
							<a class="text-white" href="{{ url('listado-por-categoria') }}/{{$info->category_id}}">
								@foreach($category as $cat)
									@if($info->category_id == $cat->id)
										{{$cat->name}} en
									@endif
								@endforeach
								@foreach($city as $ciudad)
									@if($info->city_id == $ciudad->id)
										{{$ciudad->name}}
									@endif
								@endforeach
							</a>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


<style>
	.imgBox {
	max-width: 730px;
	margin: 50px auto 20px;
}
.imgBox img {
	width: 100%;
	border: 4px solid #fff;
	box-shadow: 0 5px 25px rgba(0,0,0,.5);
}
ul.thumb {
	margin: 0 auto;
	padding:0;
	display: flex;
	align-item:center;
	justify-content:center;
}

ul.thumb li img {
	border: 4px solid #fff;
	box-shadow: 0 5px 25px rgba(0,0,0,.5);
	width:100%;
	height:100%;
    object-fit: cover;
}
</style>