<?php

namespace App\Services;

use App\Models\Requisicao;
use App\Models\RequisicaoItem;
use App\Http\Requests\StoreRequisicaoItemRequest;
use App\Http\Requests\UpdateRequisicaoItemRequest;
use Illuminate\Http\Request;

class RequisicaoItemService
{

    public static function addItem($compra, $material, $request){
        $requisicaoItem['compra_id'] = $compra->id;
        $requisicaoItem['material_id'] = $material->id;
        $requisicaoItem['qtd_solicitada'] = $request['qtd_solicitada'];
        $requisicaoItemSaved = RequisicaoItem::create($requisicaoItem);
        $requisicaoItemSaved->calculateAndSetSubTotal($material, $requisicaoItem->qtd);
        return $requisicaoItemSaved;
    }
    public static function getAllCartItensByUser($user){
        $requisicao= Requisicao::where('user_id',$user->id)->first();
        $requisicaoItens = RequisicaoItem::where('requisicao_id', $requisicao->id)->get();
        return $requisicaoItens;
    }

    public static function removeItem($requisicaoItem){
        $requisicaoItemDeleted = $requisicaoItem->delete();
        return $requisicaoItemDeleted;
    }

    public static function updateQuantity(requisicaoItem $requisicaoItem, $quantity){
        $requisicaoItem->qtd_solicitada = $quantity;
        $requisicaoItem->calculateAndSetSubTotal($requisicaoItem->materials, $quantity);
        $requisicaoItemUpdated = $requisicaoItem->save();
        return $requisicaoItemUpdated;
    }
}
