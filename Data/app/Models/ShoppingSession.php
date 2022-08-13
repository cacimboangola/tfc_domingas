<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\User;

class ShoppingSession extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'total'];

    /**
     * Get all of the cartItens for the ShoppingSession
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartItens()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get the user that owns the ShoppingSession
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function CalculateAndGetTotal($carts){
        foreach ($carts as $cartItem) {
            $this->total += $cartItem->getSubtotal();
        }
        return $this->total;
    }

    public function getTotal(){
        return $this->total;
    }
}
