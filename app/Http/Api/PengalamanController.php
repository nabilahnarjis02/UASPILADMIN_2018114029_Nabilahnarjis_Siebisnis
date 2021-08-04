<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengalaman;
 
class PengalamanController extends Controller
{
    public function index()
    {
        $pengalamans = pengalaman::get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data pengalaman',
            'data' => $pengalamans
        ], 200);
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
 
        pengalaman::create($request->all());
 
        return redirect()->route('pengalamans.index')
                        ->with('success','pengalaman created successfully.');
    }
 
 
    public function edit(int $id)
    {
        $pengalaman = pengalaman::findOrFail($id); 
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
        $hs->update($dataResult);

        return redirect('pengalamans')
                        ->with('success','pengalaman updated successfully');
    }
 
    public function destroy($id)
    {
        $pengalaman = pengalaman :: where ('id',$id)->first();
     
         $pengalaman -> delete(); return redirect()->route('pengalamans.index');

                with('success','pengalaman deleted successfully');
        
    }
}