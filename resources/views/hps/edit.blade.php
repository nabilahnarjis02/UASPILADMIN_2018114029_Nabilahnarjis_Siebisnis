@extends('template')
    
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Histori Pendidikan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('hps.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops</strong> Anda salah menginputkan data histori pendidikan.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="/hps/{{ $hp['id'] }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Kode Admin:</strong>
        <input type="string" class="form-control" name="kode_admin"id="exampleInputPassword1" 
        value="{{ old('kode_admin') ? old('kode_admin') : $hp['kode_admin']}}">
        @error('kode_admin')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
  </div>
  
           <div class="col-xs-15 col-sm-15 col-md-15">
            <div class="form-group">
        <strong>Nama:</strong>
        <input type="string" class="form-control" name="nama"id="exampleInputPassword1" 
        value="{{ old('nama') ? old('nama') : $hp['nama']}}">
        @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>SMA:</strong>
            <input type="string" class="form-control" name="SMA"id="exampleInputPassword1" 
        value="{{ old('SMA') ? old('SMA') : $hp['SMA']}}">
        @error('SMA')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
        </div>
        <div class="col-xs-25 col-sm-20 col-md-25">
            <div class="form-group">
            <strong>Strata 1</strong>
            <input type="string" class="form-control" name="S1"id="exampleInputPassword1" 
            value="{{ old('S1') ? old('S1') : $hp['S1']}}">
            @error('S1')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-25 col-sm-20 col-md-25">
            <div class="form-group">
            <strong>Strata 2</strong>
            <input type="string" class="form-control" name="S2"id="exampleInputPassword1" 
            value="{{ old('S2') ? old('S2') : $hp['S2']}}">
            @error('S2')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-25 col-sm-20 col-md-25">
            <div class="form-group">
            <strong>Strata 3</strong>
            <input type="string" class="form-control" name="S3"id="exampleInputPassword3" 
            value="{{ old('S3') ? old('S3') : $hp['S3']}}">
            @error('S3')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection