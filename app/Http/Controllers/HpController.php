<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Hp;
 
class HpController extends Controller
{
    public function index()
    {
        $hps = Hp::latest()->paginate(5);
 
        return view('hps.index',compact('hps'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('hps.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'kode_admin' => 'required',
            'nama' => 'required',
            'SMA' => 'required',
            'S1' => 'required',
            'S2' => 'required',
            'S3' => 'required',

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
        $hp->update($dataResult);

        return redirect('hps')
                        ->with('success','hp updated successfully');
    }
    
    public function destroy(Hp $post)
    {
        $post->delete();
 
        return redirect()->route('hps.index')
                        ->with('success','histori pendidikan deleted successfully');
    }
}