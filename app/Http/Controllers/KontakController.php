<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Kontak;
 
class KontakController extends Controller
{
    public function index()
    {
        $kontaks = Kontak::latest()->paginate(5);
 
        return view('kontaks.index',compact('kontaks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
                        ->with('success','kontak created successfully.');
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
        $kontak->update($dataResult);

        return redirect('kontaks')
                        ->with('success','kontak updated successfully');
    }
    // public function edit(Kontak $post)
    // {
    //     return view('kontaks.edit',compact('post'));
    // }
 
    // public function update(Request $request, Kontak $post)
    // {
    //     $request->validate([
    //         'kode_admin' => 'required',
    //         'no_hp' => 'required',
    //     ]);
 
    //     $post->update($request->all());
 
    //     return redirect()->route('kontaks.index')
    //                     ->with('success','kontak updated successfully');
    // }
 
    public function destroy(Kontak $post)
    {
        $post->delete();
 
        return redirect()->route('kontaks.index')
                        ->with('success','kontak deleted successfully');
    }
}