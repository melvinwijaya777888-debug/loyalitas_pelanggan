<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
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
            $customers = Customer::get();
            return view('customers.index', compact('customers'));   
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
            return view('customers.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customers = Customer::where('email', $request->email)
                            ->count();
        
        if ($customers == 0)
        {
            Customer::create([
                'email' => $request->email,
                'kata_sandi' => $request->kata_sandi,
                'nama_customer' => $request->nama_customer,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'point' => 0
            ]);
    
            return redirect('/customers');
        }
        else
        {
            return redirect('/customers/create')->with('alert','Data Email Telah Ada !');                    
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);
        return redirect('/customers');
    }

    public function authenticate(Request $request)
    {
        $name = $request->username;
        $password = $request->password;

        $admin = DB::table('administrators')
                    ->where('user_id', $name)
                    ->first();                    

        $data = Customer::where('email',$name)
                        ->first();

        if($admin){ //apakah id user tersebut ada atau tidak
            if($password == $admin->user_pass){
                Session::put('nama_user',$name);
                Session::put('user_type','Admin');
                Session::put('login',TRUE);
                return redirect('home');
            }
            else{
                return redirect('/')->with('alert','Kata Sandi Salah !');
            }
        }
        elseif ($data){
            if($password == $data->kata_sandi){
                Session::put('nama_user',$data->nama_customer);
                Session::put('email',$data->email);
                Session::put('user_type','Customer');
                Session::put('login',TRUE);
                return redirect('home');
            }
            else{
                return redirect('/')->with('alert','Kata Sandi Salah !');
            }
        }
        else{
            return redirect('/')->with('alert','User ID Tidak Terdaftar !');
        }

        return redirect('home');
    }

    public function home()
    {
        if(!Session::get('login')){
            return redirect('/');
        }
        else{
            if (Session::get('user_type') == 'Admin')
                return view('home');
            else if (Session::get('user_type') == 'Customer')
                return view('home_user');
            else
                return redirect('/');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

}
