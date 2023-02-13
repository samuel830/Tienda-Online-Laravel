<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $viewData =[];
        $viewData["title"] = "Tiendita";
        $viewData["subtitle"] = "Productos";
        $viewData["products"] = Product::all();

        return view('products.index')
            ->with("viewData", $viewData);
    }

    public function show($id){
        $viewData =[];
        $viewData["title"] = "Especificaciones";
        $viewData["subtitle"] = "Producto especifico";
        $viewData["products"] = Product::find($id);

        return view('products.show')
            ->with("viewData", $viewData);
    }
}
