<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ListArtigosArmazemResource;
use App\Http\Resources\ListArtigosResource;
use App\Services\ListArtigosServices;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
   public function getAllProdutcs(){
       $products = ListArtigosServices::getAllProdutcs();
       return ListArtigosResource::collection($products);
   }
   public function getProduct($id){
       $product = ListArtigosServices::getProduct($id);
       return new ListArtigosResource($product);
   }

   public function getProductsWithLikeInName(Request $request){
    $products = ListArtigosServices::getProductsWithLikeInName($request);
    return ListArtigosResource::collection($products);
   }

    public function getProductsByNif($nif){
        return ListArtigosResource::collection(ListArtigosServices::getProductsByNif($nif));
    }
    public function getInventoryValorizationByNif($nif, Request $request){
        return ListArtigosResource::collection(ListArtigosServices::getInventoryValorizationByNif($nif, $request));
    }
    public function getInventoryValorizationLinesByNif($nif, Request $request){
        return ListArtigosResource::collection(ListArtigosServices::getInventoryValorizationLinesByNif($nif, $request));
    }
    public function getAllCategoriesByNif($nif){
        return ListArtigosResource::collection(ListArtigosServices::getAllCategoriesByNif($nif));
    }
    public function getAllArmazensByNif($nif){
        return ListArtigosArmazemResource::collection(ListArtigosServices::getAllArmazensByNif($nif));
    }


    
}
