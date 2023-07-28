<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\products;
use App\Models\Attribute;
use App\Models\ProductAttribute;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    const object = 'Product';
    const DOT = '.';

    public function index()
    {

        $page = 10;

        $product = products::with('categories')->latest()->paginate($page);

        return view(self::object . self::DOT . __FUNCTION__, ['product' => $product]);
    }

    public function create()
    {
        $categories = categories::all();
        $color = Attribute::where('name', 'color')->get();
        $material = Attribute::where('name', 'material')->get();
        $designs = Attribute::where('name', 'designs')->get();
        return view(self::object . self::DOT . __FUNCTION__, ['categories' => $categories, 'color' => $color, 'material' => $material, 'designs' => $designs]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'image' => 'required|image|mimes:png,jpg|max:3060',
            'price' => 'required',
        ]);
    
        $file_name = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('image'), $file_name);
    
        $product = products::create([
            'name' => $request->name,
            'image' => $file_name,
            'description' => $request->description,
            'categories_id' => $request->category,
            'price' => $request->price,
        ]);
    
        foreach ($request->id_attribute as $value) {
            ProductAttribute::create([
                'product_id' => $product->id,
                'attribute_id' => $value
            ]);
        }
    
        return redirect()->route('product.index')->with('success', 'Product added successfully');
    }
    

    public function edit($id)
    {
        $product = products::findOrFail($id);
        $categories = categories::all();
        return view(self::object . self::DOT . __FUNCTION__, ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, products $product)
    {
        $file_name = $request->hidden_product_image;

        if ($request->image != '') {
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('image'), $file_name);
        }

        $product = products::find($request->hidden_id);
        $product->name = $request->name;
        $product->image = $file_name;
        $product->description = $request->description;
        $product->categories_id = $request->category;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = products::find($id);
        $img_path = public_path() . "/image/";
        $image = $img_path . $product->image;
        if (file_exists($image)) {
            @unlink($image);
        }
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Deleted successfully');
    }
}
