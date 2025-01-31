@extends('layouts.default')

@section('breadcrumbs')
    <div class="breadcrumbs-inner"> 
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pelanggan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8"> 
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Pesanan</a></li> 
                            <li class="active">Pelanggan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    
    <div class="orders">
        <div class="row">
            <div class="col-12"> 
                <div class="card">
                    <div class="card-header">  
                        <a class="btn btn-primary btn-sm" href="{{ url('/customers/create') }}" role="button"><i class="fa fa-plus"></i> Tambah</a>
                    </div>  
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body"> 
                        <div class="table-stats  ov-h">
                            <table class="table datatables  order-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th> 
                                        <th scope="col">No.HP</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    @Forelse ($data as $key => $val)
                                        <tr>  
                                            <td>{{$loop->iteration}}</td>  
                                            <td>{{$val->name}}</td>   
                                            <td>{{$val->number}}</td>  
                                            <td>{{$val->email}}</td>
                                            <td> 
                                                <a href="{{ url('customers/edit',$val->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-book"></i> 
                                                </a> 
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data Tidak Tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection
 