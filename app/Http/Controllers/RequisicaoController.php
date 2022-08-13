<?php

namespace App\Http\Controllers;

use App\Models\Requisicao;
use App\Http\Requests\StoreRequisicaoRequest;
use App\Http\Requests\UpdateRequisicaoRequest;

class RequisicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreRequisicaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequisicaoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function show(Requisicao $requisicao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisicao  $requisicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisicao $requisicao)
    {
        //
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
        //
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
