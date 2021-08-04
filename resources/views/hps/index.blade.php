@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Halaman Histori Pendidikan</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('hps.create') }}"> Create Histori Pendidikan</a>
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
            <th>Nama</th>
            <th>SMA</th>
            <th>Strata 1</th>
            <th>Strata 2</th>
            <th>Strata 3</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($hps as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->kode_admin }}</td>
            <td>{{ $post->nama }}</td>
            <td>{{ $post->SMA }}</td>
            <td>{{ $post->S1 }}</td>
            <td>{{ $post->S2 }}</td>
            <td>{{ $post->S3 }}</td>
            <td class="text-center">
                <form action="{{ route('hps.destroy',$post->id) }}" method="POST">
 
                    
 
                    <a class="btn btn-primary btn-sm" href="{{ route('hps.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $hps->links() !!}
 
@endsection