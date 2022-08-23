<?php

namespace App\Services;

use App\Models\Compra;
use App\Http\Requests\StoreCompraRequest;
use App\Http\Requests\UpdateCompraRequest;

class CompraService
{
    public static function insertOrUpdateCompra()
    {
        $compraData = $request->all();
        Compra::updateOrCreate(
            [
              'nome' => $compraData['nome']
            ], $compraData);
    }

    public static function getAllCompraUser($id_user)
    {
        return Compra::where('user_id',$id_user)->get();
    }
    public static function getAllCompraById($id)
    {
        return Compra::where('id', $id)->first();
    }
    public static function getAllCompra()
    {
        return Compra::all();
    }
}