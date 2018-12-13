@extends('layouts.app')
@section('title')
	<title>{{trans('titles.home')}}</title>
@endsection
@section('metas')
	
@endsection
@section('content')
	@include('sections.home.rotador-principal.rotador-principal')
	@include('sections.home.premium.premium')
@endsection

@section('stylesheet')
	
@endsection

@section('scripts')
	
@endsection