<?php

namespace App\Http\Controllers\artisan;

use App\Models\Command;
use App\Models\Livrision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommandController extends Controller
{
    public function index(){

        $command = Command::join('produits','commands.produit_id','=','produits.id')->join('artisans','produits.artisan_id','=','artisans.id')->where('artisans.id',Auth::guard('artisan')->user()->id)->select('commands.*')->get();

        $data = [];
        foreach($command as $com){
            $user = $com->user;
            $produit = $com->produit;
            $artisan = $produit->artisan;
            $categorie = $produit->categorie;
            //dd($artisan->id==Auth::guard('artisan')->user()->id);
            if($artisan->id==Auth::guard('artisan')->user()->id && $com->etat == 4){
                $f = [
                    'command_id' => $com->id,
                    'user_nom' => $user->nom,
                    'user_prenom' => $user->prenom,
                    'user_tel' => $user->tel,
                    'user_address' => $user->address,
                    'produit_nom' => $produit->nom_produit,
                    'produit_prix' => $produit->prix,
                    'produit_avilable' => $produit->nb_rest,
                    'quantity' => $com->Qte,
                    'type_paiement' => 'deja payer tu doit livriser maintenant!!',
                    'image_principle' =>$produit->image_principle,
                    'image1' =>$produit->image1,
                    'image2' =>$produit->image2,
                    'produit_categorie' => $categorie->nom,
                ];
                array_push($data,$f);
            }
            elseif($artisan->id==Auth::guard('artisan')->user()->id){
                $f = [
                    'command_id' => $com->id,
                    'user_nom' => $user->nom,
                    'user_prenom' => $user->prenom,
                    'user_tel' => $user->tel,
                    'user_address' => $user->address,
                    'produit_nom' => $produit->nom_produit,
                    'produit_prix' => $produit->prix,
                    'produit_avilable' => $produit->nb_rest,
                    'quantity' => $com->Qte,
                    'type_paiement' => $produit->type_paiement,
                    'image_principle' =>$produit->image_principle,
                    'image1' =>$produit->image1,
                    'image2' =>$produit->image2,
                    'produit_categorie' => $categorie->nom,
                ];
                array_push($data,$f);
            }
        }

        return view('artisan.command')->with('data',$data);
    }
    public function accept(string $id){
        $com = Command::where('id',$id)->update(['etat'=>2]);

        return view('artisan.livriser')->with('data',$id);
        
    }
    public function refuse(string $id){
        $com = Command::where('id',$id)->update(['etat'=>3]);

        $command = Command::where('etat','!=',0)->get();

        $data = [];
        foreach($command as $com){
            $user = $com->user;
            $produit = $com->produit;
            $artisan = $produit->artisan;
            $categorie = $produit->categorie;
            //dd($artisan->id==Auth::guard('artisan')->user()->id);
            if($artisan->id==Auth::guard('artisan')->user()->id){
                $f = [
                    'command_id' => $com->id,
                    'user_nom' => $user->nom,
                    'user_prenom' => $user->prenom,
                    'user_tel' => $user->tel,
                    'user_address' => $user->address,
                    'produit_nom' => $produit->nom_produit,
                    'produit_prix' => $produit->prix,
                    'produit_avilable' => $produit->nb_rest,
                    'quantity' => $com->Qte,
                    'type_paiement' => $produit->type_paiement,
                    'image_principle' =>$produit->image_principle,
                    'image1' =>$produit->image1,
                    'image2' =>$produit->image2,
                    'produit_categorie' => $categorie->nom,
                ];
                array_push($data,$f);
            }
        }
        return view('artisan.command')->with('data',$data);
    }
    public function livriser(string $id){
        
        return view('artisan.livriser')->with('data',$id);
    }
    public function livrer_manual(string $id){
        $livrier = new Livrision();

        $livrier->etat = 0;
        $livrier->type = 'manual';
        $livrier->save();
        $com = Command::find($id);
        $com->livrision_id = $livrier->id;
        $com->save();
        $command = Command::join('produits','commands.produit_id','=','produits.id')->join('artisans','produits.artisan_id','=','artisans.id')->where('artisans.id',Auth::guard('artisan')->user()->id)->select('comands.*')->get();

        $data = [];
        foreach($command as $com){
            $user = $com->user;
            $produit = $com->produit;
            $artisan = $produit->artisan;
            $categorie = $produit->categorie;
            //dd($artisan->id==Auth::guard('artisan')->user()->id);
            if($artisan->id==Auth::guard('artisan')->user()->id){
                $f = [
                    'command_id' => $com->id,
                    'user_nom' => $user->nom,
                    'user_prenom' => $user->prenom,
                    'user_tel' => $user->tel,
                    'user_address' => $user->address,
                    'produit_nom' => $produit->nom_produit,
                    'produit_prix' => $produit->prix,
                    'produit_avilable' => $produit->nb_rest,
                    'quantity' => $com->Qte,
                    'type_paiement' => $produit->type_paiement,
                    'image_principle' =>$produit->image_principle,
                    'image1' =>$produit->image1,
                    'image2' =>$produit->image2,
                    'produit_categorie' => $categorie->nom,
                ];
                array_push($data,$f);
            }
        }
        return view('artisan.command')->with('data',$data);
    
    }
}
