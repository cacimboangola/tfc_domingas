<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RhRubrica extends Model
{
    use HasFactory;
    
    public $table = 'rhRubricas';

    protected $fillable = ['empresa', 'rubrica', 'descricao', 'un', 'fixo', 'manual'];
}
