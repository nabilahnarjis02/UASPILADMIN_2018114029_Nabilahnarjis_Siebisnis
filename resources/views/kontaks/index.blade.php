@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Halaman Kontak</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('kontaks.create') }}"> Create Kontak</a>
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
            <th>No Hp</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($kontaks as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->kode_admin }}</td>
            <td>{{ $post->no_hp }}</td>
            <td class="text-center">
                <form action="{{ route('kontaks.destroy',$post->id) }}" method="POST">
 
                    
 
                    <a class="btn btn-primary btn-sm" href="{{ route('kontaks.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $kontaks->links() !!}
 
@endsection