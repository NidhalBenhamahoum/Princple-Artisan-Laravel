<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\produits;
use \App\Models\Categorie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $produits=produits::where('artisan_id',Auth::guard('artisan')->user()->id)->latest()->paginate(5);
        return view('artisan.produits.index',)->with('produits',$produits);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

       $algerianWilayas = [
    "Adrar",
    "Chlef",
    "Laghouat",
    "Oum El Bouaghi",
    "Batna",
    "Béjaïa",
    "Biskra",
    "Béchar",
    "Blida",
    "Bouira",
    "Tamanrasset",
    "Tébessa",
    "Tlemcen",
    "Tiaret",
    "Tizi Ouzou",
    "Alger",
    "Djelfa",
    "Jijel",
    "Sétif",
    "Saïda",
    "Skikda",
    "Sidi Bel Abbès",
    "Annaba",
    "Guelma",
    "Constantine",
    "Médéa",
    "Mostaganem",
    "M'Sila",
    "Mascara",
    "Ouargla",
    "Oran",
    "El Bayadh",
    "Illizi",
    "Bordj Bou Arréridj",
    "Boumerdès",
    "El Tarf",
    "Tindouf",
    "Tissemsilt",
    "El Oued",
    "Khenchela",
    "Souk Ahras",
    "Tipaza",
    "Mila",
    "Aïn Defla",
    "Naâma",
    "Aïn Témouchent",
    "Ghardaïa",
    "Relizane",
    "El M'Ghair",
    "El Menia",
    "Ouled Djellal",
    "Bordj Baji Mokhtar",
    "Beni Abbes",
    "Timimoun",
    "Touggourt",
    "Djanet",
    "In Salah",
    "In Guezzam"
];

    $categories = Categorie::all();
    $cat= [];
    foreach ($categories as $categorie) {
        $c=[
            'id'=> $categorie->id,
            'nom' => $categorie->nom,
        ];
        array_push($cat, $c);
    }

    $data = [
        'wilaya' => $algerianWilayas,
        'categories' => $cat,
    ];
        return view('artisan.produits.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_produit' => 'required|min:3',
            'image_principle' => 'required|mimes:png,jpg,jpeg',
            'image1' => 'required|mimes:png,jpg,jpeg',
            'image2' => 'nullable|mimes:png,jpg,jpeg',
            'image3' => 'nullable|mimes:png,jpg,jpeg',
        ]);
        $file_2 = null;
        $file_3 = null;

        $temp = time();
        $file_principle = $request->file('image_principle');
        $extention = $file_principle->getClientOriginalExtension();
        $file_principlename = time().'.'.$extention;
        $path_p = 'uploads/produits/';
        $file_principle->move($path_p,$file_principlename);

        $file_image1 = $request->file('image1');
        $extention1 = $file_image1->getClientOriginalExtension();
        $t1 = $temp+1;
        $file_image1name = $t1.'.'.$extention1;
        $file_image1->move($path_p,$file_image1name);

        if($request->has('image2') && $request->has('image3')){
            $file_image2 = $request->file('image2');
            $extention2 = $file_image2->getClientOriginalExtension();
            $t2 = $temp+2;
            $file_image2name = $t2.'.'.$extention2;
            $file_image2->move($path_p,$file_image2name);
            $file_2 = $path_p.$file_image2name;

            $file_image3 = $request->file('image3');
            $extention3 = $file_image3->getClientOriginalExtension();
            $t3 = $temp+3;
            $file_image3name = $t3.'.'.$extention3;
            $file_image3->move($path_p,$file_image3name);
            $file_3 = $path_p.$file_image3name;

            produits::create(
                [
                    'nom_produit' => $request->nom_produit,
                    'prix' => $request->prix,
                    'disponible_wilaya' => $request->disponible_wilaya,
                    'description' => $request->description,
                    'nb_rest' => $request->nb_rest,
                    'image_principle' => $path_p.$file_principlename,
                    'image1' => $path_p.$file_image1name,
                    'image2' => $file_2,
                    'image3' => $file_3,
                    'type_paiement' => $request->type_paiement,
                    'artisan_id' => $request->artisan_id,
                    'categorie_id' => $request->categorie_id,
                ]
            );

        }
        elseif($request->has('image3')){
            $file_image3 = $request->file('image3');
            $extention3 = $file_image3->getClientOriginalExtension();
            $t3 = $temp+3;
            $file_image3name = $t3.'.'.$extention3;
            $file_image3->move($path_p,$file_image3name);
            $file_3 = $path_p.$file_image3name;

            produits::create(
                [
                    'nom_produit' => $request->nom_produit,
                    'prix' => $request->prix,
                    'disponible_wilaya' => $request->disponible_wilaya,
                    'description' => $request->description,
                    'nb_rest' => $request->nb_rest,
                    'image_principle' => $path_p.$file_principlename,
                    'image1' => $path_p.$file_image1name,
                    'image3' => $file_3,
                    'type_paiement' => $request->type_paiement,
                    'artisan_id' => $request->artisan_id,
                    'categorie_id' => $request->categorie_id,
                ]
            );
        }elseif($request->has('image2')){
            $file_image2 = $request->file('image2');
            $extention2 = $file_image2->getClientOriginalExtension();
            $t2 = $temp+2;
            $file_image2name = $t2.'.'.$extention2;
            $file_image2->move($path_p,$file_image2name);
            $file_2 = $path_p.$file_image2name;

            produits::create(
                [
                    'nom_produit' => $request->nom_produit,
                    'prix' => $request->prix,
                    'disponible_wilaya' => $request->disponible_wilaya,
                    'description' => $request->description,
                    'nb_rest' => $request->nb_rest,
                    'image_principle' => $path_p.$file_principlename,
                    'image1' => $path_p.$file_image1name,
                    'image2' => $file_2,
                    'type_paiement' => $request->type_paiement,
                    'artisan_id' => $request->artisan_id,
                    'categorie_id' => $request->categorie_id,
                ]
            );
        }else{
            produits::create(
                [
                    'nom_produit' => $request->nom_produit,
                    'prix' => $request->prix,
                    'disponible_wilaya' => $request->disponible_wilaya,
                    'description' => $request->description,
                    'nb_rest' => $request->nb_rest,
                    'image_principle' => $path_p.$file_principlename,
                    'image1' => $path_p.$file_image1name,
                    'type_paiement' => $request->type_paiement,
                    'artisan_id' => $request->artisan_id,
                    'categorie_id' => $request->categorie_id,
                ]
            );
        }

        //dd($input);

        return redirect('artisan/produits')->with('flash_messsage','Produit Add successufly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produit = produits::find($id);
        return view('/artisan/produits/show')->with('produits',$produit);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produit = produits::find($id);

        $algerianWilayas = [
    "Adrar",
    "Chlef",
    "Laghouat",
    "Oum El Bouaghi",
    "Batna",
    "Béjaïa",
    "Biskra",
    "Béchar",
    "Blida",
    "Bouira",
    "Tamanrasset",
    "Tébessa",
    "Tlemcen",
    "Tiaret",
    "Tizi Ouzou",
    "Alger",
    "Djelfa",
    "Jijel",
    "Sétif",
    "Saïda",
    "Skikda",
    "Sidi Bel Abbès",
    "Annaba",
    "Guelma",
    "Constantine",
    "Médéa",
    "Mostaganem",
    "M'Sila",
    "Mascara",
    "Ouargla",
    "Oran",
    "El Bayadh",
    "Illizi",
    "Bordj Bou Arréridj",
    "Boumerdès",
    "El Tarf",
    "Tindouf",
    "Tissemsilt",
    "El Oued",
    "Khenchela",
    "Souk Ahras",
    "Tipaza",
    "Mila",
    "Aïn Defla",
    "Naâma",
    "Aïn Témouchent",
    "Ghardaïa",
    "Relizane",
    "El M'Ghair",
    "El Menia",
    "Ouled Djellal",
    "Bordj Baji Mokhtar",
    "Beni Abbes",
    "Timimoun",
    "Touggourt",
    "Djanet",
    "In Salah",
    "In Guezzam"
];

    $categories = Categorie::all();
    $cat= [];
    foreach ($categories as $categorie) {
        $c=[
            'id'=> $categorie->id,
            'nom' => $categorie->nom,
        ];
        array_push($cat, $c);
    }

    $data = [
        'produits' =>$produit,
        'wilaya' => $algerianWilayas,
        'categories' => $cat,
    ];

        return view('artisan.produits.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produit= produits::find($id);
        $input = $request->all();
        $produit->update($input);

        $temp = time();
        $path_p = 'uploads/produits/';

        if(null !==$request->file('image_principle')) {
            $file_principle = $request->file('image_principle');
            $extention = $file_principle->getClientOriginalExtension();
            $file_principlename = time().'.'.$extention;
            $file_principle->move($path_p,$file_principlename);

            if(File::exists($produit->image_principle)){
                File::delete($produit->image_principle);
            }
            $produit->update(['image_principle',$path_p.$file_principlename]);
        }

        if(null !==$request->file('image1')) {
            $file_image1 = $request->file('image1');
            $extention = $file_image1->getClientOriginalExtension();
            $file_image1name = time().'.'.$extention;
            $file_image1->move($path_p,$file_image1name);

            if(File::exists($produit->image1)){
                File::delete($produit->image1);
            }
            $produit->update(['image1',$path_p.$file_image1name]);
        }
        if(null !==$request->file('image2')) {
            $file_image2 = $request->file('image2');
            $extention = $file_image2->getClientOriginalExtension();
            $file_image2name = time().'.'.$extention;
            $file_image2->move($path_p,$file_image2name);

            if(File::exists($produit->image2)){
                File::delete($produit->image2);
            }
            //dd($path_p.$file_image2name);
            $produit->update(['image2',$path_p.$file_image2name]);
        }

        if(null !==$request->file('image3')) {
            $file_image3 = $request->file('image3');
            $extention = $file_image3->getClientOriginalExtension();
            $file_image3name = time().'.'.$extention;
            $file_image3->move($path_p,$file_image3name);

            if(File::exists($produit->image3)){
                File::delete($produit->image3);
            }
            $produit->update(['image3',$path_p.$file_image3name]);
        }
       
         
         return redirect('artisan/produits');
        
        }
        

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produits = produits::find($id);
        $produits->delete();
        return redirect('artisan/produits');
    }
    public function showTrash(){
        $produit = produits::onlyTrashed()->get();

        return view('artisan/produits/trash')->with('produits',$produit);
    }
    public function restore(string $id){
        produits::where('id',$id)->restore();
        return redirect('artisan/produits');
    }
}
