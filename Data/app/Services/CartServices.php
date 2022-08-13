<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\ListArtigos;
use App\Models\ShoppingSession;
use App\Models\Cart;

class CartServices
{
    public static function addItem($user, $product){
        $sessionShopping = ShoppingSession::where('user_id',$user->id)->first();
        $cartItem['shopping_session_id'] = $sessionShopping->id;
        $cartItem['idLinha'] = $product->idLinha;
        $cartItem['quantity'] = 1;
        $cartSaved = Cart::create($cartItem);
        $cartSaved->calculateAndSetSubTotal($product, $cartSaved->quantity);
        return $cartSaved;
    }
    public static function getAllCartItensByUser($user){
        $sessionShopping = ShoppingSession::where('user_id',$user->id)->first();
        $cartItens = Cart::where('shopping_session_id', $sessionShopping->id)->get();
        return $cartItens;
    }

    public static function removeItem($cart){
        $cartDeleted = $cart->delete();
        return $cartDeleted;
    }

    public static function updateQuantity($cart, $quantity){
        $cart->quantity = $quantity;
        $cart->calculateAndSetSubTotal($cart->product, $quantity);
        $cartUpdated = $cart->save();
        return $cartUpdated;
    }
}
