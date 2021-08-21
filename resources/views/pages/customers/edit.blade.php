@extends('layouts.default')

@section('breadcrumbs')
    <div class="breadcrumbs-inner"> 
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Ubah Pelangan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8"> 
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Pesanan</a></li> 
                            <li><a href="#">Pelanggan</a></li> 
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
            <strong> Ubah Pelangan</strong>
            <small>{{ $data->name}}</small>
        </div>
        <div class="card-body card -block"> 
            <form method="post" action="/customers/update/{{$data->id}}">
                {{-- @method('PUT') --}}
                @method('patch')
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Nama</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="name" value="{{old('name') ? old('name') : $data->name}}" class=" form-control @error('name') is-invalid @enderror" > 
                        @error('name')
                            <div class="text-muted">{{$message}}</div> 
                        @enderror
                    </div>
                </div> 
                <div class="row form-group"> 
                    <div class="col-12">
                        <a class="btn btn-secondary btn-sm" href="{{ url('/customers') }}" role="button"><i class="fa fa-chevron-left"></i> Kembali</a>
                        &nbsp;
                        <button class="btn btn-primary btn-sm" type="submit"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                </div>  
                
            </form>

        </div>
    </div>
@endsection