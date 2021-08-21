@extends('layouts.default')

@section('breadcrumbs')
    <div class="breadcrumbs-inner"> 
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pesanan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8"> 
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Pesanan</a></li> 
                            <li><a href="#">Pesanan</a></li> 
                            <li class="active">Ubah</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-header">
            <strong> Ubah Transaksi</strong>
            <small>{{ $item->uuid}}</small>
        </div>
        <div class="card-body card -block">
            <form action="{{route('transactions.update',$item->id)}}" method="POST">  
                @method('PUT') 
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Nama Pemesan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="name" value="{{old('name') ? old('name') : $item->name}}" class="input-sm form-control-sm form-control @error('name') is-invalid @enderror" > 
                        @error('name')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="email" value="{{old('email') ? old('email') : $item->email}}" class="input-sm form-control-sm form-control @error('email') is-invalid @enderror" > 
                        @error('email')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div>
                 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">No. HP</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="number" value="{{old('number') ? old('number') : $item->number}}" class="input-sm form-control-sm form-control @error('number') is-invalid @enderror" > 
                        @error('number')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div> 
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Alamat Pemesan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="address" value="{{old('address') ? old('address') : $item->address}}" class="input-sm form-control-sm form-control @error('address') is-invalid @enderror" > 
                        @error('address')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div> 
                
                <div class="row form-group"> 
                    <div class="col-12">
                        <a class="btn btn-secondary btn-sm" href="{{ url('/transactions') }}" role="button"><i class="fa fa-chevron-left"></i> Kembali</a>
                        &nbsp;
                        <button class="btn btn-primary btn-sm" type="submit"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                </div>   
            </form>

        </div>
    </div>
@endsection