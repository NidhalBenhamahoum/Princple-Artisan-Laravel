@extends('artisan.layouts.tpp')

@section('content')
<!doctype html>
<html >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Create produit</title>

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
    <form action="{{url('artisan/produits')}}" method="post" enctype="multipart/form-data">
        {!!csrf_field()!!}
        <label for="nom">Nom</label><br>
        <input type="text" id="nom" name="nom_produit" class="form-control">
        <label for="description">description</label><br>
        <input type="text" id="description" name="description" class="form-control">
        <label for="prix">Prix</label><br>
        <input type="number" step="2" id="prix" name="prix" class="form-control">
        <label for="nb_rest">Nomber avilable</label><br>
        <input type="number" id="nb_rest" name="nb_rest" class="form-control">
        <label for="disponible_wilaya">wilaya</label><br>
        

        <select name="disponible_wilaya" id="disponible_wilaya" class="form-control">
            @foreach($data['wilaya'] as $wilaya1)
            <option value="{{$wilaya1}}" class="form-control">{{$wilaya1}}</option>
            @endforeach
        </select>

        <label for="image_principle">Image Princpale</label>
        <input type="file" name="image_principle" id="image_principle" class='form-control'>
        <label for="image1">Image 1</label>
        <input type="file" name="image1" id="image1" class='form-control'>
        <label for="image2">Image 2</label>
        <input type="file" name="image2" id="image2" class='form-control'>
        <label for="image3">Image 3</label>
        <input type="file" name="image3" id="image3" class='form-control'>

        <label for="type_paiement">Type Paiement</label><br>
        <select name="type_paiement" id="type_paiement" class="form-control">
            <option value="paiement_evencer">Paiement a l'evence</option>
            <option value="paiement_apres_livrision">Paiement apres livrision</option>
        </select><br>
        

        <input type="hidden" name="artisan_id" value='{{Auth::guard('artisan')->user()->id}}'>
       
        <label for="categorie_nom">Nom Categorie</label><br>
        <select name="categorie_id" id="categorie_nom" class="form-control">
            @foreach($data['categories'] as $cat)
            <option value="{{$cat['id']}}" class="form-control">{{$cat['nom']}}</option>
            @endforeach
        </select><br>

        <input type="submit" value="Ajouter" class="btn btn-success">
    </form>
</div>
</div>
</body>
@endsection
