@extends('artisan.layouts.tpp')

@section('content')


<div class="text-center">
	
	<h1 class="text-primary">Select le type de livrision</h1>
	<a href="/LivriserManual{{$data}}" class="btn btn-success">Livriser Manual</a>
	<a href="/LivriserAgent{{$data}}" class="btn btn-danger">Livriser par un Agent</a>
</div>
@endsection