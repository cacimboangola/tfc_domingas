<?php

namespace App\Http\Controllers;

use App\Models\Requisicao;
use App\Http\Requests\StoreRequisicaoRequest;
use App\Http\Requests\UpdateRequisicaoRequest;
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
        $requisicao = RequisicaoService::getAllRequisicao();
        return view('requisicao.index', ['requisicao'=>$requisicao]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requisicao.criar_requisicao');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequisicaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequisicaoRequest $request)
    {
        Requisicao::insertOrUpdateRequisicao($request);
        return view('requisicao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function show(Requisicao $requisicao)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisicao $requisicao)
    {
        $requisicao = RequisicaoService::getAllRequisicaoById();
        return view('requisicao.criar_requisicao', ['requisicao'=>$requisicao]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequisicaoRequest  $request
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequisicaoRequest $request, Requisicao $requisicao)
    {
        Requisicao::insertOrUpdateRequisicao($request);
        return view('requisicao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisicao $requisicao)
    {
        //
    }
}
