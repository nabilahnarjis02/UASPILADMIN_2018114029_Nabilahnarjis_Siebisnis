@extends('template')
    
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Kontak</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('kontaks.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops</strong> Anda salah menginputkan data kontak.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="/kontaks/{{ $kontak['id'] }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Kode Admin:</strong>
        <input type="string" class="form-control" name="kode_admin"id="exampleInputPassword1" 
        value="{{ old('kode_admin') ? old('kode_admin') : $kontak['kode_admin']}}">
        @error('kode_admin')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
  </div>
  
           <div class="col-xs-15 col-sm-15 col-md-15">
            <div class="form-group">
        <strong>No Hp:</strong>
        <input type="string" class="form-control" name="no_hp"id="exampleInputPassword1" 
        value="{{ old('no_hp') ? old('no_hp') : $kontak['no_hp']}}">
        @error('no_hp')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection