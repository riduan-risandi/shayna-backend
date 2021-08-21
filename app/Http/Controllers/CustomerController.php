<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Models\Customer;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{ 
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

   
    public function index()
    {  
        $data = Customer::all(); 
        return view('pages.customers.index', compact('data')); 
    }
 
    public function create()
    {
        return view('pages.customers.create');
    }
 
    public function store(CustomerRequest $request)
    {
        $created_by = Auth::user()->id ;  

        $data = $request->all();  
        $data['password'] = Hash::make($data['password']);
        $data['created_by'] = $created_by;
 
        Customer::create($data); 
        return redirect('/customers/index')->with('status','Pelanggan Berhasil ditambahkan!'); 
    }
 
    public function show($id)
    {
        //
    } 
   
    public function edit($id)
    {
        // $data = Customer::findOrFail($id);
        // return view('pages.customers.edit')->with([
        //     'data' =>$data,
        // ]);
    }
 
    public function update(Request $request, $id)
    {
        //
    }
 
    public function destroy($id)
    {
        //
    }
}
