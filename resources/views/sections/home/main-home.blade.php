@extends('layouts.app')
@section('title')
	<title>{{trans('titles.home')}}</title>
@endsection
@section('metas')
	
@endsection
@section('content')
	@include('sections.home.rotador-principal.rotador-principal')
	@include('sections.home.premium.premium')
	@include('sections.home.filterbar.filter-bar')
	@include('sections.home.publicaciones-basicas.basicas')
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











/********************* Shopping Demo-9 **********************/
.product-grid9,.product-grid9 .product-image9{position:relative}
.product-grid9{font-family:Poppins,sans-serif;z-index:1}
.product-grid9 .product-image9 a{display:block}
.product-grid9 .product-image9 img{width:100%;height:100%;object-fit: cover;}
.product-grid9 .pic-1{opacity:1;transition:all .5s ease-out 0s}
.product-grid9:hover .pic-1{opacity:0}
.product-grid9 .pic-2{position:absolute;top:0;left:0;opacity:0;transition:all .5s ease-out 0s}
.product-grid9:hover .pic-2{opacity:1}
.product-grid9 .product-full-view{color:#505050;background-color:#fff;font-size:16px;height:45px;width:45px;padding:18px;border-radius:100px 0 0;display:block;opacity:0;position:absolute;right:0;bottom:0;transition:all .3s ease 0s}
.product-grid9 .product-full-view:hover{color:#c0392b}
.product-grid9:hover .product-full-view{opacity:1}
.product-grid9 .product-content{;overflow:hidden;position:relative}
.product-content .rating{padding:0;margin:0 0 7px;list-style:none}
.product-grid9 .rating li{font-size:12px;color:#ffd200;transition:all .3s ease 0s}
.product-grid9 .rating li.disable{color:rgba(0,0,0,.2)}
.product-grid9 .title{font-size:16px;font-weight:400;text-transform:capitalize;margin:0 0 3px;transition:all .3s ease 0s}
.product-grid9 .title a{color:rgba(0,0,0,.5)}
.product-grid9 .title a:hover{color:#c0392b}
.product-grid9 .price{color:#000;font-size:17px;margin:0;display:block;transition:all .5s ease 0s}
.product-grid9:hover .price{opacity:0}
.product-grid9 .add-to-cart{display:block;color:#c0392b;font-weight:600;font-size:14px;opacity:0;position:absolute;left:10px;bottom:-20px;transition:all .5s ease 0s}
.product-grid9:hover .add-to-cart{opacity:1;bottom:0}
@media only screen and (max-width:990px){.product-grid9{margin-bottom:30px}
}

	</style>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
            $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
        });
	</script>
@endsection