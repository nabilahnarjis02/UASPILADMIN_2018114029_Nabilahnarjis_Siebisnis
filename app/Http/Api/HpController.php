<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hp;
 
class HpController extends Controller
{
    public function index()
    {
        $hps = Hp::get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data histori pendidikan',
            'data' => $hps
        ], 200);
    }
 
    public function create()
    {
        return view('hps.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_supplier' => 'required',
            'nama_barang' => 'required',
            'rasa' => 'required',
            'jumlah_barang' => 'required',

        ]);
 
        Hp::create($request->all());
 
        return redirect()->route('hps.index')
                        ->with('success','histori pendidikan created successfully.');
    }
 
    public function edit(int $id)
    {
        $hp = Hp::findOrFail($id); 
        return view('hps.edit',['hp' => $hp]);
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_admin' => 'required',
            'nama' => 'required',
            'SMA' => 'required',
            'S1' => 'required',
            'S2' => 'required',
            'S3' => 'required',
        ]);
 
        $hp = Hp::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $hs->update($dataResult);

        return redirect('hps')
                        ->with('success','histori pendidikan updated successfully');
    }
 
    public function destroy($id)
    {
        $hp = Hp :: where ('id',$id)->first();
     
         $hp -> delete(); return redirect()->route('hps.index');

                with('success','histori pendidikan deleted successfully');
        
    }
}