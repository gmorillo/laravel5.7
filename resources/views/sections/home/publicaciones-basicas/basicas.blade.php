<div class="container">
    <!--<div class="row">
        <div class="col-lg-12 my-3">
            <div class="pull-right">
                <div class="btn-group">
                    <button class="btn btn-info" id="list">
                        List View
                    </button>
                    <button class="btn btn-danger" id="grid">
                        Grid View
                    </button>
                </div>
            </div>
        </div>
    </div> -->
    <h2 class="text-center my-5">Publicaciones Básicas</h2>
    {{--
    <div id="products" class="row view-group">
        @foreach($basic as $bas)  
            <!-- @if ($loop->iteration == 2) col-md-6 col-sm-6 @else col-md-3 col-sm-6 @endif -->
            <div class="item col-xs-6 col-lg-3" style="max-height: 528px; overflow: hidden" id="{{$bas->id}}">
                <a href="{{ url('detalle/rotador-principal/') }}/{{$bas->id}}" style="text-decoration: none" class="text-dark ">
                    <div class="thumbnail card div-images-zoom">
                        <div class="img-event">
                            <img class="div-images-zoomgroup list-group-image img-fluid" src="{{ url('img/rotador-principal/') }}/{{$bas->principal_img}}" alt="{{$bas->title}}" />
                        </div>
                        <!--<div class="caption card-body p-2">
                            <h4 class="group card-title inner list-group-item-heading text-danger">Product title</h4>
                            <p class="group inner list-group-item-text">{{$bas->description}}</p>
                        </div>-->
                    </div>
                </a>
            </div>
        @endforeach
    </div>--}}
    <div id="products" class="row view-group">
        @foreach($basic as $index => $bas)  
        <!-- @if ($loop->iteration == 2) col-md-6 col-sm-6 @else col-md-3 col-sm-6 @endif -->
        <div data-wow-delay="0.{{$loop->iteration}}s" class="item col-md-3 col-sm-6 wow fadeInLeft animated">
            <div class="product-grid9 position-relative">
                <div class="position-absolute p-2 w-100" style="top: 0; z-index: 2; background-color: rgba(0,0,0,0.3)">
                    <p class="d-none">{{$diff[$index] = $bas->created_at}}</p>
                    <p class="m-0 text-right text-white"><small>{{$diff[$index]->diffForHumans()}}</small></p>
                </div>
                <div class="product-image9 thumbnail card">
                    <div class="img-event">
                        <a href="{{ url('detalle/anuncios/') }}/{{$bas->id}}">
                            <img class="pic-1 lozad" data-src="{{ url('img/rotador-principal/') }}/{{$bas->principal_img}}">
                            @foreach($photo as $pic )
                                @if($pic->slideshow_id == $bas->id)
                                    <img class="pic-2 lozad " data-src="{{ url('img/rotador-principal/imagenes_secundarias') }}/{{$pic->img}}">
                                @endif
                            @endforeach
                        </a>
                    </div>
                    <a href="{{ url('detalle/anuncios/') }}/{{$bas->id}}" class="fa fa-search product-full-view"></a>
                    <div class="product-content">
                    <a class="add-to-cart" href="{{ url('detalle/anuncios/') }}/{{$bas->id}}">más imágenes</a>
                </div>
                </div>
                
            </div>
        </div>
        @endforeach 
    </div>
    <div class="row px-1">
            <div class="col-md-6 offset-md-4">
        <div class="text-center" >{{ $basic->links() }}</div>
    </div>
</div>

<script type="text/javascript">
    
    new WOW().init();
</script>