<?php

namespace App\Http\Controllers;

use App\Models\InventarioLinha;
use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioLinhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($inv_id)
    {
        //
        //$inventario = Inventario::where('nif', $nif)->where('chave', $chave)->first();

        $inv_linhas = InventarioLinha::where('inventario_id', $inv_id)->orderBy("descricao")->paginate(2000);
        if(count($inv_linhas) > 0)
            return response()->json($inv_linhas, 200);
        else
            return response()->json(['msg'=>'Sem dados para serem exibidos'], 200);
    }

    public function index1($nif, $chave)
    {
        //
        $inventario = Inventario::where('nif', $nif)->where('chave', $chave)->first();

        //$inv_linhas = InventarioLinha::select('inventario_linhas.id','inventario_linhas.artigo', 'inventario_linhas.descricao', 'inventario_linhas.contagem')->where('inventario_id', $inventario->id)->get();
        
        $inv_linhas = InventarioLinha::where('inventario_id', $inventario->id)->orderBy("descricao")->paginate(2000);
        if(count($inv_linhas) > 0)
            return response()->json($inv_linhas, 200);
        else
            return response()->json(['msg'=>'Sem dados para serem exibidos'], 200);
    }
    
     public function contado($nif, $chave)
    {
        //
        $inventario = Inventario::where('nif', $nif)->where('chave', $chave)->first();

        //$inv_linhas = InventarioLinha::select('inventario_linhas.id','inventario_linhas.artigo', 'inventario_linhas.descricao', 'inventario_linhas.contagem')->where('inventario_id', $inventario->id)->get();
        $inv_linhas = InventarioLinha::where('inventario_id', $inventario->id)->where('contado', 1)->where('contagem', '>', 0)->orderBy("descricao")->paginate(2000);
        if(count($inv_linhas) > 0)
            return response()->json($inv_linhas, 200);
        else
            return response()->json(['msg'=>'Sem dados para serem exibidos'], 200);
    }

    public function nContado($nif, $chave)
    {
        //
        $inventario = Inventario::where('nif', $nif)->where('chave', $chave)->first();

        //$inv_linhas = InventarioLinha::select('inventario_linhas.id','inventario_linhas.artigo', 'inventario_linhas.descricao', 'inventario_linhas.contagem')->where('inventario_id', $inventario->id)->get();
        $inv_linhas = InventarioLinha::where('inventario_id', $inventario->id)->where('contado', 0)->orderBy("descricao")->paginate(2000);
        if(count($inv_linhas) > 0)
            return response()->json($inv_linhas, 200);
        else
            return response()->json(['msg'=>'Sem dados para serem exibidos'], 200);
    }

    public function contadoZero($nif, $chave)
    {
        //
        $inventario = Inventario::where('nif', $nif)->where('chave', $chave)->first();
        $inv_linhas = InventarioLinha::where('inventario_id', $inventario->id)->where('contado', 1)->where('contagem', 0)->orderBy("descricao")->paginate(2000);
        if(count($inv_linhas) > 0)
            return response()->json($inv_linhas, 200);
        else
            return response()->json(['msg'=>'Sem dados para serem exibidos'], 200);
    }
    public function todos($nif, $chave)
    {
        //
        $inventario = Inventario::where('nif', $nif)->where('chave', $chave)->first();
        $inv_linhas = InventarioLinha::where('inventario_id', $inventario->id)->orderBy("descricao")->get();
        if(count($inv_linhas) > 0)
            return response()->json($inv_linhas, 200);
        else
            return response()->json(['msg'=>'Sem dados para serem exibidos'], 200);
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
     * @param  \App\Models\InventarioLinha  $inventarioLinha
     * @return \Illuminate\Http\Response
     */
    public function show(InventarioLinha $inventarioLinha)
    {
        //
        if($inventarioLinha)
            return response()->json($inventarioLinha, 200);
        else
            return response()->json(['msg'=>'O registo q tentou localizar não existe!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventarioLinha  $inventarioLinha
     * @return \Illuminate\Http\Response
     */
    public function edit(InventarioLinha $inventarioLinha)
    {
        //
    }
    public function editarQuantidadeContada(Request $request, InventarioLinha $inventarioLinha){
        $dados['contagem'] = $request->quantidade;
        $dados['contado'] = 1;
        $inventarioLinha->update($dados);
        return response()->json(['msg'=>'Actualizado com sucesso',$inventarioLinha], 200);
    }
    
    public function editarNaoContar(InventarioLinha $inventarioLinha){
        $dados['contagem'] = 0;
        $dados['contado'] = 0;
        $inventarioLinha->update($dados);
        return response()->json(['msg'=>'Actualizado com sucesso',$inventarioLinha], 200);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InventarioLinha  $inventarioLinha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventarioLinha $inventarioLinha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventarioLinha  $inventarioLinha
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventarioLinha $inventarioLinha)
    {
        //
    }
}
