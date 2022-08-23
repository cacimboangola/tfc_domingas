<?php

namespace App\Http\Controllers;

use App\Models\RequisicaoItem;
use App\Http\Requests\StoreRequisicaoItemRequest;
use App\Http\Requests\UpdateRequisicaoItemRequest;
use App\Services\RequisicaoItemService;

class RequisicaoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requisicao.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRequisicaoItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequisicaoItemRequest $request)
    {
        RequisicaoItem::insertOrUpdateRequisicaoItem($request);
        return view('requisicao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequisicaoItem  $requisicaoItem
     * @return \Illuminate\Http\Response
     */
    public function show(RequisicaoItem $requisicaoItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequisicaoItem  $requisicaoItem
     * @return \Illuminate\Http\Response
     */
    public function edit(RequisicaoItem $requisicaoItem)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRequisicaoItemRequest  $request
     * @param  \App\Models\RequisicaoItem  $requisicaoItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequisicaoItemRequest $request, RequisicaoItem $requisicaoItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequisicaoItem  $requisicaoItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequisicaoItem $requisicaoItem)
    {
        //
    }
}
