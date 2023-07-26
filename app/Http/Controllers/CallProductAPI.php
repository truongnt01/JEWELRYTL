<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
class CallProductAPI extends Controller
{
    //
    public function index(){
        $products = products::all();

        return response()->json($products);
    }
}
