<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        // $this->middleware('auth', ['except' => ['index']]);
    }

    public function getAllToAdmin() {
        $products = product::orderBy('created_at')->get();
        $categories = category::orderBy('created_at')->get();
        return view('admin.products', ['products' => $products, 'categories' => $categories]);
    }
    public function create(Request $request) {
        $product = new product();
        // validateForm($request);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->promotion = $request->input('promotion');
        $product->category_id = $request->input('category');
        $product->save();
        return redirect()->route('productsToAdmin');
    }
    public function getByIdToAdmin($id) {
        $product = product::find($id);
        if (!$product) abort(404);
        return view('admin.getProduct', ['product' => $product]);
    }
    public function update(Request $request, $id) {
        $product = product::find($id);
        if (!$product) abort(404);
        // validateForm($request);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->promotion = $request->input('promotion');
        $product->category_id = $request->input('category');
        $product->save();
        return redirect()->route('productsToAdmin');
    }
    public function destroy($id) {
        $product = product::find($id);
        if (!$product) abort(404);
        $product->delete();
        return redirect()->route('productsToAdmin');
    }
}
