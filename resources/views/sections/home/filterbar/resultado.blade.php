@extends('layouts.app')
@section('title')
	<title>{{trans('titles.home')}}</title>
@endsection
@section('content')
@include('sections.home.filterbar.filter-bar')
	<div class="container-fluid my-5">
	    @if(isset($details))
	        <p class="mb-5"> Existen <span class="h3 bg-success text-white p-1">{{count($details)}}</span> publicaciones para la búsqueda <span class="h4 bg-success text-white p-1"><strong>{{ $query }}</strong></span> es :</p>
		    <div id="products" class="row view-group">
		        @foreach($details as $bas)  
		            <!-- @if ($loop->iteration == 2) col-md-6 col-sm-6 @else col-md-3 col-sm-6 @endif -->
		            <div class="item col-xs-6 col-lg-2" style="max-height: 528px; overflow: hidden">
		                <a href="{{ url('detalle/rotador-principal/') }}/{{$bas->id}}" style="text-decoration: none" class="text-dark">
		                    <div class="thumbnail card">
		                        <div class="img-event">
		                            <img class="group list-group-image img-fluid mx-auto d-block" src="{{ url('img/rotador-principal/') }}/{{$bas->principal_img}}" alt="{{$bas->title}}" style="min-height: 370px;object-fit: cover;" />
		                        </div>
		                    </div>
		                </a>
		            </div>
		        @endforeach
		    </div>
		    @elseif(isset($message))
		    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p class="mb-0"><strong>{{ $message }}</strong></p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
	    @endif
	    <div class="row px-1">
			<div class="col-md-6 offset-md-4">
				<div class="text-center" >{{ $details->links() }}</div>
			</div>
		</div>
	</div>

@endsection

@section('stylesheet')
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
		    margin-bottom: 30px;
		    -ms-flex: 0 0 100%;
		    flex: 0 0 100%;
		    max-width: 100%;
		    padding: 0 1rem;
		    border: 0;
		}
		.item.list-group-item .img-event {
		    float: left;
		    width: 20%;
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
		.item.list-group-item .caption
		{
		    float: left;
		    width: 70%;
		    margin: 0;
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

		.thumbnail {
		    min-width: auto !important;
		    padding: 0.2em;
		}
</style>
@endsection