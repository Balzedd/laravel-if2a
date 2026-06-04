<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Prodi::with('fakultas')->get();
        return view('prodi.index', compact('prodis'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $input= $request->validate([
            'nama_prodi' => 'required|
            unique:prodis',
            'singkatan'=>'required|max:2', 
            'kaprodi'=>'required',
            'fakultas_id'=>'required'
        ]);

        Prodi::create($input);
        
        return redirect()->route('prodi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $fakultas = Fakultas::all();
        $prodi = Prodi::findOrFail($prodi->id);
        //  $prodi = Prodi::find($prodi,'');
       return view('prodi.edit', compact
       ('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $prodi)
    {
       
          $input=
        $request->validate([
            'nama_prodi' => 'required|unique:prodis,nama_prodi,'.$prodi,
            'singkatan'=>'required',
            'kaprodi'=>'required',
            'fakultas_id'=>'required'
        ]);   
        Prodi::where('id', $prodi)->update($input);
        
        return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $prodi)
    {
          $prodi = Prodi::find($prodi,'id');
        $prodi->delete();
        return redirect()->route('prodi.index');
    }
}
