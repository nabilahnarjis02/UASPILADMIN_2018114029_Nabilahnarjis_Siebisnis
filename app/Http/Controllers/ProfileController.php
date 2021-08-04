<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Profile;
 
class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::latest()->paginate(5);
 
        return view('profiles.index',compact('profiles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
                        ->with('success','Profile created successfully.');
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
 
        $profile = profile::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $profile->update($dataResult);

        return redirect('profiles')
                        ->with('success','profile updated successfully');
    }
   
    public function destroy(Profile $post)
    {
        $post->delete();
 
        return redirect()->route('profiles.index')
                        ->with('success','Profile deleted successfully');
    }
}