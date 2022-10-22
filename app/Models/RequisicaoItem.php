<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;

class RequisicaoItem extends Model
{
    use HasFactory;
    protected $fillable =[
        'qtd_solicitada',
        'qtd_recebida',
        'qtd_devolvida',
        'data_recebimento',
        'data_devolucao',
        'material_id',
        'user_id',
        'requisicao_id',
        'subtotal'
    ];
    public function material(){
        return $this->hasMany(Material::class, 'material_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getUserNameAttribute(){
        return $this->user()->name;
    }
    public function requisicao()
    {
        return $this->belongsTo(Requisicao::class, 'requisicao_id');
    }

    public function calculateAndSetSubTotal(Material $product, $quantity){

        $this->subtotal = $product->preco * $quantity;
        $this->save();
    }
}
