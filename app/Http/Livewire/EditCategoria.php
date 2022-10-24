<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class EditCategoria extends Component
{
    public $nome;
    public $rotulo;
    public $categoria;
    public $categoria_id;
    public function render()
    {
        return view('livewire.edit-categoria');
    }

    public function mount($categoria){
        $this->categoria_id = $categoria->id;
        $this->rotulo = $categoria->rotulo;
        $this->nome = $categoria->nome;
    }
    public function update($categoria_id){
        $this->validate([
            'nome' => 'required|max:255',
            'rotulo' => 'required',
        ]);
        $categoriaUpdate = Categoria::find($categoria_id);
        $categoriaUpdate->update([
            'nome' => $this->nome,
            'rotulo' => $this->rotulo,
        ]);
        return redirect()->route('categorias.index')->with('success', 'Registo Actualizado com sucesso');
    }
}
