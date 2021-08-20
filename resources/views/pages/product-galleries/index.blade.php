@extends('layouts.default')

@section('breadcrumbs')
    <div class="breadcrumbs-inner"> 
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Foto Barang</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8"> 
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Barang</a></li> 
                            <li class="active">Foto Barang</li>
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
                        {{-- <h4 class="box-title">Foto Barang</h4> --}}
                            <a class="btn btn-primary btn-sm" href="{{ url('/product-galleries/create') }}" role="button"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 
                    <div class="table-stats order-table ov-h">
                        <table class="table"> 
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama barang</th>
                                    <th>Foto</th>
                                    <th>Default</th> 
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @Forelse ($items as $key => $item)
                                    <tr> 
                                        <td scope="row">{{ $items->firstItem() + $key }} </td>
                                        <td>{{$item->product->name}}</td>
                                        <td>
                                            <img src="{{ url($item->photo)}}" /> 
                                        </td>
                                        <td>{{$item->is_default ? 'Ya' :  'Tidak'}}</td> 
                                        <td>    
                                            <form action="{{ route('product-galleries.destroy',$item->id) }}" method="POST" class="d-inline"> 
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
                            <tfoot>
                            </tfoot>
                        </table> 
                    </div> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="display: flex; justify-content: flex-end">
                
                {{$items->links()}}
            </div>
        </div>
    </div>
@endsection