<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;
    protected $primaryKey ='id_entreprise';
    protected $fillabel=
    ['nom_entreprise'];
    public function projets()
   { return
    $this->hasMany(projet::class,'id_entreprise');
   }
}
