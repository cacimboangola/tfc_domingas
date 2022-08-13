<?php

namespace App\Http\Controllers;

use App\Http\Resources\ListArtigosResource;
use App\Models\ListArtigos;
use App\Models\ListArtigosArmazem;
use App\Services\ListArtigosServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ListArtigosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $armazens = ListArtigosArmazem::all();
        $artigos = ListArtigos::orderBy("designacao")->paginate(25);
        $familias = ListArtigos::select("familia", "subFamilia")->distinct()->orderBy("familia")->get();
        $categoriasArray = $familias->groupBy("familia");
        $categorias = $categoriasArray->all();
        $nifs = ListArtigos::select("nif")->distinct()->get()->pluck("nif");
        $lojas = ListArtigosServices::getAllLojas($nifs);
        $allCategories = ListArtigosServices::getAllCategories();
        return view("artigos.index",compact("armazens","artigos","categorias","lojas","Allcategories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListArtigos  $listArtigos
     * @return \Illuminate\Http\Response
     */
    public function show(ListArtigos $listArtigos)
    {
        $product = $listArtigos;
        $subFamilia = ListArtigos::select("subFamilia")->distinct()->orderBy("subFamilia")->get();
        
        return view("artigos.show",compact("product","subFamilia"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListArtigos  $listArtigos
     * @return \Illuminate\Http\Response
     */
    public function edit(ListArtigos $listArtigos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListArtigos  $listArtigos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListArtigos $listArtigos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListArtigos  $listArtigos
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListArtigos $listArtigos)
    {
        //
    }
}
