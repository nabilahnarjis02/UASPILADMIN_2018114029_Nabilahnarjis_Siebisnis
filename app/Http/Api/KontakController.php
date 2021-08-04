<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kontak;
 
class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data kontak',
            'data' => $kontaks
        ], 200);
    }
 
    public function create()
    {
        return view('kontaks.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'kode_admin' => 'required',
            'no_hp' => 'required',
        ]);
 
        Kontak::create($request->all());
 
        return redirect()->route('kontaks.index')
                        ->with('success','Kontak created successfully.');
    }

    public function edit(int $id)
    {
        $kontak = Kontak::findOrFail($id); 
        return view('kontaks.edit',['kontak' => $kontak]);
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_admin' => 'required',
            'no_hp' => 'required',
        ]);
 
        $kontak = Kontak::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $hs->update($dataResult);

        return redirect('kontaks')
                        ->with('success','kontak updated successfully');
    }
 
    public function destroy($id)
    {
        $kontak = Kontak :: where ('id',$id)->first();
     
         $kontak -> delete(); return redirect()->route('kontaks.index');

                with('success','kontak deleted successfully');
        
    }
}