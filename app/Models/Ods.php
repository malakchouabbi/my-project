<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ods extends Model
{
    use HasFactory;

    protected $table = 'ods'; 
    protected $primaryKey = 'id_ods'; 
    public $timestamps = true; 
    
    protected $fillable = [
        'num_ods',           
        'num_bon_commande',  
        'date_bon_commande', 
        'date_ods',          
        'date_commence_execution', 
        'site_projet',        
        'objet',              
        'id_projet',          
    ];
    
public function projet()
{
    return $this->belongsTo(Projet::class, 'id_projet');
}



}

