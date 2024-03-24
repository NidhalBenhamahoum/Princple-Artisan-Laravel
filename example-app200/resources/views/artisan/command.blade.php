@extends('artisan.layouts.tpp')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Commands</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Products</a>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::guard('artisan')->user()->nom}}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      @if(isset($data))
      <div class="table-responsive">
        <a href="{{url('/artisan/produits/trash')}}" class="btn btn-success btn-sm">Show Trash</a>
        <a href="{{url('/artisan/produits/create')}}" class="btn btn-success btn-sm">Add New produit</a>
        <table class="table">
            <tr>
                <th>Nom Client</th>
                <th>Prenom Client</th>
                <th>Tel</th>
                <th>Address</th>
                <th>Nom Produit</th>
                <th>prix</th>
                <th>nombre avilable</th>
                <th>Quantity</th>
                <th>image principle</th>
                <th>image 1</th>
                <th>image 2</th>
                <th>categorie</th>
                <th>Type Paiement</th>
                <th>Actions</th>
            </tr>

            @foreach ($data as $produit)
            <tr>

                <td>{{$produit['user_nom']}}</td>
                <td>{{$produit['user_prenom']}}</td>
                <td>{{$produit['user_tel']}}</td>
                <td>{{$produit['user_address']}}</td>
                <td>{{$produit['produit_nom']}}</td>
                <td>{{$produit['produit_prix']}}</td>
                <td>{{$produit['produit_avilable']}}</td>
                <td>{{$produit['quantity']}}</td>
                <td><img src="{{asset($produit['image_principle'])}}" style="width:120px" alt=""></td>
                    <td><img src="{{asset($produit['image1'])}}" style="width:120px" alt=""></td>
                    <td><img src="{{asset($produit['image2'])}}" style="width:120px" alt=""></td>
                <td>{{$produit['produit_categorie']}}</td>
                @if($produit['type_paiement']!= 'paiement_evencer' && $produit['type_paiement']!= 'paiement_apres_livrision')
                <td class="text-danger">{{$produit['type_paiement']}}</td>
                <td>
                  <a href="/artisan/livriser{{$produit['command_id']}}" class="btn btn-success">Livriser</a>
                </td>
                @else
                <td>{{$produit['type_paiement']}}</td>
                <td>
                <a href="/artisan/accept{{$produit['command_id']}}" class="btn btn-info">Accept</a>
                <a href="/artisan/refuse{{$produit['command_id']}}" class="btn btn-danger">Refuse</a>
                </td>
                @endif
                
            </tr>
            @endforeach

    </table>
  </div>
  @else
  <h2>Sorry you have no command yet</h2>

</div>
@endif


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
