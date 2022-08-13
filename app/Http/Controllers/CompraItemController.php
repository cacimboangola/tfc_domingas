<?php

namespace App\Http\Controllers;

use App\Models\CompraItem;
use App\Http\Requests\StoreCompraItemRequest;
use App\Http\Requests\UpdateCompraItemRequest;

class CompraItemController extends Controller
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
     * @param  \App\Http\Requests\StoreCompraItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompraItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompraItem  $compraItem
     * @return \Illuminate\Http\Response
     */
    public function show(CompraItem $compraItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompraItem  $compraItem
     * @return \Illuminate\Http\Response
     */
    public function edit(CompraItem $compraItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompraItemRequest  $request
     * @param  \App\Models\CompraItem  $compraItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompraItemRequest $request, CompraItem $compraItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompraItem  $compraItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompraItem $compraItem)
    {
        //
    }
}
