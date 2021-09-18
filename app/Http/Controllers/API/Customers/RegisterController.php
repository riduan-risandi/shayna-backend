<?php

namespace App\Http\Controllers\API\Customers;

use App\Http\Controllers\Controller; 
use App\Models\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{   
    public function register(Request $request)
    { 
        // echo $request;
        $validated = $request->validate([
            'name'          =>'required|max:255',
            'email'         =>'required|email|max:255|unique:customers',
            'number'        =>'required|max:255',  
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        // $insert = Customer::create($request->all()); 

        $insert =  Customer::create([
                                        'name' => $request['name'],
                                        'number' => $request['number'],
                                        'email' => $request['email'],
                                        'password' => Hash::make($request['password']),
                                    ]);

        if($insert)
        {
            return ResponseFormatter::success($insert,'Tambah Customer berhasil');
        } 
        else
        {
            return ResponseFormatter::error(null,'Tambah Customer gagal',404);
        }
           


    }
}
