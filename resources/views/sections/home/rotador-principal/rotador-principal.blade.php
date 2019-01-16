<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach($sliders as $slider)
      <li data-target="#carouselExampleIndicators" data-slide-to="{{$slider->id}}" class="active"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach($sliders as $slider)
      <div class="carousel-item @if ($loop->first) active @endif">
        <a href="{{ url('detalle/anuncios/') }}/{{$slider->id}}">
          <img class="d-block w-100 img-fluid" src="img/rotador-principal/{{$slider->principal_img}}" alt="Second slide">
        </a>
      </div>
    @endforeach
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>