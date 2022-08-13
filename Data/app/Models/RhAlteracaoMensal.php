<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhAlteracaoMensal extends Model
{
    use HasFactory;
    public $table = 'rhAlteracoesMensais';
    protected $fillable = ['empresa', 'funcionario', 'data', 'rubrica', 'quantidade', 'valor', 'motivo'];
}
