<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regioes;
use App\Models\Dancas;
use App\Models\Gastronomias;
use App\Models\Festas;
use App\Models\Pontos;

class AdminController extends Controller
{
    public function index () {
        return view('admin.index');
    }

    public function read (Request $request) {

        switch ($request->tipo) {
            case "pontos":
                $json = Pontos::where("codRegioes", $request->id)->get(["id", "nome"]);
            break;

            case "gastronomia":
                $json = Gastronomias::where("codRegioes", $request->id)->get(["id", "nome"]);
            break;

            case "dancas":
                $json = Dancas::where("codRegioes", $request->id)->get(["id", "nome"]);
            break;

            case "festas":
                $json = Festas::where("codRegioes", $request->id)->get(["id", "nome"]);
            break;
        } 
        
        echo json_encode($json);
    }

    public function readRegiao () {
         $regioes = new Regioes;

         $regioes = Regioes::get(['id', 'nome']);

         echo json_encode($regioes);
    }
}