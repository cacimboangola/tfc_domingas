<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisicao extends Model
{
    use HasFactory;

    protected $fillable=[
        'data',
        'obs',
        'estado',
        'total',
        'user_id',
        

    ]; 

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getUserNameAttribute(){
        return $this->user()->name;
    }
    public function item_requisicao()
    {
        return $this->hasMany(RequisicaoItem::class, 'id_requisicao');
    }
}
