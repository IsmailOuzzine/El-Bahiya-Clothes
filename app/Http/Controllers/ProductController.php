<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        // $this->middleware('auth', ['except' => ['index']]);
    }

    function store(Request $request, $product) {
        $validated = $request->validate([
            'name' => ['required', 'unique:products', 'max:255'],
            'price' => ['required', 'min:0'],
            'stock' => ['required', 'min:0'],
            'category' => ['required']
        ]);
        if(!$product->id) $product->id = Str::uuid();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->promotion = $request->input('promotion') ?? 0;
        $product->category_id = $request->input('category');
        $product->save();
    }

    /**
     * @return  View
     */
    public function getAllToAdmin() {
        $products = product::orderBy('created_at')->get();
        $categories = category::orderBy('created_at')->get();
        return view('admin.products', ['products' => $products, 'categories' => $categories]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request) {
        $this->store($request, new product());
        return redirect()->route('productsToAdmin');
    }

    /**
     * @param $id
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function getByIdToAdmin($id) {
        $product = product::find($id);
        $categories = category::orderBy('created_at')->get();
        if (!$product) abort(404);
        return view('admin.getProduct', ['product' => $product, 'categories' => $categories]);
    }
    public function update(Request $request, $id) {
        $product = product::find($id);
        if (!$product) abort(404);
        $this->store($request, $product);
        return redirect()->route('productsToAdmin');
    }
    public function destroy($id) {
        $product = product::find($id);
        if (!$product) abort(404);
        $product->delete();
        return redirect()->route('productsToAdmin');
    }
}
