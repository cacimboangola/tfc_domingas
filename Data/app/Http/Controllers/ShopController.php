<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListArtigos;
use App\Models\ListArtigosArmazem;
use App\Services\ListArtigosServices;

class ShopController extends Controller
{
    //
    public function index(Request $request){

        $armazens = ListArtigosArmazem::all();
        $products_shop = ListArtigosServices::getProductsWithLikeInName($request);
        $familias = ListArtigos::select("familia", "subFamilia")->distinct()->orderBy("familia")->get();
        $categoriasArray = $familias->groupBy("familia");
        $categorias = $categoriasArray->all();
        $nifs = ListArtigos::select("nif")->distinct()->get()->pluck("nif");
        $lojas = ListArtigosServices::getAllLojas($nifs);
        return view('shop.index',compact("armazens","products_shop","categorias","lojas"));
    }
}
