<?php

namespace App\Services;

use App\Models\Categoria;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;

class CategoriaService
{
    public static function insertOrUpdateCategoria($request)
    {
        $categoryData = $request->all();
        Categoria::updateOrCreate(
            [
                'nome' => $categoryData['nome'],
                
           ], $categoryData);
    } 
    
    public static function getAllCategories()
    {
        return Categoria::all();
    }
    public static function getCategoryByName($nome)
    {
        return Categoria::where('nome', $nome)->first();
    }
    
}
