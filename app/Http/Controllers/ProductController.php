<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Modification;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::query();
        $modifications = Modification::all();

        if($request->modification_id) {
            $modification_id = $request->modification_id;
            $products = $products->whereHas('modifications', function ($q) use ($modification_id) {
                $q->where('modification_id', $modification_id);
            });

            $modifications = Modification::find($modification_id)->products;

            if($request->value) {
                $value = $request->value;
                $products = $products->whereHas('modifications', function ($q) use ($value) {
                    $q->where('value', $value);
                });
            }
        }

        if( $request->category_id) {
            $products = $products->where('category_id', $request->category_id);
        }

        $products = $products->get();

        return view('products.index')->with(compact('products', 'categories', 'modifications'));

    }

    public function show($id)
    {
        $modifications = Product::find($id)->modifications;
        return response()->json(['data' => $modifications]);
    }

}
