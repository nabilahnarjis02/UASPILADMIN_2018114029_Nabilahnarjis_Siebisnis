<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Pengalaman;
 
class PengalamanController extends Controller
{
    public function index()
    {
        $pengalamans = Pengalaman::latest()->paginate(5);
 
        return view('pengalamans.index',compact('pengalamans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('pengalamans.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'kode_admin' => 'required',
            'nama_perusahaan' => 'required',
            'tahun_bekerja' => 'required',
            'posisi' => 'required',
            
        ]);
 
        Pengalaman::create($request->all());
 
        return redirect()->route('pengalamans.index')
                        ->with('success','Pengalaman created successfully.');
    }
 
    public function edit(int $id)
    {
        $pengalaman = Pengalaman::findOrFail($id); 
        return view('pengalamans.edit',['pengalaman' => $pengalaman]);
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_admin' => 'required',
             'nama_perusahaan' => 'required',
            'tahun_bekerja' => 'required',
            'posisi' => 'required',
        ]);
 
        $pengalaman = pengalaman::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $pengalaman->update($dataResult);

        return redirect('pengalamans')
                        ->with('success','pengalaman updated successfully');
    }
 
    public function destroy(Pengalaman $post)
    {
        $post->delete();
 
        return redirect()->route('pengalamans.index')
                        ->with('success','Pengalaman deleted successfully');
    }
}