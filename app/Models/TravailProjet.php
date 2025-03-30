<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravailProjet extends Model
{
    use HasFactory;

    protected $table = 'travaux_projet';

    protected $fillable = [
        'id_projet',
        'folder_name',
        'latitude',
        'longitude',
        'title',
        'description',
        'color',
        'status'
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class, 'projet_id','id_projet');
    }
}
