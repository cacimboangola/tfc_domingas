<?php

namespace App\Http\Livewire;

use App\Models\Compra;
use App\Models\CompraItem;
use App\Models\Material;
use Carbon\Carbon;
use Livewire\Component;

class CreateCompra extends Component
{
    public $compra_id;
    public $data;
    public $total;
    public $qtd = 1;
    public $custo_unitario;
    public $subtotal;
    public $material_id;
    public $compraItens;
    public $compra;
    public $materials;
    public $fornecedor_nome;
    public $fornecedor_telefone;
    public $fornecedor_endereco;


    protected $rules = [
        'compraItens.*.qtd' => 'required|number',
        'compraItens.*.subtotal' => 'required|number|max:500',
    ];
    public function render()
    {
        return view('livewire.create-compra');
    }
    public function mount(){
        $this->compra = Compra::updateOrCreate(['total' => 0],[
            $this->compra_id => Compra::max('id') + 1,
            $this->data => Carbon::now(),
            $this->total => 0
        ]);
        $this->compraItens = CompraItem::where('compra_id', $this->compra->id)->get();
    }
    public function updateQtd($item_id){
        $item = CompraItem::find($item_id);
        $item->update(['qtd'=>$this->qtd, 'subtotal'=>$this->qtd * $item->material->preco]);
        $this->compraItens = CompraItem::where('compra_id', $this->compra->id)->get();
        $this->dispatchBrowserEvent('toastr:success',
            [
                'message'=>'Item Actualizado com Sucesso'
            ]);
    }
    public function addItem($compra_id){
        $this->material = Material::find($this->material_id);
        $item = CompraItem::create(
            [
                'qtd' => $this->qtd,
                'custo_unitario' => $this->material->preco,
                'subtotal' => $this->qtd * $this->material->preco,
                'material_id' => $this->material_id,
                'compra_id' => $compra_id,
                'fornecedor_nome' => $this->fornecedor_nome,
                'fornecedor_telefone' => $this->fornecedor_telefone,
                'fornecedor_endereco' => $this->fornecedor_endereco
            ]
        );
        $this->compraItens->push($item);
        $this->dispatchBrowserEvent('toastr:success',
            [
                'message'=>'Item Adicionado com Sucesso'
            ]);
    }
    public function salvar($compra_id){
        $total = 0;
        $compra = Compra::find($compra_id);
        foreach ($compra->itens as $item){
            $stock = $this->material->stock_actual + $item->qtd;
            $total += $item->subtotal;
            $this->material->update(['stock_actual', $stock]);
        }
        $compra->update(['total' => $total]);
        return redirect()->route('compras.show', $compra->id)->with(['success'=>'Compra efectuada com sucesso']);
    }
    public function increment($item_id){
        $this->qtd++;
        $this->updateQtd($item_id);

    }
    public function decrement($item_id){
        $this->qtd--;
        $this->updateQtd($item_id);

    }
    public function removeItem($itemId){
        $item = CompraItem::find($itemId);
        $item->delete();
        $this->compraItens = $this->compraItens->except($itemId);
    }

}
