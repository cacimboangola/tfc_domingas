<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $tipo;


    protected $rules = [
            'name' => 'required|min:6|max:255',
            'email' => 'required|email',
            'tipo' => 'required|max:100',
            'password' => 'required|min:8'
        ];
    protected $messages = [
        'name.min' =>'O nome deve conter no minimo 6 Letras',
        'email.email' =>'Preencha um email valido',
        'password.min' =>'A Senha deve ter no minimo 8 caracteres',
    ];

    public function store(){
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'tipo' => $this->tipo,
            'password' => Hash::make( $this->password )
        ]);
        return redirect()->route('users.index')->with(['success' => 'Utilizador Cadastrado com Sucesso']);
    }
    public function render()
    {
        return view('livewire.create-user');
    }
}
