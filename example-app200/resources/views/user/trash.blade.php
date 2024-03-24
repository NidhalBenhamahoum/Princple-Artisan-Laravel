@extends('layouts.app')

@section('content')
<a href="voir_panier" class="btn btn-primary">Voir Panier</a>
<div class="container">
    <div class="table-responsive">
        {{$i=0}}
        <a href="{{url('/voir_produits')}}" class="btn btn-success btn-sm">Add New Command</a>
        @if(isset($data))
        <table class="table">
            <tr>
                 <th>N</th>
                <th>Nom Produit</th>
                <th>description</th>
                <th>prix</th>
                <th>Quantity</th>
                <th>Wilaya</th>
                <th>Type Paiement</th>
                <th>image principle</th>
                <th>image 1</th>
                <th>image 2</th>
                <th>image 3</th>
                <th>Categorie</th>
                <th>Nom Artisan</th>
                <th>Actions</th>
            </tr>

                @foreach ($data as $produit)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$produit['nom']}}</td>
                    <td>{{$produit['description']}}</td>
                    <td>{{$produit['prix']}}</td>
                    <td>{{$produit['Qte']}}</td>
                    <td>{{$produit['wilaya']}}</td>
                    <td>{{$produit['type_paiement']}}</td>
                    <td><img src="{{asset($produit['image_principle'])}}" style="width:120px" alt=""></td>
                    <td><img src="{{asset($produit['image1'])}}" style="width:120px" alt=""></td>
                    <td><img src="{{asset($produit['image2'])}}" style="width:120px" alt=""></td>
                    <td><img src="{{asset($produit['image3'])}}" style="width:120px" alt=""></td>
                    <td>{{$produit['categorie_nom']}}</td>
                    <td>{{$produit['artisan_nom']}}</td>
                    <td>
                    <a href="/restore_command{{$produit['id']}}" class="btn btn-info">Restore</a>


                    </td>
                </tr>
                @endforeach

        </table>
      </div>
      @else
      <h2>Sorry you have no command yet</h2>

</div>
@endif
@endsection
