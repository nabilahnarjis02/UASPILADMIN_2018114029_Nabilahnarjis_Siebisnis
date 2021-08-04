<?php
 
namespace App\Http\Controllers\Api;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
 
class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data profile',
            'data' => $profiles
        ], 200);
    }
 
    public function create()
    {
        return view('profiles.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);
 
        Profile::create($request->all());
 
        return redirect()->route('profiles.index')
                        ->with('success','profile created successfully.');
    }
 
    public function edit(int $id)
    {
        $profile = Profile::findOrFail($id); 
        return view('profiles.edit',['profile' => $profile]);
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);
 
        $profile = Profile::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $hs->update($dataResult);

        return redirect('profiles')
                        ->with('success','profile updated successfully');
    }
 
    public function destroy($id)
    {
        $profile = Profile :: where ('id',$id)->first();
     
         $profile -> delete(); return redirect()->route('profiles.index');

                with('success','profile deleted successfully');
        
    }
}