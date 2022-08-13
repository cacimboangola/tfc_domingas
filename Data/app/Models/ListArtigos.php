<?php

namespace App\Models;

use App\Models\ListArtigosArmazem;
use App\Models\ProductsImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListArtigos extends Model
{
    public $table="listaArtigos";

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';


    /**
     * The primary key associated with the table.
     * when whe use a custom primary key, we need to add
     * theses keywords to use a relationship
     *
     * @var string
     */
    protected $primaryKey = 'idLinha';


    protected $fillable = ["idLinha", "nif", "idArmazem", "CompanyID", "idPreco", "artigo", "designacao", "lote", "cor", "referencias", "tipo", "familia", "subFamilia", "categoria", "stock", "stockUn", "pcm", "pcu", "pvp", "taxa", "codigoBarras", "destaque", "favorito", "stockMin", "movimentaStk", "img"];

    /**
     * Get all of the images for the ListArtigos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductsImage::class,'idLinha');
    }
    
    
  

}
