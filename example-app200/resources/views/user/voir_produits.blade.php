@extends('layouts.app')

@section('content')
<a href="voir_panier" class="btn btn-primary">Voir Panier</a>

<div class="container">

    <div class="row justify-content-center">
        @foreach ($data as $produit)


        <div class="col-md-3 m-1 p-2">
            <div class="card">
                <div class="card-header"><h4>{{ __($produit['nom']) }}</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <img src="{{asset($produit['image_principle'])}}" class="form-control" alt="">
                    <h5>Prix: <span class="text-danger">{{ $produit['prix'] }}</span></h5>
                    <h5>Numbre avilable: <span class="text-danger">{{$produit['nb_rest']}}</span></h5>
                    <h5>Description: <span class="text-danger">{{$produit['description']}}</span></h5>
                    <h5>Wilaya: <span class="text-danger">{{$produit['disponible_wilaya']}}</span></h5>
                    <h5>Nom Artisan: <span class="text-danger">{{$produit['artisan_nom']}}</span></h5>
                    <h5>Nom Categorie: <span class="text-danger">{{$produit['categorie_nom']}}</span></h5>

                    
                    <form action="{{route('user.voir_produits1')}}" method="GET">
                    @if($produit['type_paiement']=='paiement_apres_livrision')
                    <label for="type_paiement" class="text-primary">Type Paiement</label><br>
                    <select name="type_paiement" id="type_paiement">
                    <option value="paiement_evencer">Paiement a l'evence</option>
                    <option value="paiement_apres_livrision">Paiement apres livrision</option>
                    </select><br><br>
                    @else
                    <label for="type_paiement" class="text-primary">Type Paiement</label><br>
                    <input type="text" name="type_paiement" id="type_paiement" class="text-danger" value="{{$produit['type_paiement']}}">
                    @endif
                    <label for="quantity">quantity:</label>
                    <select name="quantity" id="quantity">
                        @for ($i =1 ;$i<=$produit['nb_rest'];$i++)
                            <option value='{{$i}}'>{{$i}}</option>
                        @endfor
                    </select>
                    <input type="hidden" name="id" value="{{$produit['idf']}}">
                    <input type="submit" value="ADD TO CART" class="btn btn-info">
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $produit11->links() }}
</div>
@endsection
