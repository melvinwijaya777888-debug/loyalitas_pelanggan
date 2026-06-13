<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function orders_user()
    {
        if(!Session::get('login')){
            return redirect('/');
        }
        else
        {
            $email = Session::get('email');
            $orders = Order::where('customer_id', $email)
                            ->paginate(20);
            return view('orders.index_user', compact('orders'));   
        }     
    }

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
            $orders = Order::get();
            return view('orders.index', compact('orders'));   
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
            return view('orders.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function products_add(Request $request)
    {
        $user_id = Session::get('email');
        $tanggal = date('Y-m-d');

        $loyaltys = DB::table('loyaltys')
                        ->where('produk_id', $request->produk)
                        ->whereDate('expired', '>=', $tanggal)
                        ->first();

        $loyaltys_count = DB::table('loyaltys')
                        ->where('produk_id', $request->produk)
                        ->whereDate('expired', '>=', $tanggal)
                        ->count();
        
        $diskon = 0; $point = 0;
        if ($loyaltys_count > 0)
        {
            if ($loyaltys->qty <= $request->qty)
            {
                $diskon = $loyaltys->diskon;
                $point = $loyaltys->point;                
            }
        }

        $products = DB::table('products')
                        ->where('id', $request->produk)
                        ->first();
        
        $harga = $products->harga;                

        DB::table('orders_detail_temp')->insert([
            'customer_id' => $user_id,
            'id_produk' => $request->produk,
            'qty' => $request->qty,
            'harga' => $harga - $diskon,
            'diskon' => $diskon,
            'point' => $point,
        ]);

        return redirect('/orders/create');
    }

    public function orders_delete(Request $request)
    {
        DB::table('orders_detail_temp')
            ->where('id', $request->id)
            ->delete();

        return redirect('/orders/create');
    }

    public function orders_cancel()
    {
        $user_id = Session::get('email');
        
        DB::table('orders_detail_temp')
            ->where('customer_id', $user_id)
            ->delete();
            
        return redirect('/orders');
    }

    public function orders_store()
    {
        //Generate nomor invoice
        $tanggal = date("Y-m-d");
        $user_id = Session::get('email');
        
        Order::create([
            'tgl_order' => $tanggal,
            'customer_id' => $user_id,
            'total' => 0
        ]);

        $orders = DB::table('orders_detail_temp')
                        ->where('customer_id', $user_id)
                        ->get();

        $id = DB::table('orders')
                ->max('id');
        if (is_null($id))
            $id = 1;

        $idx = 0; $total = 0; $point = 0;
        foreach ($orders as $order)
        {
            $idx += 1;
            DB::table('orders_detail')->insert([
                'id_order' => $id,
                'id_produk' => $order->id_produk,
                'qty' => $order->qty,
                'harga' => $order->harga,
                'diskon' => $order->diskon,
                'point' => $order->point
            ]);

            $total += $order->qty * $order->harga;
            $point += $order->point;
        }

        DB::table('orders_detail_temp')
            ->where('customer_id', $user_id)
            ->delete();
        
        DB::table('orders')->where('id', $id)
                           ->update([
                            'total' => $total
                           ]);

        $customers = DB::table('customers')
                        ->where('email', $user_id)
                        ->first();
        $point += $customers->point;

        DB::table('customers')->where('email', $user_id)
                           ->update([
                            'point' => $point
                           ]);
                           
        return redirect('/orders_user');
    }
}
