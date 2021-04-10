<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $primary = "id";
    protected $fillable = [
        'apellido',
        'nombre',
        'email',
        'usuario'
    ];

    public $timestamps = false;
}
