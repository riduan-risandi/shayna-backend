<?php

namespace App\Http\Controllers\API\Customers;

use App\Http\Controllers\Controller; 
// use App\Models\Customer;
use App\Models\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use JWTAuth; 
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $request)
    {
    	//Validate data
        $data = $request->only('name', 'email', 'number', 'password', 'password_confirmation');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'number'=>'required|max:255',  
            'email' => 'required|email|unique:customers',
            'password' => 'required|string|min:6|max:50|confirmed'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) 
        {
            // return response()->json(['error' => $validator->messages()], 200); 
            return ResponseFormatter::error(null,$validator->messages(),404);
        }

        //Request is valid, create new customer
        $customer = Customer::create([
        	'name' => $request->name,
        	'number' => $request->number,
        	'email' => $request->email,
        	'password' => bcrypt($request->password)
        ]);

        //Customer created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Customer created successfully',
            'data' => $customer
        ], Response::HTTP_OK);
    }
 
    public function authenticate(Request $request)
    {
        auth()->shouldUse('api');
        $credentials = $request->only('email', 'password');

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) 
        {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated
        //Crean token
        try 
        {
            if (! $token = JWTAuth::attempt($credentials)) 
            {
                return response()->json([
                	'success' => false,
                	'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } 
        catch (JWTException $e) 
        {
            return $credentials;
                return response()->json([
                        'success' => false,
                        'message' => 'Could not create token.',
                    ], 500);
        }
 	
 		//Token created, return with success response and jwt token
        return response()->json([
            'success' => true,
            'token' => $token, 
            'customer'    => auth()->user(),   
            
             
        ]);
    }
 
    public function logout(Request $request)
    {
        //valid credential
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

		//Request is validated, do logout        
        try 
        {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'Customer has been logged out'
            ]);
        } 
        catch (JWTException $exception) 
        {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, customer cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
 
    public function get_customer(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $customer = JWTAuth::authenticate($request->token);
 
        return response()->json(['customer' => $customer]);
    }

    
}