<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materiaux extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $table = 'materiaux';
    protected $primaryKey = 'ref';
    protected $fillable = ['ref','detail_dechaet','masse_volumique','longeur','largeur','epaisseur','volume','code_dechet','id_lot','id_niv1'];  
}
