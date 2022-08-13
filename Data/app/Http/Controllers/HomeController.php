<?php

namespace App\Http\Controllers;

use App\Models\ListArtigos;
use App\Models\ListArtigosArmazem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\ListArtigosServices;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     *
    public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $armazens = ListArtigosArmazem::all();
        $popular_products = ListArtigos::orderBy("designacao")->limit(30)->get();
        $new_products = ListArtigos::orderBy('designacao')->limit(30)->offset(600)->get();
        $familias = ListArtigos::select("familia", "subFamilia")->distinct()->orderBy("familia")->get();
        $categoriasArray = $familias->groupBy("familia");
        $categorias = $categoriasArray->all();
        $nifs = ListArtigos::select("nif")->distinct()->get()->pluck("nif");
        $lojas = ListArtigosServices::getAllLojas($nifs);
        $allCategories = ListArtigosServices::getAllCategories();

        return view("artigos.index",compact("armazens","popular_products","new_products","categorias","lojas", "allCategories"));
    }
}
