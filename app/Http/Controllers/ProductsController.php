<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    const object = 'products';
    const DOT = '.';

    public function index(){
        $product = new products();  
          
    }
}
