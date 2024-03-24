<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livrision extends Model
{
    use HasFactory;
    protected $fillable = [
        'etat',
        'type',
        'nom_agent',
    ];
    public function commands(){
        return $this->hasMany(Command::class);
    }
}
