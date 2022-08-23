<?php

namespace App\Services;

use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;

class MaterialService
{
    public static function insertOrUpdateMaterial($request){

        $materialData = $request->all();
        Material::updateOrCreate(
            [
                'codigo' =>$materialData['codigo']
               
            ],$materialData);
    }
    public static function getAllMaterials(){
        return Material::all();
    }

    public static function getMaterialByCodigo($codigo){

        return Material::query()
                        ->where('codigo', $codigo)
                        ->first();
    }
    



}
