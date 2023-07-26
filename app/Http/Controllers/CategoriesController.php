<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriesController extends Controller
{
    //

    public function index()
    {
        $categories = categories::query()->paginate();

        return view(OBJECT . DOT . __FUNCTION__, ['data' => $categories]);
    }

    public function create()
    {
        return view(OBJECT . DOT . __FUNCTION__);
    }

    public function store(Request $request, categories $categories)
    {
        $categories = new categories();

        $request->validate([
            'name' => 'required|min:3|unique:categories',
        ]);

        $categories->fill($request->all());

        $categories->save();
        return redirect()->route('category.index')->with('success', 'category added successfully');
    }

    public function edit($id)
    {
        $categories = categories::findOrFail($id);
        return view(OBJECT . DOT . __FUNCTION__, ['data' => $categories]);
    }

    public function update(Request $request, categories $categories){
        $categories = categories::find($request->hidden_id);

        $categories->name = $request->name;

        $categories->save();

        return redirect()->route('category.index')->with('success','Updated category successfully');
    }

    public function destroy($id)
    {
        $categories = categories::find($id);
        try {
            $categories->delete();
            return back()
                ->with('status', Response::HTTP_OK)
                ->with('success', 'Delete category successfully');
        } catch (\Exception $expection) {
            //throw $th;
            Log::error('Exception', [$expection]);

            return back()
                ->with('status', Response::HTTP_BAD_REQUEST)
                ->with('success', 'Failed to delete');
        }
    }
}
