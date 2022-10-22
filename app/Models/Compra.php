<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $fillable = [
        'data',
        'total',
        'user_id'
    ];

    public function user(){
        $this->belongsTo(User::class, 'user_id');
    }

    public function getUserNameAttribute(){
        return $this->user()->name;
    }

    public function itens(){
        return $this->hasMany(CompraItem::class);
    }
}
