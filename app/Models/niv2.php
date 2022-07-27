<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niv2 extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'niv2';
    protected $primaryKey = 'id_niv2';
    protected $fillable = ['id_niv2','nom_niv2','id_niv1'];
}
