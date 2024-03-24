<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\Categorie;
use App\Models\Panier;
use App\Models\Command;
use App\Models\Paiement;
use App\Models\produits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function voir(){
        $id = Auth::user()->id;
        $command = Command::where('user_id',$id)->get();
        $data =[];

        foreach($command as $com){
            if($com->etat == 0){


            $produit = $com->produit;
            $prod_id = $produit->id;

                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);



            }elseif($com->etat == 1){
                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 1,
                    'message' => 'wait the decision of your command from the artisan',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);


            }elseif($com->etat == 2){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 2,
                    'message' => 'your command have been confirmed wait the livraison  of your command to arrive',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);





            }elseif($com->etat == 3){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 3,
                    'message' => 'your command have been reused by the artisan send another command',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);



            }elseif($com->etat == 4){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 4,
                    'message' => 'Wait the livrision de votre command',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);



            }
        }
        return view('user.voir_panier')->with('data',$data);
    }


    public function confirm(string $id1){

        $comm = Command::find($id1);
        $comm->update(['etat'=>1]);
        
        
        if($comm->type_paiement == "paiement_evencer"){
            return view('user.payement1')->with('data',$comm->id);
        }
        if($comm->type_paiement == "paiement_apres_livrision"){
            return view('user.payement2');
        }

        $id = Auth::user()->id;
        $command = Command::where('user_id',$id)->get();
        $data =[];
        $l=0;
        
        
}

public function pay_maintenant(string $id_commmand){
    $com = Command::find($id_commmand);
    $com->update(['etat'=>4]);

    $total = 0;
    $produit1 = produits::find($com->produit_id);
    
        $total = $total + ($produit1->prix * $com->Qte);

    $paiement = new Paiement();
    $paiement->etat = 1;
    $paiement->facteur = $total;
    $paiement->save();

    $com->paiement_id = $paiement->id;
    $com->save();

    $id = Auth::user()->id;
        $command = Command::where('user_id',$id)->get();
        $data =[];
        $l=0;
        foreach($command as $com){
            if($com->etat == 0){
            $prod_id = $com->produit_id;
                $l=1;
            $produit1 = produits::where('id',$prod_id)->get();
            

        




        foreach($produit1 as $produit){
            $t = $produit->artisan_id;
            $r = $produit->categorie_id;

            $art = Artisan::find($t);
            $artisan_nom  = $art->nom;

            $cat = Categorie::find($r);
            $categorie_nom = $cat->nom;

            $f= [
                'idf' => $com->id,
                'nom' => $produit->nom_produit,
                'prix' => $produit->prix,
                'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                'description' => $produit->description,
                'wilaya' => $produit->disponible_wilaya,
                'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                'artisan_nom' => $artisan_nom,
                'categorie_nom' => $categorie_nom,
        ];
        array_push($data,$f);

            }
        }elseif($com->etat == 1){
                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 1,
                    'message' => 'wait the decision of your command from the artisan',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);


            }elseif($com->etat == 2){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 2,
                    'message' => 'your command have been confirmed wait the livraison  of your command to arrive',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);





            }elseif($com->etat == 3){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 3,
                    'message' => 'your command have been reused by the artisan send another command',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);



            }
            elseif($com->etat == 4){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 4,
                    'message' => 'Wait the livrision de votre command',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);



            }
        }

    return view('user.voir_panier')->with('data',$data);
     
}

