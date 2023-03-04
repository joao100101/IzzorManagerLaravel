<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;

class Produto extends Model
{
    use HasFactory;


    public function materiais()
    {
        return $this->belongsToMany(Material::class, 'produto_material')
                    ->withPivot('quantidade', 'preco_unitario');
    }
}
