<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Compra;

class CompraItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'qtd',
        'custo_unitario',
        'subtotal',
        'fornecedor_nome',
        'fornecedor_telefone',
        'fornecedor_endereco',
        'material_id',
        'user_id',
        'compra_id'
    ];

    public function calculateAndSetSubTotal(Material $product, $quantity){

        $this->subtotal = $product->preco * $quantity;
        $this->save();
    }

    public function material(){
        return  $this->belongsTo(Material::class, 'material_id');
    }
    public function user(){
        return    $this->belongsTo(User::class, 'user_id');
    }

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'compra_id');
    }
}
