@extends('layouts.app')

@section('content')


<div class="text-center">
	 <h3 class="text-danger">(Attention votre command peut livriser uniquement apres votre payement)</h3>
	<h1 class="text-primary">Select le type de paiement</h1>
	<a href="/PaiementMaintenant{{$data}}" class="btn btn-success">Payer maintenant</a>
	<a href="/PaiementPlusTard{{$data}}" class="btn btn-danger">payement plus tard</a>
</div>
@endsection