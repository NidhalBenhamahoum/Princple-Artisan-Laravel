<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Command extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'etat',
        'Qte',
        'type_paiement',
    ];
    public function produit(){
      return $this->belongsTo(produits::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function paiement(){
        return $this->belongsTo(Paiement::class);
    }
    public function livrision(){
        return $this->belongsTo(Livrision::class);
    }
}
