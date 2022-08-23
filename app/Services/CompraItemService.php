<?php

namespace App\Services;

use App\Models\CompraItem;
use App\Http\Requests\StoreCompraItemRequest;
use App\Http\Requests\UpdateCompraItemRequest;


class CompraItemService
{

    public static function insertOrUpdateCompraItem($request)
    {
        $compraItemData = $request->all();
        Compraitem::updateOrCreate(
            [
                
            ],$compraItemData);

    }
    public static function getAllCompraItemUser($id)
    {
        return CompraItem::where('user_id', $id)->get();
    }
    
}
