@extends('layouts.app')
<title>{{$info->phone}} - {{$info->title}}</title>

@section('content')
	<div class="container mt-4">
		<div class="col-12 bg-secondary rounded">
			<p class=" text-white py-2 text-uppercase" >{{$info->title}}</p>
		</div>
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="bg-danger rounded">
					<p class=" px-2 py-2">
						<strong class="text-white">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque itaque consectetur ea inventore atque cumque id aperiam tempora officiis doloremque fugiat debitis odio accusamus reiciendis natus!
						</strong>
					</p>
				</div>
				<div>
					<p class=" text-dark py-2 text-uppercase" >
						<i class="fas fa-phone text-danger"></i> 
						<strong class="text-danger" style="letter-spacing: 4px;">{{$info->phone}}</strong> - {{$info->description}}
					</p>
				</div>
				<div>
					<p class=" text-dark text-uppercase" >
						<strong class="text-secondary" style="letter-spacing: 4px;">Idiomas:</strong> <span class="text-secondary">{{$info->langues}}</span>
					</p>
				</div>
				<div >
					<div class="imgBox"><img src="{{ url('img/rotador-principal') }}/{{$info->principal_img}}"></div>
					<ul class="thumb">
						@foreach($secondary_photos as $sp)
							<li>
								<a href="{{ asset('img/rotador-principal/imagenes_secundarias/') }}/{{$sp->img}}" target="imgBox">
									<img src="{{ asset('img/rotador-principal/imagenes_secundarias/') }}/{{$sp->img}}" width="120px" class="img-fluid">
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
						<a style="text-decoration: none;" class="text-white h4" href="https://wa.me/507{{$info->phone}}?text=Hola,%20te%20he%20visto%20por%20la%20web%20de%20*******">Whatsapp</a>
					</div>
				</div>
				<div class="bg-secondary my-1 text-white text-center rounded">
					<div class="py-3">
						<h4 class="mb-0">Ciudad: {{$info->city_id}}</h4>
					</div>
				</div>
				<div class="bg-danger my-1 text-white text-center rounded">
					<div class="py-3">
						<h4 class="mb-0">Categoría: {{$info->category_id}}</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


<style>
	.imgBox {
	width: 720px;
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
ul.thumb li {
	list-style: none;
	margin: 0 10px;	
	width:125px;
	height:100px;
}
ul.thumb li img {
	border: 4px solid #fff;
	box-shadow: 0 5px 25px rgba(0,0,0,.5);
	width:100%;
	height:100%;
}
</style>