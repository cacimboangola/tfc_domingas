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
        'stock_disponivel',
        'preco',
        'nome'
    ];
    public function categoria(){
       return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function compraItens(){
        return $this->hasMany(CompraItem::class);
    }
    public function requisicaoItens(){
        return $this->hasMany(RequisicaoItem::class);
    }
}
