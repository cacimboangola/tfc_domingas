<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'qtd',
        'custo_unitario',
        'subtotal',
        'material_id',
        'user_id',
        'compra_id'
    ];

    public function calculateAndSetSubTotal(Material $product, $quantity){

        $this->subtotal = $product->preco * $quantity;
        $this->save();
    }

    public function materials(){
        $this->hasMany(Material::class, 'material_id');
    }
    public function user(){
        $this->belongsTo(User::class, 'user_id');
    }

    public function getUserNameAttribute(){
        return $this->user()->name;
    }
    public function compra()
    {
        return $this->belogsTo(Compra::class, 'compra_id');
    }
}
