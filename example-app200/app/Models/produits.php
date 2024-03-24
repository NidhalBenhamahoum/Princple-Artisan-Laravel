<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class produits extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id_produit',
        'nom_produit',
        'prix',
        'description',
        'nb_rest',
        'image_principle',
        'image1',
        'image2',
        'image3',
        'type_paiement',
        'disponible_wilaya',
        'artisan_id','categorie_id',
    ];
    protected $casts = [
        'artisan_id' => 'integer',
        'categorie_id' => 'integer', // Change 'integer' to the appropriate numeric type
    ];
    public function artisan(){
        return $this->belongsTo(Artisan::class);
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    public function commands(){
        return $this->hasMany(Command::class);
    }
}
