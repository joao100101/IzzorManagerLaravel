<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
class VendaController extends Controller
{
    //

    public function index(){
        $vendas = Venda::paginate(20);

        return view('vendas/venda-read');
    }
}
