<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cmp extends Model
{
    use HasFactory;

    protected $table = 'cmps'; 
    protected $primaryKey = 'id_cmp';
    protected $fillable = [
        'nom_cmp',
        'localisation',
        'responsable',
    ];

    
    public function projets()
    {
        return $this->hasMany(Projet::class, 'id_cmp');
    }
}

