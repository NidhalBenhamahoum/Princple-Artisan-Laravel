@extends('artisan.layouts.tpp')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
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
      <div class="table-responsive">

        <a href="{{url('/artisan/produits/create')}}" class="btn btn-success btn-sm">Add New</a>
        <a href="{{url('/artisan/produits/trash')}}" class="btn btn-success btn-sm">Show Trash</a>
        <table class="table">
            <tr>

                <th>Nom</th>
                <th>description</th>
                <th>prix</th>
                <th>nombre avilable</th>
                <th>Wilaya</th>
                <th>image principle</th>
                <th>image 1</th>
                <th>image 2</th>
                <th>image 3</th>
                <th>Type Paiement</th>
                <th>Actions</th>
            </tr>

                @foreach ($produits as $produit)
                <tr>
                    <td>{{$produit->nom_produit}}</td>
                    <td>{{$produit->description}}</td>
                    <td>{{$produit->prix}}</td>
                    <td>{{$produit->nb_rest}}</td>
                    <td>{{$produit->disponible_wilaya}}</td>
                    <td><img src="{{asset($produit->image_principle)}}" style="width:120px" alt=""></td>
                    <td><img src="{{asset($produit->image1)}}" style="width:120px" alt=""></td>
                    <td><img src="{{asset($produit->image2)}}" style="width:120px" alt=""></td>
                    <td><img src="{{asset($produit->image3)}}" style="width:120px" alt=""></td>
                    <td>{{$produit->type_paiement}}</td>
                    <td>
                        <a href="{{url('/artisan/produits/show' .$produit->id)}}" class="btn btn-info">Show</a>
                    <a href="{{url('/artisan/produits/edit' .$produit->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{url('/artisan/produits/delete' .$produit->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
                 @endforeach
                           
        </table>
{{$produits->links()}}
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
