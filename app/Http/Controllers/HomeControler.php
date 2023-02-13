<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeControler extends Controller
{
    public function index(){
        $viewData = [];
        $viewData["title"] = "Página principal - Tienda online";
        return view('home.index')
            ->with("viewData", $viewData);
    }

    public function about() {
        $viewData = [];
        $viewData["title"] = "Titulo";
        $viewData["subtitle"] = "Subtitulo";
        $viewData["description"] = "Descripcion";
        $viewData["author"] = "Autor";
        return view('home.about')
            ->with("viewData", $viewData);
    }

    public function conf(){
        $viewData =[];
        $viewData["title"] = "Configuracion de la página";

        return view('home.conf')
            ->with("viewData", $viewData);
    }

    public function save(Request $request){
        $viewData =[];
        $viewData["title"] = "Página principal - Tienda online";

        $colorPagina = $request->input("cambioColor");
        $tipoLetra = $request->input("cambioLetra");

        session(["color_encabezado" => $colorPagina]);
        session(["tipo_Letra" => $tipoLetra]);

        return view('home.index')
            ->with("sucess","configuracion actualizada correctamente")
            ->with("viewData", $viewData);
    }
}
