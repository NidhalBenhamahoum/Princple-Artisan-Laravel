@extends('artisan.layouts.tpp')

@section('content')
<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Edit produit</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js']);
</head>
<body>
    <div class="card" style="margin:20px">
<div class="card-header">
    <h1>Create New Produit</h1>
</div>
<div class="card-body">
    <form action="/artisan/produits/update{{$data['produits']->id}}" method="post" enctype="multipart/form-data">
        {!!csrf_field()!!}
        <label for="nom">Nom</label><br>
        <input type="text" id="nom" name="nom_produit" value="{{$data['produits']->nom_produit}}" class="form-control">
        <label for="description">description</label><br>
        <input type="text" id="description" name="description" value="{{$data['produits']->description}}" class="form-control">
        <label for="prix">Prix</label><br>
        <input type="number" step="2" id="prix" name="prix" value="{{$data['produits']->prix}}" class="form-control">
        <label for="nb_rest">Nomber avilable</label><br>
        <input type="number" id="nb_rest" name="nb_rest" value="{{$data['produits']->nb_rest}}" class="form-control">
        <label for="disponible_wilaya">wilaya</label><br>
        

        <select name="disponible_wilaya" id="disponible_wilaya" class="form-control">
            @foreach($data['wilaya'] as $wilaya1)
            @if($data['produits']->disponible_wilaya==$wilaya1)
            <option value="{{$wilaya1}}" class="form-control" selected>{{$wilaya1}}</option>
            @else
            <option value="{{$wilaya1}}" class="form-control">{{$wilaya1}}</option>
            @endif
            @endforeach
        </select>
        <label for="image_principle"><img src="{{asset($data['produits']->image_principle)}}" style="width:120px" alt=""></label>
        <input type="file" name="image_principle" id="image_principle"><br><br>

        <label for="image1"><img src="{{asset($data['produits']->image1)}}" style="width:120px" alt=""></label>
        <input type="file" name="image1" id="image1"><br><br>

        <label for="image2"><img src="{{asset($data['produits']->image2)}}" style="width:120px" alt=""></label>
        <input type="file" name="image2" id="image2"><br><br>

        <label for="image3"><img src="{{asset($data['produits']->image3)}}" style="width:120px" alt=""></label>
        <input type="file" name="image3" id="image3"><br><br>
        <label for="type_paiement">Type Paiement</label><br>
        <select name="type_paiement" id="type_paiement" class="form-control">
            @if($data['produits']->type_paiement == 'paiement_evencer')
            <option value="paiement_evencer" selected>Paiement a l'evence</option>
            @else
            <option value="paiement_evencer">Paiement a l'evence</option>
            @endif
            @if($data['produits']->type_paiement == 'paiement_apres_livrision')
            <option value="paiement_apres_livrision" selected>Paiement apres livrision</option>
            @else
            <option value="paiement_apres_livrision">Paiement apres livrision</option>
            @endif
        </select><br>

        <label for="categorie_nom">Nom Categorie</label><br>
        <select name="categorie_id" id="categorie_nom" class="form-control">
            @foreach($data['categories'] as $cat)
            @if($cat['id']==$data['produits']->categorie_id)
            <option value="{{$cat['id']}}" class="form-control" selected>{{$cat['nom']}}</option>
            @else
            <option value="{{$cat['id']}}" class="form-control">{{$cat['nom']}}</option>
            @endif
            @endforeach
        </select><br>

        <input type="submit" value="Ajouter" class="btn btn-success">
    </form>
</div>
</div>
</body>
@endsection
