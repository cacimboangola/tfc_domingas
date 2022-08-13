<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventario;

class InventarioLinha extends Model
{
    protected $fillable = ['artigo','codigo_barras','descricao','stock','contagem','contado', 'invetario_id'];
    //use HasFactory;

    public function inventario(){
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }
}
