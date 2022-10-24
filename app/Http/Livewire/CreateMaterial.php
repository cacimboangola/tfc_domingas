<?php

namespace App\Http\Livewire;

use App\Models\Material;
use Livewire\Component;

class CreateMaterial extends Component
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


    public function render()
    {
        return view('livewire.create-material');
    }
    public function store(){
        $this->validate([
            'nome' => 'required|max:255',
            'codigo' => 'required',
            'stock_min' => 'required|numeric',
            'stock_actual' => 'required|numeric',
            'categoria_id' => 'required|numeric',
            'stock_disponivel' => 'required|numeric',
            'preco' => 'required',
        ]);
        Material::create([
            'codigo' => $this->codigo,
            'stock_min' => $this->stock_min,
            'stock_actual' => $this->stock_actual,
            'categoria_id' => $this->categoria_id,
            'stock_disponivel' => $this->stock_disponivel,
            'preco' => $this->preco,
        ]);
        return redirect()->route('materials.index')->with('success', 'Registo Cadastrado com sucesso');
    }
    public function update($material){


    }
}
