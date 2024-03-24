<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\Categorie;
use App\Models\Command;
use App\Models\produits;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class AcheterController extends Controller
{
    public function index(){
        $data =[];
        //$produits = produits::all();
        $produits=produits::latest()->paginate(5);
        foreach($produits as $produit){
            $t = $produit->artisan_id;
            $r = $produit->categorie_id;

            $art = Artisan::find($t);
            $artisan_nom  = $art->nom;

            $cat = Categorie::find($r);
            $categorie_nom = $cat->nom;

            $f= [
                'idf' => $produit->id,
                'nom' => $produit->nom_produit,
                'prix' => $produit->prix,
                'nb_rest' => $produit->nb_rest,
                'description' => $produit->description,
                'disponible_wilaya' => $produit->disponible_wilaya,
                'type_paiement' => $produit->type_paiement,
                'image_principle' => $produit->image_principle,
                'artisan_nom' => $artisan_nom,
                'categorie_nom' => $categorie_nom,
        ];
        array_push($data,$f);

            }

        return view('user.voir_produits')->with('data',$data)->with('produit11', $produits);
     }
     public function add(Request $request){
        //dd($request->input());
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $type_paiement  =$request->input('type_paiement');
        
        $command = new Command();
        $command->etat = 0;
        $command->user_id = Auth::user()->id;
        $command->produit_id = $id;
        $command->Qte = $quantity;
        $command->type_paiement = $type_paiement;
        $command->save();
        

        $data =[];
        $produits=produits::latest()->paginate(5);
        foreach($produits as $produit){
            $t = $produit->artisan_id;
            $r = $produit->categorie_id;

            $art = Artisan::find($t);
            $artisan_nom  = $art->nom;

            $cat = Categorie::find($r);
            $categorie_nom = $cat->nom;

            $f= [
                'idf' => $produit->id,
                'nom' => $produit->nom_produit,
                'prix' => $produit->prix,
                'nb_rest' => $produit->nb_rest,
                'description' => $produit->description,
                'disponible_wilaya' => $produit->disponible_wilaya,
                'type_paiement' => $produit->type_paiement,
                'image_principle' => $produit->image_principle,
                'artisan_nom' => $artisan_nom,
                'categorie_nom' => $categorie_nom,
                'quantity' => $quantity,
        ];
        array_push($data,$f);

            }

        return view('user.voir_produits')->with('data',$data)->with('produit11', $produits);
     }
}
