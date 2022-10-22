<?php

namespace App\Services;

use App\Models\CompraItem;
use App\Http\Requests\StoreCompraItemRequest;
use App\Http\Requests\UpdateCompraItemRequest;


class CompraItemService
{

    public static function addItem($compra, $material){
        $compraItem['compra_id'] = $compra->id;
        $compraItem['material_id'] = $material->id;
        $compraItem['qtd'] = 1;
        $compraItemSaved = Cart::create($compraItem);
        $compraItemSaved->calculateAndSetSubTotal($material, $compraItem->qtd);
        return $compraItemSaved;
    }
    public static function getAllCartItensByUser($compra){
        $compraItens = CompraItem::where('compra_id', $compra->id)->get();
        return $compraItens;
    }

    public static function removeItem($compraItem){
        $compraItemDeleted = $compraItem->delete();
        return $compraItemDeleted;
    }

    public static function updateQuantity(CompraItem $compraItem, $quantity){
        $compraItem->qtd = $quantity;
        $compraItem->calculateAndSetSubTotal($compraItem->materials, $quantity);
        $compraItemUpdated = $compraItem->save();
        return $compraItemUpdated;
    }

}
