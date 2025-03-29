<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Projet extends Model
{
    use HasFactory;
    protected $primaryKey ='id_projet';
    protected $fillable = [
        'titre_projet',
        'date_debut',
        'date_fin',
        'duree',
        'etat_projet',
        'id_cmp',
        'id_entreprise'
    ];

    public function cmp()
    {
        return $this->belongsTo(CMP::class, 'id_cmp');
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'id_entreprise');
    }
}
