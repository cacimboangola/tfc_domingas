<?php

namespace App\Services;

use App\Models\Requisicao;
use App\Http\Requests\StoreRequisicaoRequest;
use App\Http\Requests\UpdateRequisicaoRequest;

class RequisicaoService
{

    public static function insertOrUpdateRequisicao($request)
    {

        $requisicao_item_Data = $request->all();
        Requisicao::updateOrCreate(
            [
                
               
            ],$materialData);
    }
    public static function getAllRequisicao(){
        return Requisicao::all();
    }
    public static function getAllRequisicaoById($id)
    {
        return Requisicao::where('id', $id)->firts();
    }
    public static function getAllRequisicaoByUser($user_id)
    {
        return Requisicao::where('user_id', $user_id)->get();

    }
    public static function getAllRequisicaoByDate($data)
    {
        return Requisicao::where('data', $data)->get();
    }
    public static function getAllRequisicaoByEstado($estado)
    {

        return Requisicao::where('estado', $estado)->get();

    }
    
}