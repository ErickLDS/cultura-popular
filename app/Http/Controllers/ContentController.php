<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regioes;
use App\Models\Dancas;
use App\Models\Gastronomias;
use App\Models\Festas;
use App\Models\Pontos;

class ContentController extends Controller
{

    // Rota "/"
    public function index() {
        return view("site.index");
    }

    // Adicionar Regiões
    public function add(Request $request) {

        $regioes = new Regioes;

        if ($regioes::firstWhere("nome", $request->nome)) {
            return redirect('/el_admin/create');
        } else {
            $regioes->cor = $request->cor;
            $regioes->nome = $request->nome;
            $regioes->img = importImg($request);

            $regioes->save();

            return redirect('/el_admin/create');
        }
    }

    // Resgatar dados sobre a região
    public function read(Request $request) {

        $nome_regiao = $request->id;

        $regioes = Regioes::where('nome', $nome_regiao)->firstOrFail();
        $id = $regioes->id;

        $pontos = Pontos::where('codRegioes', $id)->get();
        $gastronomia = Gastronomias::where('codRegioes', $id)->get();
        $dancas = Dancas::where('codRegioes', $id)->get();
        $festas = Festas::where('codRegioes', $id)->get();

        return array("regioes" => $regioes, 
            "pontos" => $pontos, 
            "gastronomia" => $gastronomia,
            "dancas" => $dancas,
            "festas" => $festas);
    }
}

// Importar Imagens
function importImg($request) {
    if($request->hasFile('img') && $request->file('img')->isValid()) {
        $requestImg = $request->img;

        $extensao = $requestImg->extension();

        $nomeImg = $requestImg->getClientOriginalName();

        if($requestImg->move(public_path('img/'.$request->nome), $nomeImg)) {
            return $nomeImg;
        }
    }
}