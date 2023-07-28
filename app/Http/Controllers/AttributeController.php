<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    //
    public function index()
    {
        $attribute = Attribute::latest()->paginate();
        return view(OBJECT_ATTRIBUTE . DOT . __FUNCTION__, ['data' => $attribute]);
    }

    public function create(){
        return view(OBJECT_ATTRIBUTE . DOT . __FUNCTION__);
    }
}
