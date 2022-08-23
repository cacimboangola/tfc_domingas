<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use App\Services\CategoriaService;
use App\Services\MaterialService;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaCategoria = CategoriaService::getAllCategories();
        $materials = MaterialService::getAllMaterials();
        return  view('material.index', ['$materials'=> $materials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaCategoria = CategoriaService::getAllCategories();
        return  view('material.index', ['listaCategoria' => $listaCategoria]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMaterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaterialRequest $request)
    {
       
        MaterialService::insertOrUpdateMaterial($request);
        return view('material.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        $listaCategoria = CategoriaService::getAllCategories();
        return  view('material.index', compact($material));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMaterialRequest  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMaterialRequest $request, Material $material)
    {
        
        MaterialService::insertOrUpdateMaterial($request);
        return view('material.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
}
