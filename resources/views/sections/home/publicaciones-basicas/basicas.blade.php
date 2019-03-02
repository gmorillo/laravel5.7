<div class="container">
    <div class="row">
        <div class="col-lg-12 my-3 p-0">
            <div class="float-right">
                <div class="btn-group">
                    <button class="btn btn-warning" id="list">
                        List View
                    </button>
                    <button class="btn btn-danger" id="grid">
                        Grid View
                    </button>
                </div>
            </div>
        </div>
    </div> 
    <h2 class="text-center my-5">Publicaciones Básicas</h2>
    
    <div id="products" class="row view-group">
        @foreach($basic as $index => $bas)  
            <!-- @if ($loop->iteration == 2) col-md-6 col-sm-6 @else col-md-3 col-sm-6 @endif -->
            <div class="item col-xs-6 col-lg-3" style="max-height: 528px; overflow: hidden" id="{{$bas->id}}">
                <a href="{{ url('detalle/anuncios/') }}/{{$bas->id}}" style="text-decoration: none" class="text-dark ">
                    <div class="thumbnail card div-images-zoom col-xl-12">
                        <p class="d-none">{{$diff[$index] = $bas->created_at}}</p>
                        <div class="img-event">
                            <img class="pic-1 div-images-zoomgroup list-group-image img-fluid " src="{{ url('img/rotador-principal/') }}/{{$bas->principal_img}}" alt="{{$bas->title}}" />
                        </div>
                        <div class="caption card-body p-2 px-2">
                            <h4 class="text-truncate group card-title inner list-group-item-heading text-danger mt-2">{{$bas->title}} <small></small></h4>
                            <p class="group inner list-group-item-text text-truncate">{{$bas->description}}</p>
                            <small class="float-right" id="timeAgoList">{{$diff[$index]->diffForHumans()}}</small>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    {{-- 
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
    --}}
    <div class="row px-1">
            <div class="col-md-6 offset-md-4">
        <div class="text-center" >{{ $basic->links() }}</div>
    </div>
</div>

<script type="text/javascript">
    
    new WOW().init();
</script>

<style>
            .view-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: row;
    flex-direction: row;
    padding-left: 0;
    margin-bottom: 0;
}
.thumbnail
{
    margin-bottom: 30px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
}

.item.list-group-item
{
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 10px;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    padding: 0 1rem;
    border: 0;
}


.item.list-group-item .list-group-image
{
    margin-right: 10px;
}
.item.list-group-item .thumbnail
{
    margin-bottom: 0px;
    display: inline-block;
}


.item.list-group-item:before, .item.list-group-item:after
{
    display: table;
    content: " ";
}

.item.list-group-item:after
{
    clear: both;
}
</style>

<script type="text/javascript">

    $(document).ready(function() {
  setTimeout(function() {
    $("#list").trigger('click');
  }, 1500);
});

    $(document).ready(function() {
        $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');$('#timeAgolist').addClass('d-none');});
        $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    });
</script>

    