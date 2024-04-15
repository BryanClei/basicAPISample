<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class Products extends Controller
{
    function productList(){
        $totalProduct=20;
        return Blade::render('<h1>{{$total}} Product List </h1>', ['total'=>$totalProduct]);
        // return "product list";
    }

    function addProduct(){
        return "product list";
    }

    function updateProduct(){
        return "product list";
    }
}