public function Pay_tard(string $id_command){
    $com = Command::find($id_command);
    $com->update(['etat'=>5]);

    $total = 0;
    $produit1 = produits::find($com->produit_id);
    
        $total = $total + ($produit1->prix * $com->Qte);

    $paiement = new Paiement();
    $paiement->etat = 0;
    $paiement->facteur = $total;
    $paiement->save();

    $com->paiement_id = $paiement->id;
    $com->save();

    $id = Auth::user()->id;
        $command = Command::where('user_id',$id)->get();
        $data =[];
        $l=0;
        foreach($command as $com){
            if($com->etat == 0){
            $prod_id = $com->produit_id;
                $l=1;
            $produit1 = produits::where('id',$prod_id)->get();
            

        




        foreach($produit1 as $produit){
            $t = $produit->artisan_id;
            $r = $produit->categorie_id;

            $art = Artisan::find($t);
            $artisan_nom  = $art->nom;

            $cat = Categorie::find($r);
            $categorie_nom = $cat->nom;

            $f= [
                'idf' => $com->id,
                'nom' => $produit->nom_produit,
                'prix' => $produit->prix,
                'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                'description' => $produit->description,
                'wilaya' => $produit->disponible_wilaya,
                'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                'artisan_nom' => $artisan_nom,
                'categorie_nom' => $categorie_nom,
        ];
        array_push($data,$f);

            }
        }elseif($com->etat == 1){
                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 1,
                    'message' => 'wait the decision of your command from the artisan',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);


            }elseif($com->etat == 2){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 2,
                    'message' => 'your command have been confirmed wait the livraison  of your command to arrive',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);





            }elseif($com->etat == 3){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 3,
                    'message' => 'your command have been reused by the artisan send another command',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);



            }
            elseif($com->etat == 4){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 4,
                    'message' => 'Wait the livrision de votre command',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);



            }
            elseif($com->etat == 5){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 4,
                    'message' => 'the artisan is styding your dommand and the livrision is waiting for your paiement',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);



            }
        }

    return view('user.voir_panier')->with('data',$data);
     

}
public function delete(string $idf){
    $command = Command::where('id',$idf);
    
    $command->delete();

    $id = Auth::user()->id;
        $command = Command::where('user_id',$id)->get();
        $data =[];
        $l=0;
        foreach($command as $com){
            if($com->etat == 0){
            $prod_id = $com->produit_id;
                $l=1;
            $produit1 = produits::where('id',$prod_id)->get();
            

        




        foreach($produit1 as $produit){
            $t = $produit->artisan_id;
            $r = $produit->categorie_id;

            $art = Artisan::find($t);
            $artisan_nom  = $art->nom;

            $cat = Categorie::find($r);
            $categorie_nom = $cat->nom;

            $f= [
                'idf' => $com->id,
                'nom' => $produit->nom_produit,
                'prix' => $produit->prix,
                'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                'description' => $produit->description,
                'wilaya' => $produit->disponible_wilaya,
                'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                'artisan_nom' => $artisan_nom,
                'categorie_nom' => $categorie_nom,
        ];
        array_push($data,$f);

            }
        }elseif($com->etat == 1){
                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 1,
                    'message' => 'wait the decision of your command from the artisan',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);


            }elseif($com->etat == 2){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 2,
                    'message' => 'your command have been confirmed wait the livraison  of your command to arrive',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);





            }elseif($com->etat == 3){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 3,
                    'message' => 'your command have been reused by the artisan send another command',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);



            }elseif($com->etat == 4){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 4,
                    'message' => 'Wait the livrision de votre command',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);



            }
        }

    return view('user.voir_panier')->with('data',$data);
}
public function showTrash(){
    $command = Command::onlyTrashed()->get();
    $data = [];
    foreach($command as $com){
        $produit = $com->produit;
        $artisan  = $produit->artisan;
        $categorie = $produit->categorie;
        $f= [   'id'=> $com->id,
                'idf' => $produit->id,
                'nom' => $produit->nom_produit,
                'prix' => $produit->prix,
                'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                'description' => $produit->description,
                'wilaya' => $produit->disponible_wilaya,
                'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                'artisan_nom' => $artisan->nom,
                'categorie_nom' => $categorie->nom,
        ];
        array_push($data,$f);
    }

    return view('user.trash')->with('data',$data);
}
public function restore(string $id){
    Command::where('id',$id)->restore();

    $id = Auth::user()->id;
        $command = Command::where('user_id',$id)->get();
        $data =[];
        $l=0;
        foreach($command as $com){
            if($com->etat == 0){
            $prod_id = $com->produit_id;
                $l=1;
            $produit1 = produits::where('id',$prod_id)->get();
            

        




        foreach($produit1 as $produit){
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
                'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                'description' => $produit->description,
                'wilaya' => $produit->disponible_wilaya,
                'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                'artisan_nom' => $artisan_nom,
                'categorie_nom' => $categorie_nom,
        ];
        array_push($data,$f);

            }
        }elseif($com->etat == 1){
                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 1,
                    'message' => 'wait the decision of your command from the artisan',
                    'idf' => $produit->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);


            }elseif($com->etat == 2){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 2,
                    'message' => 'your command have been confirmed wait the livraison  of your command to arrive',
                    'idf' => $produit->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);





            }elseif($com->etat == 3){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 3,
                    'message' => 'your command have been reused by the artisan send another command',
                    'idf' => $produit->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);



            }elseif($com->etat == 4){

                $produit = $com->produit;
            $prod_id = $produit->id;
                $t = $produit->artisan_id;
                $r = $produit->categorie_id;

                $art = Artisan::find($t);
                $artisan_nom  = $art->nom;

                $cat = Categorie::find($r);
                $categorie_nom = $cat->nom;

                $f= [
                    't' => 4,
                    'message' => 'Wait the livrision de votre command',
                    'idf' => $com->id,
                    'nom' => $produit->nom_produit,
                    'prix' => $produit->prix,
                    'Qte' => $com->Qte,
                    'type_paiement' => $com->type_paiement,
                    'description' => $produit->description,
                    'wilaya' => $produit->disponible_wilaya,
                    'image_principle' =>$produit->image_principle,
                    'image1' => $produit->image1,
                    'image2' => $produit->image2,
                    'image3' => $produit->image3,
                    'artisan_nom' => $artisan_nom,
                    'categorie_nom' => $categorie_nom,
                ];
                array_push($data,$f);



            }
        }

    return view('user.voir_panier')->with('data',$data);
}
}
