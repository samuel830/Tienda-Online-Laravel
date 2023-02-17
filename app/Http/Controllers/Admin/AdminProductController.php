<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index(){
        $viewData =[];
        $viewData["title"] = "Administrador de productos";
        $viewData["products"] = Product::all();
        return view('admin.product.index')
            ->with("viewData", $viewData);
    }

    public function store(Request $request){
        $validate = $request->validate([  
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|decimal:0,2|min:0"
        ]);

        $producto = new Product();
        $producto -> name = $validate["name"];
        $producto -> description = $validate["description"];
        $producto -> price = $validate["price"];
        $producto -> image = 'image.jpg';
        $producto -> especificaciones = 'especificaciones.txt';
        $producto -> save();

        if($request->hasFile("image")){
            $extension = $request->file("image")->extension();
            $idProducto = $producto->getId();
            $imageName = $idProducto.".".$extension;

            Storage::disk('public')->put(  
                $imageName,  
                file_get_contents($request->file('image')->getRealPath())  
            );

            $producto -> image = $imageName;
            $producto -> save();
        }  
        
        if($request->hasFile("especificaciones")){
            $extension = $request->file("especificaciones")->extension();
            $idProducto = $producto->getId();
            $especificacionesName = $idProducto.".".$extension;

            Storage::disk('public')->put(  
                $especificacionesName,  
                file_get_contents($request->file('especificaciones')->getRealPath())  
            );

            $producto -> especificaciones = $especificacionesName;
            $producto -> save();
        }  


        $viewData =[];
        $viewData["title"] = "Administrador de productos";
        $viewData["succes"] = "Producto agregado correctamente";
        $viewData["products"] = Product::all();

        return view('admin.product.index')
            ->with("viewData", $viewData);
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        $viewData =[];
        $viewData["title"] = "Administrador de productos";
        $viewData["success"] = "Producto eliminado correctamente";
        $viewData["products"] = Product::all();

        return view('admin.product.index')
            ->with("viewData", $viewData);
    }

    public function edit($id){
        $product = Product::find($id);

        $viewData =[];
        $viewData["title"] = "Administrador de productos";
        $viewData["product"] = $product;

        return view('admin.product.edit')
            ->with("viewData", $viewData);
    }

    public function update(Request $request, $id){
        $validate = $request->validate([  
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|decimal:0,2|min:0"
        ]);

        $product = Product::find($id);
        $product->name = $validate["name"];
        $product -> description = $validate["description"];
        $product -> price = $validate["price"];
        $product ->save();

        if($request->hasFile("image")){
            $extension = $request->file("image")->extension();
            $idProducto = $product->getId();
            $imageName = $idProducto.".".$extension;

            Storage::disk('public')->put(  
                $imageName,  
                file_get_contents($request->file('image')->getRealPath())  
            );

            $product -> image = $imageName;
            $product -> save();
        } 

        if($request->hasFile("especificaciones")){
            $extension = $request->file("especificaciones")->extension();
            $idProducto = $producto->getId();
            $especificacionesName = $idProducto.".".$extension;

            Storage::disk('public')->put(  
                $especificacionesName,  
                file_get_contents($request->file('especificaciones')->getRealPath())  
            );

            $producto -> especificaciones = $especificacionesName;
            $producto -> save();
        }

        $viewData =[];
        $viewData["title"] = "Administrador de productos";
        $viewData["success"] = "Producto editado correctamente";
        $viewData["products"] = Product::all();

        return view('admin.product.index')
            ->with("viewData", $viewData);
    }
}
