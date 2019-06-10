<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $test = auth()->user()->products;
 
        return response()->json([
            'success' => true,
            'data' => $products
        ]);
    }
}
