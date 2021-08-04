@extends('template')
 
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Create New Pengalaman Kerja/Usaha</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('pengalamans.index') }}"> Back</a>
        </div>
    </div>
</div>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oops!</strong> Anda salah menginputkan data pengalaman.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<form action="{{ route('pengalamans.store') }}" method="POST">
    @csrf
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Admin:</strong>
                <input type="string" name="kode_admin" class="form-control" placeholder="Kode Admin">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Perusahaan:</strong>
                <input type="string" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tahun Bekerja</strong>
                <input type="year" name="tahun_bekerja" class="form-control" placeholder="Tahun Bekerja">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Posisi</strong>
                <input type="string" name="posisi" class="form-control" placeholder="Posisi">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form>
@endsection