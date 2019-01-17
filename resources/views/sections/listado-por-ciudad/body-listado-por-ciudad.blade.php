<div class="container-fluid bg-danger">
	<h3 class="text-white py-3 text-center">Listado por ciudad
		@foreach($sliders as $per)
			@foreach($city as $ciudad)
				@if($per->city_id == $ciudad->id)
					 <span class="bg-dark p-2">{{$ciudad->name}}</span>
				@endif
			@endforeach
		@endforeach
	</h3>
</div>
<div class="container-fluid-my-5 p-2" style="overflow: hidden">
	<div class="row">
		@foreach($sliders as $index => $cat)  
	        <!-- @if($loop->iteration == 2 || $loop->iteration == 6 || $loop->iteration == 8)col-xl-4 @else @endif-->
	        <div class="item  col-xl-2 col-lg-2  col-md-4 col-sm-12 col-xs-12">
	            <div class="product-grid9">
	            	<div class="position-absolute p-2 w-100" style="top: 0; z-index: 2; background-color: rgba(0,0,0,0.3)">
	                    <p class="d-none">{{$diff[$index] = $cat->created_at}}</p>
	                    <p class="m-0 text-right text-white"><small>{{$diff[$index]->diffForHumans()}}</small></p>
	                </div>
	                <div class="product-image9 thumbnail card">
	                    <div class="img-event">
	                        <a href="{{ url('detalle/anuncios/') }}/{{$cat->id}}">
	                            <img class="pic-1 img-fluid" src="{{ url('img/rotador-principal/') }}/{{$cat->principal_img}}" style="height: 376px;object-fit: cover;">
	                            @foreach($photo as $pic )
	                                @if($pic->slideshow_id == $cat->id)
	                                    <img class="pic-2" src="{{ url('img/rotador-principal/imagenes_secundarias') }}/{{$pic->img}}">
	                                @endif
	                            @endforeach
	                        </a>
	                    </div>
	                    <a href="{{ url('detalle/anuncios/') }}/{{$cat->id}}" class="fa fa-search product-full-view"></a>
	                    <div class="product-content">
	                    <a class="add-to-cart" href="{{ url('detalle/anuncios/') }}/{{$cat->id}}">más imágenes</a>
	                </div>
	                </div>
	                
	            </div>
	        </div>
        @endforeach 
	</div>
	<div class="row px-1">
            <div class="col-md-6 offset-md-4">
        <div class="text-center" >{{ $sliders->links() }}</div>
    </div>
</div>



