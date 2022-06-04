<?php

namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
 


class UserController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }

   
    public function index()
    {    
        $data = User::orderBy('id','DESC')->get();     

        return view('pages.users.index', compact('data')); 
    }
 
    public function create()
    {
        return view('pages.users.create');
    }
 
    public function store(UserRequest $request)
    {
        $created_by = Auth::user()->id ;  

        $data = $request->all();  
        $data['password'] = Hash::make($data['password']);
        $data['created_by'] = $created_by;
 
        User::create($data); 
        return redirect('/users/index')->with('status','Pelanggan Berhasil ditambahkan!'); 
    }
 
    public function show($id)
    {
        //
    } 
   
    public function edit($id)
    {
        // $data = User::findOrFail($id);
        // return view('pages.users.edit')->with([
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
