<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Session::get('login')){
            return redirect('/');
        }
        else
        {
            $products = Product::get();
            return view('products.index', compact('products'));   
        }     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Session::get('login')){
            return redirect('/');
        }
        else
        {
            return view('products.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'qty' => $request->qty,
            'kategori' => $request->kategori
        ]);

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/products');
    }
}
