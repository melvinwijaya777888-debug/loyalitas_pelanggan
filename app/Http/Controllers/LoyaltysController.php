<?php

namespace App\Http\Controllers;

use App\Models\Loyalty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoyaltysController extends Controller
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
            $loyaltys = Loyalty::join('products', 'loyaltys.produk_id', 'products.id')
                        ->select('loyaltys.*', 'products.nama_produk')
                        ->get();
            return view('loyaltys.index', compact('loyaltys'));   
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
            return view('loyaltys.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Loyalty::create([
            'nama_program' => $request->nama_program,
            'expired' => $request->expired,
            'produk_id' => $request->produk_id,
            'qty' => $request->qty,
            'diskon' => $request->diskon,
            'point' => $request->point
        ]);

        return redirect('/loyaltys');
    }

    /**
     * Display the specified resource.
     */
    public function show(Loyalty $loyalty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loyalty $loyalty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loyalty $loyalty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loyalty $loyalty)
    {
        loyalty::destroy($loyalty->id);
        return redirect('/loyaltys');
    }
}
