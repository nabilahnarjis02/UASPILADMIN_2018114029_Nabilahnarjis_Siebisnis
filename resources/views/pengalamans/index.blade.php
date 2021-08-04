@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Halaman Pengalaman Bekerja/Usaha</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('pengalamans.create') }}"> Create Pengalaman</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
        
            <th width="20px" class="text-center">No</th>
            <th>Kode Admin</th>
            <th>Nama Perusahaan</th>
            <th>Tahun Bekerja</th>
            <th>Posisi</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($pengalamans as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->kode_admin }}</td>
            <td>{{ $post->nama_perusahaan }}</td>
            <td>{{ $post->tahun_bekerja }}</td>
            <td>{{ $post->posisi }}</td>
            <td class="text-center">
                <form action="{{ route('pengalamans.destroy',$post->id) }}" method="POST">
 
                    
 
                    <a class="btn btn-primary btn-sm" href="{{ route('pengalamans.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $pengalamans->links() !!}
 
@endsection