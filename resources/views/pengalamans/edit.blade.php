@extends('template')
    
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Pengalaman</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('pengalamans.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops</strong> Anda salah menginputkan data pengalaman.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="/pengalamans/{{ $pengalaman['id'] }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Kode Admin:</strong>
        <input type="string" class="form-control" name="kode_admin"id="exampleInputPassword1" 
        value="{{ old('kode_admin') ? old('kode_admin') : $pengalaman['kode_admin']}}">
        @error('kode_admin')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
  </div>
  
           <div class="col-xs-15 col-sm-15 col-md-15">
            <div class="form-group">
        <strong>Nama Perusahaan:</strong>
        <input type="string" class="form-control" name="nama_perusahaan"id="exampleInputPassword1" 
        value="{{ old('nama_perusahaan') ? old('nama_perusahaan') : $pengalaman['nama_perusahaan']}}">
        @error('nama_perusahaan')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Tahun Bekerja:</strong>
            <input type="year" class="form-control" name="tahun_bekerja"id="exampleInputPassword1" 
        value="{{ old('tahun_bekerja') ? old('tahun_bekerja') : $pengalaman['tahun_bekerja']}}">
        @error('tahun_bekerja')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
        </div>
        <div class="col-xs-25 col-sm-20 col-md-25">
            <div class="form-group">
            <strong>Posisi</strong>
            <input type="string" class="form-control" name="posisi"id="exampleInputPassword1" 
            value="{{ old('posisi') ? old('posisi') : $pengalaman['posisi']}}">
            @error('posisi')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection