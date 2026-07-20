<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    /** @use HasFactory<\Database\Factories\LibroFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo',
        'autor',
        'genero',
        'anio_publicacion',
        'paginas',
        'disponible',
        'descripcion',
    ];

    protected $casts = [
        'disponible' => 'boolean',
        'anio_publicacion' => 'integer',
        'paginas' => 'integer',
    ];
}
