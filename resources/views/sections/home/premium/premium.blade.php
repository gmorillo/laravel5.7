

<div class="container">
	<div class="row">
		<h2>Publicaciones Premium</h2>
	</div>
</div>
<!-- .container -->
<br>
<div class="container-fluid">
  <div class="row">
    <div id="carouselPlus" class="carousel slide multi-carousel" data-ride="carousel">
      <div class="carousel-inner"> 
      @foreach($premium as $prem)      
        <div class="carousel-grid col-lg-2 col-md-2 col-sm-12">
          <a href="#">
            <img class="d-block w-100" src="{{ url('img/rotador-principal/') }}/{{$prem->principal_img}}" alt="{{$prem->title}}">
          </a>
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

