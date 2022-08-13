<?php

namespace App\Services;

use App\Models\ListArtigos;
use App\Models\ListArtigosArmazem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ListArtigosServices
{

    public static function getLojas($nifs)
    {
        $empresas = array();
        foreach ($nifs as $nif) {
            $response = Http::get('https://cacimboweb.com/api/get-empresa/'.$nif);
            $dado = json_decode($response->getBody()->getContents());
            array_push($empresas, $dado);
        }
        return $empresas;
    }
    public static function getProduct($id){
        return ListArtigos::find($id);
    }
    public static function getAllLojas($nifs)
    {
        $response = Http::get('https://cacimboweb.com/api/empresas');
        $dado = json_decode($response->getBody()->getContents());
        $lojas = collect($dado);
        $lojaFiltrada = $lojas->whereIn("nif", $nifs);
        return $lojaFiltrada->all();
    }
    public static function getAllCategories(){
        $families = ListArtigos::select("categoria","familia", "subFamilia")->distinct()->orderBy("categoria")->get();
        $categoriesArray = $families->groupBy("categoria");
        $categories = $categoriesArray->all();
        return $categories;
    }
    public static function getAllCategoriesFamilyByNif($nif){
        $families = ListArtigos::select("categoria","familia", "subFamilia")
        ->distinct()
        ->where("CompanyID", $nif)
        ->orderBy("categoria")
        ->get();
        $categoriesArray = $families->groupBy("categoria");
        $categories = $categoriesArray->all();
        return $categories;
    }

    public static function getAllArmazensByNif($nif){
        $armazens = ListArtigosArmazem::query()
        ->where("CompanyID", $nif)
        ->orderBy("armazem")
        ->get();
        return $armazens;
    }

    public static function getAllCategoriesByNif($nif){
        $families = ListArtigos::select("familia", "subFamilia")
        ->distinct()
        ->where("CompanyID", $nif)
        ->orderBy("familia")
        ->get();
        $categoriesArray = $families->groupBy("familia");
        $categories = $categoriesArray->all();
        return $categories;
    }
    public static function getCategories($category){
        $families = ListArtigos::select("familia", "subFamilia")->where("categoria", $category)->distinct()->orderBy("familia")->get();
        return $families;
    }

    public static function getAllProdutcs(){
        return ListArtigos::with('images')->orderBy('designacao')->get();

    }
    public static function getProductsByMarginPrice(Request $request){
        return ListArtigos::when(isset($request->search), function($q) use($request){
            $q->whereBetween("pvp", [$request->min, $request->max] );
        })
        ->paginate(24);
    }

    public static function getProductsWithLikeInName($request){
        return ListArtigos::when(isset($request->search), function($q) use($request){
            $q->where("designacao", 'like', '%' .$request->search . '%' );
        })
        ->when(isset($request->category), function($q) use($request){
            $q->where("subfamilia", $request->category);
        })
        ->paginate(24);
    }

    public static function getAllProductsByCategory($categoria){
        return ListArtigos::where("subfamilia", $categoria)->orderBy("designacao")->get();
    }

    public static function getProductsByNif($nif){
        return ListArtigos::where("nif", $nif)->orderBy("designacao")->get();
    }

    public static function getInventoryValorizationByNif($nif, $request){
        $data = ListArtigos::query()
                            ->when(isset($request->valorizacao), function($q) use($request){
                                $q->selectRaw("COUNT(artigo) as qtd_artigos, SUM(stock * $request->valorizacao) as total_geral, Min(created_at) as sincronization_date");
                            })
                            ->when(!isset($request->valorizacao), function($q){
                                $q->selectRaw("COUNT(artigo) as qtd_artigos, SUM(stock * pcm) as total_geral, Min(created_at) as sincronization_date");
                            })
                            ->when(isset($request->armazens), function($q) use($request){
                                $q->whereIn('idArmazem', $request->armazens);
                            })
                            ->when(isset($request->modo) && ($request->modo=="destaque"), function($q) use($request){
                                $q->where(function($query) {
                                    $query->where('destaque', 1)
                                          ->orWhere('favorito', 1);
                                 });
                            })
                            ->where("CompanyID", $nif)
                            ->get();
        
       
        $dataArray = $data->toArray();
        $dataArray['0']["key"] = "Inventario";
        $dataArray['0']["documents"] = [];
        return $dataArray;

    }
    public static function getInventoryValorizationLinesByNif($nif, $request){
        $inventoryValorization = ListArtigos::query()
                                            ->when(isset($request->valorizacao), function($q) use($request){
                                                $q->selectRaw("artigo,idArmazem,stockUn, stockMin, tipo, familia, subfamilia, taxa, categoria, codigoBarras, movimentaStk, img, favorito, destaque, designacao, $request->valorizacao, stock, SUM(stock * $request->valorizacao) as total_geral");
                                            })
                                            ->when(!isset($request->valorizacao), function($q){
                                                $q->selectRaw("artigo, idArmazem, stockUn, stockMin, tipo, familia, subfamilia, taxa, categoria, codigoBarras, movimentaStk, img, favorito,destaque, designacao, pcm, stock, SUM(stock * pcm) as total_geral");
                                            })
                                            ->where("CompanyID", $nif)
                                            ->when(isset($request->armazens), function($q) use($request){
                                                $q->whereIn('idArmazem', $request->armazens);
                                            })
                                            ->when(isset($request->modo) && ($request->modo=="destaque"), function($q) use($request){
                                                $q->where(function($query) {
                                                    $query->where('destaque', 1)
                                                          ->orWhere('favorito', 1);
                                                 });
                                            })
                                            ->when(isset($request->modo) && ($request->modo=="inventario"), function($q) use($request){
                                                $q->where('movimentaStk', 1);
                                            })
                                            ->groupBy(["artigo","idArmazem"])
                                            ->paginate(50);
                                            
        return  $inventoryValorization ;

    }
    
}
