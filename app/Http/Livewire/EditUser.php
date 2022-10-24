<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $tipo;
    public $user_id;
    public $user;


    protected $rules = [
        'name' => 'required|min:6|max:255',
        'email' => 'required|email',
        'tipo' => 'required|max:100',
    ];
    protected $messages = [
        'name.min' =>'O nome deve conter no minimo 6 Letras',
        'email.email' =>'Preencha um email valido',
        'password.min' =>'A Senha deve ter no minimo 8 caracteres',
    ];

    public function mount($user){
        $this->name = $user->name;
        $this->email = $user->email;
        $this->tipo = $user->tipo;
    }

    public function update(){
        $this->validate();
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'tipo' => $this->tipo,
        ]);
        return redirect()->route('users.index')->with(['success' => 'Utilizador Actualizado com Sucesso']);
    }
    public function render()
    {
        return view('livewire.edit-user');
    }
}
