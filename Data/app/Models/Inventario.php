<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InventarioLinha;

class Inventario extends Model
{
    protected $fillable = ['nif','chave','data_inicio','data_fim','finalizado','fim_app'];
    //use HasFactory;

    public function inventario_linhas(){
        return $this->hasMany(InventarioLinha::class);
    }
}
