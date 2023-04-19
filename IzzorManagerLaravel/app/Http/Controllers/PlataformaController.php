<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plataforma;

class PlataformaController extends Controller
{
    //

    public function create(Request $request)
    {

        $plataforma = new Plataforma;

        if (strlen($request->nome) == 0) {
            return redirect('/produtos/create')->with('msg-error', 'Verifique todos os dados inseridos!');
        }
        if ($request->nome == null || $request->taxas_fixas == null || $request->valor_frete == null || $request->taxas_porcentagem == null) {
            return redirect('/produtos/create')->with('msg-error', 'Verifique todos os dados inseridos!');
        }

        $taxas_fixas = $request->taxas_fixas;
        $taxas_fixas = str_replace("R$ ", "", $taxas_fixas); // remove "R$ "
        $taxas_fixas = str_replace(".", "", $taxas_fixas);
        $taxas_fixas = str_replace(",", ".", $taxas_fixas); // substitui "," por "."
        $taxas_fixas = floatval($taxas_fixas); // converte para double

        $valor_frete = $request->valor_frete;
        $valor_frete = str_replace("R$ ", "", $valor_frete); // remove "R$ "
        $valor_frete = str_replace(".", "", $valor_frete);
        $valor_frete = str_replace(",", ".", $valor_frete); // substitui "," por "."
        $valor_frete = floatval($valor_frete); // converte para double

        $plataforma->nome = $request->nome;
        $plataforma->taxas_fixas = $taxas_fixas;
        $plataforma->taxas_porcentagem = doubleval($request->taxas_porcentagem);
        $plataforma->valor_frete = $valor_frete;
        $plataforma->save();
        return redirect('/produtos/create')->with('msg', 'Plataforma criada com sucesso!');
    }
}