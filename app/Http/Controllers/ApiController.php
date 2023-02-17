<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function getProducts()
    {
        try {
            $productos = Product::all();
        } catch (Exception $e) {
            return response()->json([
                'data' => [],
                'message'=>$e->getMessage(),
                'codigo'=> 'HTTP: 404 - Not found'
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'data' => $productos,
            'message' => 'Succeed',
            'codigo'=> 'HTTP: 200 - OK'
        ], JsonResponse::HTTP_OK);
    }
}
