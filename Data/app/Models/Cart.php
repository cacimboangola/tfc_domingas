<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ShoppingSession;
use App\Models\ListArtigos;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['shopping_session_id', 'idLinha', 'quantity', 'subtotal'];

    /**
     * Get the shoppingSession that owns the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shoppingSession()
    {
        return $this->belongsTo(ShoppingSession::class, 'shopping_session_id');
    }

    /**
     * Get the products that owns the Cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(ListArtigos::class, 'idLinha');
    }

    public function getSubtotal(){
        return $this->subtotal;
    }

    public function calculateAndSetSubTotal(ListArtigos $product, $quantity){

        $this->subtotal = $product->pvp * $quantity;
        $this->save();
    }
}
