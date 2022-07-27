<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niv1 extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'niv1';
    protected $primaryKey = 'id_niv1';
    protected $fillable = ['id_niv1','nom_niv1'];
}
