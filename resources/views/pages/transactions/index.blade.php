@extends('layouts.default')

@section('breadcrumbs')
    <div class="breadcrumbs-inner"> 
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Daftar Transaksi Masuk</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8"> 
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Transaksi</a></li> 
                            <li class="active">Daftar Transaksi Masuk</li>
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
                        <h4 class="box-title">Daftar Transaksi Masuk</h4>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body"> 
                        {{-- <div class="table-stats order-table ov-h"> --}}
                            <table id="table_id" class="table table-striped table-bordered" style="width:100%">
                            {{-- <table class="table" id="table_id"> --}}
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @forelse ($items as $item) --}}
                                    @Forelse ($items as $key => $item)
                                        <tr>
                                            {{-- <td>{{$loop->iteration}}</td> --}}
                                            <td scope="row">{{ $items->firstItem() + $key }} </td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->number}}</td>
                                            {{-- number_format($amount, 2) --}}
                                            <td>{{number_format($item->transaction_total,2)}}</td>
                                            <td>
                                                @if($item->transaction_status    == 'PENDING')
                                                    <span class="badge badge-info">
                                                @elseif($item->transaction_status    == 'SUCCESS')
                                                        <span class="badge badge-success">
                                                @elseif($item->transaction_status    == 'FAILED')
                                                        <span class="badge badge-danger">
                                                @else
                                                <span> 
                                                @endif
                                                {{$item->transaction_status}}
                                                </span>
                                                
                                            </td>
                                            <td>
                                                @if($item->transaction_status    == 'PENDING') 
                                                    <a href="{{ route('transactions.status',$item->id) }}?status=SUCCESS" class="btn btn-success btn-sm"> 
                                                        <i class="fa fa-check"></i> 
                                                    </a>
                                                    <a href="{{ route('transactions.status',$item->id) }}?status=FAILED" class="btn btn-warning btn-sm"> 
                                                        <i class="fa fa-times"></i> 
                                                    </a>
                                                @endif
                                                 
                                                <a href="#mymodal" 
                                                    data-remote="{{ route('transactions.show',$item->id) }}" 
                                                    data-toggle="modal" 
                                                    data-target="#mymodal" 
                                                    data-title="Data Transaksi  {{ $item->uuid }}" 
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i> 
                                                </a> 
                                                <a href="{{ route('transactions.edit',$item->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i> 
                                                </a> 
                                                <form action="{{ route('transactions.destroy',$item->id) }}" method="POST" class="d-inline"> 
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
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="display: flex; justify-content: flex-end">
                    {{$items->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @push('after-style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endpush --}}
@push('after-script')
    {{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}
    <script>
        jQuery(document).ready(function(){
            jQuery('#table_id').DataTable();
        })
    </script>
@endpush