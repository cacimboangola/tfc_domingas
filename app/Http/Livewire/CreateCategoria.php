<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class CreateCategoria extends Component
{

    public $nome;
    public $rotulo;
    public $categoria;
    public $categoria_id;

    public function mount($categoria){
        $this->categoria_id = $categoria->id;
        $this->preco = $categoria->preco;
        $this->nome = $categoria->nome;
    }
    public function store($categoria_id){
        $this->validate([
            'nome' => 'required|max:255',
            'rotulo' => 'required',
        ]);
        $categoriaUpdate = Categoria::find($categoria_id);
        $categoriaUpdate->create([
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
