@extends('template')
    
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Profile</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('profiles.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops</strong> Anda salah menginputkan data profile.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="/profiles/{{ $profile['id'] }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Nama:</strong>
        <input type="string" class="form-control" name="nama"id="exampleInputPassword1" 
        value="{{ old('nama') ? old('nama') : $profile['nama']}}">
        @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
  </div>
  
           <div class="col-xs-15 col-sm-15 col-md-15">
            <div class="form-group">
        <strong>Tanggal Lahir:</strong>
        <input type="date" class="form-control" name="tgl_lahir"id="exampleInputPassword1" 
        value="{{ old('tgl_lahir') ? old('tgl_lahir') : $profile['tgl_lahir']}}">
        @error('tgl_lahir')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Jenis Kelamin:</strong>
            <input type="radio" name="jenis_kelamin" value="laki-laki">Laki-laki
            <input type="radio" name="jenis_kelamin" value="perempuan">Perempuan
        </div>
        <div class="col-xs-25 col-sm-20 col-md-25">
            <div class="form-group">
            <strong>Email</strong>
            <input type="string" class="form-control" name="email"id="exampleInputPassword1" 
            value="{{ old('email') ? old('email') : $profile['email']}}">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-25 col-sm-25 col-md-25">
            <div class="form-group">
            <strong>Alamat</strong>
            <input type="string" class="form-control" name="alamat"id="exampleInputPassword1" 
            value="{{ old('alamat') ? old('alamat') : $profile['alamat']}}">
            @error('alamat')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection