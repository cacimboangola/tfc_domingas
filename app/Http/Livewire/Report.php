<?php

namespace App\Http\Livewire;
use App\Models\Compra;
use App\Models\CompraItem;
use App\Models\Material;
use App\Models\Requisicao;

use App\Models\RequisicaoItem;
use Carbon\Carbon;
use Livewire\Component;

class Report extends Component
{
    public $data_inicio;
    public $data_fim;
    public $materiaisComprados;
    public $materiaisRequisitados;
    public $compras;
    public $requisicaos;
    public $totalGasto;
    public $totalArrecadado;
    public function render()
    {
        return view('livewire.report');
    }

    protected $rules = [
        'data_inicio' => 'required|date',
        'data_fim' => 'required|date|after_or_equal:data_inicio',
    ];
    protected $messages = [
        'data_fim.after_or_equal' => 'A data final deve ser Igaul ou Superior a Data Incial.',
        'data_inicio.required' => 'A data é um campo Obrigatorio.',
        'data_fim.required' => 'A data é um Campo Obrigatorio',
    ];

    public function mount(){
        //$this->data_inicio = Carbon::now();
        //$this->data_fim = Carbon::now();
        $this->compras = Compra::query()
                            ->whereBetween('created_at', [$this->data_inicio, $this->data_fim])
                            ->get();
        $this->requisicaos = Requisicao::query()
            ->whereBetween('created_at', [$this->data_inicio, $this->data_fim])
            ->get();
    }
    public function consultar(){
        $this->validate();
        $this->compras = Compra::query()
            ->with('itens')
            ->whereBetween('created_at', [$this->data_inicio, $this->data_fim])
            ->get();
        $this->requisicaos = Requisicao::query()
            ->with('itens')
            ->whereBetween('created_at', [$this->data_inicio, $this->data_fim])
            ->get();
        $this->totalGasto = CompraItem::query()
                                    ->selectRaw('SUM(compras.total) as total, SUM(materials.stock_actual) as stock_actual')
                                    ->join('compras', 'compras.id', '=', 'compra_items.compra_id')
                                    ->join('materials', 'materials.id', '=', 'compra_items.material_id')
                                    ->whereBetween('compras.created_at', [$this->data_inicio, $this->data_fim])
                                    ->first();
        $this->totalArrecadado = RequisicaoItem::query()
                                    ->selectRaw('SUM(requisicao_items.qtd_solicitada) as totalSolicitada, SUM(requisicao_items.qtd_recebida) as totalRecebida,SUM(requisicao_items.qtd_devolvida) as totalDevolvida')
                                    ->join('materials', 'materials.id', '=', 'requisicao_items.material_id')
                                    ->join('requisicaos', 'requisicaos.id', '=', 'requisicao_items.requisicao_id')
                                    ->whereBetween('requisicaos.created_at', [$this->data_inicio, $this->data_fim])
                                    ->first();
    }
}
