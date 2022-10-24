<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequisicaoRequest;
use App\Http\Requests\UpdateRequisicaoRequest;
use App\Models\Requisicao;
use App\Models\Material;
use App\Services\RequisicaoService;

class RequisicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisicaos = Requisicao::all();
        return view('Requisicaos.index', compact('requisicaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materials = Material::all();
        return view('requisicaos.create', compact('materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequisicaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequisicaoRequest $request)
    {
        Requisicao::create($request->all());
        return redirect()->back()->with(['success'=>'Requisicao Cadastrada com Sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisicao  $Requisicao
     * @return \Illuminate\Http\Response
     */
    public function show(Requisicao $requisicao)
    {
        return view('Requisicaos.show', compact('requisicao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisicao  $Requisicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisicao $requisicao)
    {
        $materials = Material::all();
        return view('requisicaos.edit', compact('materials','requisicao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequisicaoRequest  $request
     * @param  \App\Models\Requisicao  $Requisicao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequisicaoRequest $request, Requisicao $requisicao)
    {
        $requisicao->update($request->all());
        return redirect()->route('requisicaos.index')->with(['success'=>'Registo Actualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisicao  $Requisicao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisicao $requisicao)
    {
        $requisicao->delete();
        return redirect()->back()->with(['success'=>'Registo Eliminado com sucesso']);
    }
}
