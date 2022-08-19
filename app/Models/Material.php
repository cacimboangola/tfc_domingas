<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'perecivel',
        'stock_min',
        'stock_actual',
        'categoria_id',
        'stock_disponivel'
    ];
    public function categoria(){
        $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
