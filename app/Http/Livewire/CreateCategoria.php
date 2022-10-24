<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class CreateCategoria extends Component
{

    public $nome;
    public $rotulo;
    public $categoria_id;


    public function store(){
        $this->validate([
            'nome' => 'required|max:255',
            'rotulo' => 'required',
        ]);
        Categoria::create([
            'nome' => $this->nome,
            'rotulo' => $this->rotulo,
        ]);
        return redirect()->route('categorias.index')->with('success', 'Registo Actualizado com sucesso');
    }
    public function render()
    {
        return view('livewire.create-categoria');
    }
}
