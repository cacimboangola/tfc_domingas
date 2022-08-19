<?php

namespace App\Services;

use App\Models\Categoria;

class CategoriaService
{

    public static function getAllCategories(){
        return Categoria::all();
    }
}
