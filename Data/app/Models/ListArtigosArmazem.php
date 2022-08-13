<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListArtigosArmazem extends Model
{
    public $table="listaArtigosArmazens";
    protected $fillable = ["id", "nif", "armazem", "idArmazem"];
}
