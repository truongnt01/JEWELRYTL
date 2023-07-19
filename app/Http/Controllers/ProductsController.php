<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    const object = 'Product';
    const DOT = '.';

    public function index()
    {
        $auth = Auth::user();

        $product = products::query()->orderByDesc('id')->get();

        return view(self::object . self::DOT . __FUNCTION__, ['product' => $product, 'auth' => $auth]);
    }

    public function create()
    {
        return view(self::object . self::DOT . __FUNCTION__);
    }

    public function store(Request $request, products $product)
    {
        $product = new products();

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg|max:3060',
            'price' => 'required',
        ]);

        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('image'), $file_name);
        $product->name = $request->name;
        $product->image = $file_name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->save();
        return redirect()->route('product.index')->with('success', 'product added successfully');
    }

    public function edit($id)
    {
        $product = products::findOrFail($id);
        return view(self::object . self::DOT . __FUNCTION__,['product' => $product]);
    }

    public function update(Request $request, products $product){
        $file_name = $request->hidden_product_image;
        
        if( $request->image != '') {
            $file_name = time(). '.' .request()->image->getClientOriginalExtension();
            request()->image->move(public_path('image'), $file_name);
        }

        $product = products::find($request->hidden_id);
        $product->name = $request->name;
        $product->image = $file_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('product.index')->with('success','Product updated successfully');
    }

    public function destroy($id){
        $product = products::find($id);
        $img_path = public_path(). "/image/";
        $image = $img_path .$product->image;
        if(file_exists($image)){
            @unlink($image);
        }
        $product->delete();
        return redirect()->route('product.index')->with('success','Deleted successfully');
    }
}
