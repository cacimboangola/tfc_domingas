<?php

namespace App\Services;

use App\Models\RequisicaoItem;
use App\Http\Requests\StoreRequisicaoItemRequest;
use App\Http\Requests\UpdateRequisicaoItemRequest;

class RequisicaoItemService
{

    public static function insertOrUpdateRequisicaoItem($request)
    {

        $requisicao_item_Data = $request->all();
        RequisicaoItem::updateOrCreate(
            [
                
               
            ],$materialData);
    }
    public static function getAllRequisicaoItem(){
        return RequisicaoItem::all();
    }
}