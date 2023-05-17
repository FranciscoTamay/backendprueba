<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gatos extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = ['nombre','precio','descripcion','cantidad'];
}
