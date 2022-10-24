<?php

namespace App\Http\Livewire;

use App\Models\Material;
use Livewire\Component;

class EditMaterial extends Component
{
    public $categories;
    public $codigo;
    public $perecivel;
    public $stock_min;
    public $stock_actual;
    public $categoria_id;
    public $stock_disponivel;
    public $preco;
    public $nome;
    public $material_id;
    public $material;
    public function render()
    {
        return view('livewire.edit-material');
    }
    public function mount(){
        $this->material_id = $this->material->id;
        $this->preco = $this->material->preco;
        $this->nome = $this->material->nome;
        $this->categoria_id = $this->material->categoria_id;
        $this->perecivel = $this->material->perecivel;
        $this->stock_disponivel = $this->material->stock_disponivel;
        $this->stock_actual = $this->material->stock_actual;
        $this->stock_min = $this->material->stock_min;
        $this->codigo = $this->material->codigo;
    }
    public function update($material_id){
        $this->validate([
            'nome' => 'required|max:255',
            'codigo' => 'required',
            'stock_min' => 'required|numeric',
            'stock_actual' => 'required|numeric',
            'categoria_id' => 'required|numeric',
            'stock_disponivel' => 'required|numeric',
            'preco' => 'required',
        ]);
        $materialUpdate = Material::find($material_id);
        $materialUpdate->update([
            'codigo' => $this->codigo,
            'nome' => $this->nome,
            'stock_min' => $this->stock_min,
            'stock_actual' => $this->stock_actual,
            'categoria_id' => $this->categoria_id,
            'stock_disponivel' => $this->stock_disponivel,
            'preco' => $this->preco,
        ]);
        return redirect()->route('materials.index')->with('success', 'Registo Actualizado com sucesso');
    }
}
