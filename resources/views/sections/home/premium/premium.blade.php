

<div class="container-fluid p-0 bg-dark text-white my-5">
  <div class="container">
      <h2 class="m-0 py-3 text-center">Publicaciones Premium</h2>
  </div>
</div>
<!-- .container -->
<div class="container-fluid">
  <div class="row">
    <div id="carouselPlus" class="carousel slide multi-carousel" data-ride="carousel">
      <div class="carousel-inner"> 
      @foreach($premium as $index => $prem)      
        <div class="carousel-grid col-lg-2 col-md-2 col-sm-12 px-1">
          <div class="product-grid9 position-relative">
            <div class="position-absolute p-2 w-100" style="top: 0; z-index: 2; background-color: rgba(0,0,0,0.3)">
              <p class="d-none">{{$diff[$index] = $prem->created_at}}</p>
              <p class="m-0 text-right text-white"><small>{{$diff[$index]->diffForHumans()}}</small></p>
            </div>
            <div class="product-image9 thumbnail card m-0">
              <div class="img-event">
                  <a href="{{ url('detalle/anuncios/') }}/{{$prem->id}}">
                      <img class="pic-1" src="{{ url('img/rotador-principal/') }}/{{$prem->principal_img}}" alt="{{$prem->title}}">
                      @foreach($photo as $pic )
                          @if($pic->slideshow_id == $prem->id)
                              <img class="pic-2" src="{{ url('img/rotador-principal/imagenes_secundarias') }}/{{$pic->img}}">
                          @endif
                      @endforeach
                  </a>
              </div>
              <a href="{{ url('detalle/anuncios/') }}/{{$prem->id}}" class="fa fa-search product-full-view"></a>
              <div class="product-content">
                <a class="add-to-cart" href="{{ url('detalle/anuncios/') }}/{{$prem->id}}">más imágenes</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselPlus" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselPlus" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>      
    </div>
  </div>
</div>
  
<div id="lg" class="d-none d-lg-block"></div><div id="md" class="d-none d-md-block d-lg-none"></div><div id="sm" class="d-none d-sm-block d-md-none"></div>

