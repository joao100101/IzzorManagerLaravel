<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Categoria extends Model
{
    use HasFactory;


    protected $casts = [
        'items' => 'array'
    ];

    protected $dates = ['date'];

    protected $guarded = [];


    public function Produto(){
        return $this->belongsTo(Produto::class);
    }
}
