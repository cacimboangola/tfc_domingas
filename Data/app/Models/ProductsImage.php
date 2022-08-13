<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ListArtigos;

class ProductsImage extends Model
{
    public $fillable=['idLinha', 'url'];

    /**
     * Get the ListaArtigos that owns the ProductsImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listaArtigos()
    {
        return $this->belongsTo(ListArtigos::class, 'idLinha');
    }
}
