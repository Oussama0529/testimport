<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cerfa extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'cerfa ';
    protected $primaryKey = 'id_cerfa';
    protected $fillable = ['id_cerfa','cerfa'];
}
