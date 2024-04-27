<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Exception;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $prod_name = $request->input('name');
            $prod_desc = $request->input('desc');
            $prod_price = $request->input('price');
    
            $product = Product::create([
                'name' => $prod_name,
                'description' => $prod_desc,
                'price' => $prod_price,
                'uid' => Auth::id()
            ]);
    
            if($product->exists) {
                return redirect()->route('product.index')->with('message', 'Product saved successfully');
            }else{
                return redirect()->route('product.index')->with('error', 'Product failed to save');
            }
        }catch (Exception $e) {
            return redirect()->route('product.index')->with('error', 'Product failed to save');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::find($product->id);

        if(empty($product)) {
            abort(404);
        }
        
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = Product::find($product->id);

        if(empty($product)) {
            abort(404);
        }
        
        return view('products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try {
            $product = Product::find($product->id);

            if(empty($product)) {
                return redirect()->route('product.index')->with('error', 'Product does not found');
            }

            $prod_name = $request->input('name');
            $prod_desc = $request->input('desc');
            $prod_price = $request->input('price');
    
            $product->name = $prod_name;
            $product->description = $prod_desc;
            $product->price = $prod_price;
    
            if($product->save()) {
                return redirect()->route('product.index')->with('message', 'Product updated successfully');
            }else{
                return redirect()->route('product.index')->with('error', 'Product failed to update');
            }
        }catch (Exception $e) {
            return redirect()->route('product.index')->with('error', 'Product failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->delete()) {
            return redirect()->route('product.index')->with('message', 'Product deleted successfully');
        }else{
            return redirect()->route('product.index')->with('error', 'Product failed to delete');
        }
    }
}
