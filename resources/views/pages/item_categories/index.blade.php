@extends('layouts.default')

@section('breadcrumbs')
    <div class="breadcrumbs-inner"> 
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Kategori Barang</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8"> 
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Barang</a></li> 
                            <li class="active">Kategori Barang</li>
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
                    <div class="card-body">  
                        <a class="btn btn-primary btn-sm" href="{{ url('/item_categories/create') }}" role="button"><i class="fa fa-plus"></i> Tambah</a>
                    </div>  
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-stats order-table ov-h">
                        <table class="table" id="table_id"> 
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th> 
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @Forelse ($data as $key => $val)
                                    <tr> 
                                        <td scope="row">{{ $data->firstItem() + $key }} </td>

                                        <td>{{$val->name}}</td>   
                                        <td>{{$val->product_count}}</td>
                                        <td> 
                                            <a href="{{ url('item_categories/edit',$val->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i> 
                                            </a>
                                            <form action="/item_categories/{{$val->id}}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf 
                                                    <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> 
                                                </button>
                                            </form> 
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
        <div class="row">
            <div class="col-12" style="display: flex; justify-content: flex-end">
                
                {{$data->links()}}
            </div>
        </div>
    </div>
@endsection
 