@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Halaman Profile</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('profiles.create') }}"> Create Profile</a>
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
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Alamat</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($profiles as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->nama }}</td>
            <td>{{ $post->tgl_lahir }}</td>
            <td>{{ $post->jenis_kelamin }}</td>
            <td>{{ $post->email }}</td>
            <td>{{ $post->alamat }}</td>
            <td class="text-center">
                <form action="{{ route('profiles.destroy',$post->id) }}" method="POST">
 
                    
 
                    <a class="btn btn-primary btn-sm" href="{{ route('profiles.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $profiles->links() !!}
 
@endsection