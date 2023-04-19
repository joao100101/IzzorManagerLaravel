<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;
class Plataforma extends Model
{
    protected $table = 'plataformas';
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Produto::class);
    }

    protected $guarded = [];
}
