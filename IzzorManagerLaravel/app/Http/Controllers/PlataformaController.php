<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plataforma;

class PlataformaController extends Controller
{
    //


    public function index()
    {
        $plataformas = Plataforma::paginate(20);
        return view('plataforma/plataforma-read', ['plataformas' => $plataformas]);
    }

    public function create()
    {

        return view('plataforma/plataforma-create');
    }


    public function store(Request $request)
    {

        $plataforma = new Plataforma;

        if (strlen($request->nome) == 0) {
            return redirect('/plataforma/create')->with('msg-error', 'Verifique todos os dados inseridos!');
        }
        if ($request->nome == null || $request->taxas_fixas == null || $request->taxas_porcentagem == null) {
            return redirect('/plataforma/create')->with('msg-error', 'Verifique todos os dados inseridos!');
        }

        $taxas_fixas = $request->taxas_fixas;
        $taxas_fixas = str_replace("R$ ", "", $taxas_fixas); // remove "R$ "
        $taxas_fixas = str_replace(".", "", $taxas_fixas);
        $taxas_fixas = str_replace(",", ".", $taxas_fixas); // substitui "," por "."
        $taxas_fixas = floatval($taxas_fixas); // converte para double


        $plataforma->nome = $request->nome;
        $plataforma->taxas_fixas = $taxas_fixas;
        $plataforma->taxas_porcentagem = doubleval($request->taxas_porcentagem);
        $plataforma->save();
        return redirect('/plataforma')->with('msg', 'Plataforma criada com sucesso!');
    }


    public function edit($id){

        $plataforma = Plataforma::findOrFail($id);
        $taxas_fixas = $plataforma->taxas_fixas;
        $taxas_fixas = str_replace(".", ",", $taxas_fixas);

        $valor_frete = $plataforma->valor_frete;
        $valor_frete = str_replace(".", ",", $valor_frete);

        $plataforma->taxas_fixas = $taxas_fixas;
        $plataforma->valor_frete = $valor_frete;

        return view('plataforma/plataforma-edit', ['plataforma' => $plataforma]);

    }


    public function update(Request $request){
        
        
        if ($request->nome == null) {
            return redirect('/plataforma/edit/'. $request->id)->with('msg-error', 'Plataforma inválida, verifique se os campos foram preenchidos corretamente.');
        }
        if (strlen($request->nome) > 90) {
            return redirect('/categoria/edit/'. $request->id)->with('msg-error', 'Plataforma excede o limite de tamanho do nome!');
        }
        
        Plataforma::findOrFail($request->id)->update($request->all());

        
        return redirect('/plataforma')->with('msg', 'Plataforma editada com sucesso!');
    }

    public function destroy($id){
        Plataforma::findOrFail($id)->delete();

        return redirect('/plataforma')->with('msg', 'Plataforma excluída com sucesso!');
    }
}