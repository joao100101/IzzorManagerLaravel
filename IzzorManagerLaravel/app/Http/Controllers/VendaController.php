<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\ItensVenda;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Plataforma;

class VendaController extends Controller
{
    //



    public function index()
    {
        $vendas = Venda::paginate(20);
        $plataformas = array();
        $itens_vendidos = array();
        foreach ($vendas as $venda) {
            $itens_vendidos[$venda->id] = count(ItensVenda::where('venda_id', $venda->id)->get());
            $plataformas[$venda->id] = Plataforma::findOrFail($venda->plataforma_id)->nome;
        }

        return view('vendas/venda-read', ['vendas' => $vendas, 'plataformas' => $plataformas, 'itens_vendidos' => $itens_vendidos]);
    }

    public function create()
    {
        return view('vendas/venda-create');
    }

    public function cartAdd(Request $request)
    {
        $dadosFormulario = $request->validate([
            'campo1' => 'required',
            'campo2' => 'required',
            // Adicione outras regras de validação para os campos do formulário
        ]);

        // Armazene os dados na sessão
        $lista = session('lista', []);
        $lista[] = $dadosFormulario;
        session(['lista' => $lista]);
    }
}