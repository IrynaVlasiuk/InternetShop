<?php

namespace App\Http\Controllers;

use App\Models\Modification;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $modifications = Modification::with(['products'])->get();

        if($request->category_id) {
            if($request->category_id == 'all') {
                $products = Product::with(['category'])->get();
            } else {
                $products = Product::where('category_id', $request->category_id)->get();
            }
            return response()->json(['products' => $products, 'modifications' => $modifications]);

        } else {
            $products = Product::all();

            return view('products.index')->with(compact('products', 'categories', 'modifications'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $modifications = Product::find($id)->modifications;

        return response()->json(['data' => $modifications]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function modifications($id)
    {
        if($id == 'all') {
            $modifications = null;
        } else {
            $modifications = Modification::find($id)->products;
        }

      return response()->json([ 'modifications' => $modifications]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public  function getProductsByModification($id, Request $request)
    {
        $modification = Modification::find($id);
        $products = $modification->products;
        $data = [];
        foreach ($products as $product) {
            if($product->pivot->value == $request->value) {
              array_push($data, $product);
            }
        }
         return response()->json(['products' => $data]);
    }
}
