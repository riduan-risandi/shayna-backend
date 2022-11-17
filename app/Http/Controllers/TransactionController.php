<?php

namespace App\Http\Controllers;

use App\Models\Models\Transaction;
use App\Models\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
        // $items = Transaction::all();
        $items = Transaction::orderBy('created_at', 'desc')->get();
        // $items = Transaction::paginate(10);

        return view('pages.transactions.index')->with([
            'items' => $items
        ]);
    }
 
    public function create()
    {
        //
    }
 
    public function store(Request $request)
    {
        //
    }
 
    public function show($id)
    {
        $item = Transaction::with('details.product')->findOrFail($id);
        // dd($item);  
        return view('pages.transactions.show')->with([
            'item'=>$item
        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::findOrFail($id);
        return view('pages.transactions.edit')->with([
            'item'=>$item
        ]);
    }
 
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'                  =>'required|max:255',
            'email'                 =>'required|email|max:255',
            'number'                =>'required|max:255',
            'address'               =>'required',
        ]);
        
        $data = $request->all(); 

        $item = Transaction::findOrFail($id); 
        $item->update($data);
        return redirect()->route('transactions.index')->with('status','Data Transaksi Berhasil diubah!'); 
    }
 
    public function destroy($id)
    {
        $item = Transaction::findOrFail($id); 
        $item->delete();
        
        return redirect()->route('transactions.index'); 
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PENDING,SUCCESS,FAILED'
        ]); 

        $item = Transaction::findOrFail($id); 
        $item->transaction_status = $request->status;
        $item->save();
        return redirect()->route('transactions.index'); 
    }
}
