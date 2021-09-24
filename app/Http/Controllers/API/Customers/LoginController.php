<?php

namespace App\Http\Controllers\API\Customers;

use App\Http\Controllers\Controller; 
use App\Models\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function get(Request $request) 
    {  
        $validated = $request->validate([ 
            'email'         =>'required|email|max:255', 
            'password'      => ['required', 'string'],
        ]);  

        $request['email'] = $request['email'];  
        $data = Customer::where('email', '=', $request['email'])->first();
        
        // echo $request['password']; 
        $valid = Hash::check($request['password'], $data->password);  

        if($valid)
        {
            return ResponseFormatter::success($data,'Login Sukses');
        } 
        else
        { 
            return ResponseFormatter::error(null,'Email atau Password salah',404);
        }


    } 
 
}
