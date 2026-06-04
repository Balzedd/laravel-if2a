<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodis = Prodi::all();
        return view('mahasiswa.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $input= $request->validate([
            'npm' => 'required|unique:mahasiswas,npm',
            'nama'=>'required',
            'foto'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prodi_id'=>'required'
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('fotos', $nama_foto, 'public');
        } else {
            $nama_foto = null;
        }
        $input['foto'] = $nama_foto;

        Mahasiswa::create($input);
        
        return redirect()->route('mahasiswa.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $mahasiswa)
    {
            $prodis = Prodi::all();
         $mahasiswa = Mahasiswa::find($mahasiswa, 'id');
       return view('mahasiswa.edit', compact
       ('mahasiswa','prodis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $mahasiswa)
    {
        $mahasiswa = Mahasiswa::find($mahasiswa);
        $input = $request->validate([
            'npm' => 'required|unique:mahasiswas,npm,' . $mahasiswa->id,
            'nama' => 'required',
            'prodi_id' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            $foto->storeAs('fotos', $nama_foto, 'public');
            $input['foto'] = $nama_foto;
        }

        $mahasiswa->update($input);

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($mahasiswa)
    {
            $mahasiswa = Mahasiswa::find($mahasiswa,'id');
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}
