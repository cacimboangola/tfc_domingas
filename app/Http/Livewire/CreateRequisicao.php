<?php

namespace App\Http\Livewire;

use App\Models\Material;
use App\Models\Requisicao;
use App\Models\RequisicaoItem;
use Livewire\Component;
use \Carbon\Carbon;

class CreateRequisicao extends Component
{

    public $requisicao_id;
    public $data;
    public $total;
    public $qtd_solicitada = 1;
    public $qtd_recebida = 1;
    public $qtd_devolvida = 1;
    public $data_recebimento;
    public $data_devolucao;
    public $material_id;
    public $fornecedor_nome;
    public $fornecedor_telefone;
    public $fornecedor_endereco;
    public $obs;
    public $estado;
    public $user_id;
    public $requisicaoItens;
    public $requisicao;
    public $materials;


    protected $rules = [
        'requisicaoItens.*.qtd_solicitada' => 'required|number',
        'material_id' => 'required',
        'requisicaoItens.*.qtd_recebida' => 'required|number',
        'requisicaoItens.*.qtd_devolvida' => 'required|number',
        'requisicaoItens.*.qtd_solicitada' => 'required|number',
        'requisicaoItens.*.data_devolucao' => 'required|date',
        'requisicaoItens.*.data_recebimento' => 'required|date',
        'requisicaoItens.*.estado' => 'required',
        'requisicaoItens.*.obs' => 'required',
    ];
    public function mount(){
        $this->requisicao = Requisicao::updateOrCreate(['total' => 0],[
            $this->requisicao_id => Requisicao::max('id') + 1,
            $this->data => Carbon::now(),
            $this->total => 0,
            $this->obs => null,
            $this->estado => 1,
        ]);
        $this->requisicaoItens = RequisicaoItem::where('requisicao_id', $this->requisicao->id)->get();
    }
    public function updateQtd($item_id){
        $item = RequisicaoItem::find($item_id);
        $item->update([
            'qtd_solicitada'=>$this->qtd_solicitada,
            'qtd_recebida'=>$this->qtd_recebida,
            'qtd_devolvida' => $this->qtd_devolvida,
            'data_devolucao' => $this->data_devolucao,
            'data_recebimento'=>$this->data_recebimento,
            'fornecedor_nome' => $this->fornecedor_nome,
            'fornecedor_telefone' => $this->fornecedor_telefone,
            'fornecedor_endereco' => $this->fornecedor_endereco]);
        $this->requisicaoItens = RequisicaoItem::where('requisicao_id', $this->requisicao->id)->get();
        $this->dispatchBrowserEvent('toastr:success',
            [
                'message'=>'Quantidade Actualizada com sucesso'
            ]);
    }
    public function addItem($requisicao_id){
        $this->validate();
        //$total = 0;
        //$material= Material::find($this->material_id);
        $item = RequisicaoItem::create(
            [
                'qtd_solicitada' => 1,
                'qtd_recebida' => 1,
                'qtd_devolvida' => 1,
                'data_recebimento' => Carbon::now(),
                'data_devolucao' => Carbon::now(),
                'material_id' => $this->material_id,
                'requisicao_id' => $requisicao_id,
            ]
        );
        $this->qtd_solicitada =1;
        $this->qtd_recebida = 1;
        $this->qtd_devolvida = 1;
        $this->requisicaoItens->push($item);
        $this->dispatchBrowserEvent('toastr:success',
            [
                'message'=>'Item Adicionado com Sucesso'
            ]);
    }
    public function updateQtdSolicitada($item_id){
        $item = RequisicaoItem::find($item_id);
        $item->update([
            'qtd_solicitada' => $this->qtd_solicitada,
        ]);
        $this->requisicaoItens = RequisicaoItem::where('requisicao_id', $this->requisicao->id)->get();

    }
    public function updateQtdRecebida($item_id){
        $item = RequisicaoItem::find($item_id);
        $item->update([
            'qtd_recebida' => $this->qtd_recebida,
        ]);
        $this->requisicaoItens = RequisicaoItem::where('requisicao_id', $this->requisicao->id)->get();

    }
    public function updateQtdDevolvida($item_id){
        $item = RequisicaoItem::find($item_id);
        $item->update([
            'qtd_devolvida' => $this->qtd_devolvida,
        ]);
        $this->requisicaoItens = RequisicaoItem::where('requisicao_id', $this->requisicao->id)->get();

    }
    public function updateDataRecebimento($item_id){
        $item = RequisicaoItem::find($item_id);
        $item->update([
            'data_recebimento' => $this->data_recebimento,
        ]);
        $this->requisicaoItens = RequisicaoItem::where('requisicao_id', $this->requisicao->id)->get();

    }
    public function updateDataDevolucao($item_id){
        $item = RequisicaoItem::find($item_id);
        $item->update([
            'data_devolucao' => $this->data_devolucao,
        ]);
        $this->requisicaoItens = RequisicaoItem::where('requisicao_id', $this->requisicao->id)->get();

    }
    public function salvar($requisicao_id){
        $total = 0;
        $requisicao = Requisicao::find($requisicao_id);
        foreach ($requisicao->itens as $item){
            $stock = $item->material->stock_actual + $item->qtd_recebida;
            $total += $item->qtd_solicitada * $item->material->preco;
            $item->material->update(['stock_actual', $stock]);
        }
        $requisicao->update(['total' => $total]);
        return redirect()->route('requisicaos.show', $requisicao->id)->with(['success'=>'Requisição efectuada com sucesso']);
    }
    public function incrementQtdSolicitada($item_id){
        $this->qtd_solicitada++;
        $this->updateQtd($item_id);

    }
    public function decrementQtdSolicitada($item_id){
        $this->qtd_solicitada--;
        $this->updateQtd($item_id);

    }
    public function incrementQtdDevolvida($item_id){
        $this->qtd_devolvida++;
        $this->updateQtd($item_id);

    }
    public function decrementQtdDevolvida($item_id){
        $this->qtd_devolvida--;
        $this->updateQtd($item_id);

    }
    public function incrementQtdRecebida($item_id){
        $this->qtd_recebida++;
        $this->updateQtd($item_id);

    }
    public function decrementRecebida($item_id){
        $this->qtd_recebida--;
        $this->updateQtd($item_id);

    }
    public function removeItem($itemId){
        $item = RequisicaoItem::find($itemId);
        $item->delete();
        $this->requisicaoItens = $this->requisicaoItens->except($itemId);
        $this->dispatchBrowserEvent('toastr:danger',
            [
                'message'=>'Item Removido com Sucesso'
            ]);
    }
    public function render()
    {
        return view('livewire.create-requisicao');
    }
}
