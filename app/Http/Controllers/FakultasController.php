<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Fakultas::all();
        // dd($result);

        return view('Fakultas.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $input=
        $request->validate([
            'nama_fakultas' => 'required|
            unique:fakultas',
            'singkatan'=>'required'
        ]);

        Fakultas::create($input);
        
        return redirect()->route('fakultas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($fakultas)
    {
       $fakultas = Fakultas::find($fakultas,'id');
       return view('fakultas.edit', compact
       ('fakultas'));
    }

    
    public function update(Request $request, $fakultas)
    {
           $input=
        $request->validate([
            'nama_fakultas' => 'required|
            unique:fakultas,nama_fakultas,'.$fakultas,
            'singkatan'=>'required'
        ]);
        Fakultas::where('id', $fakultas)->update($input);
        
        return redirect()->route('fakultas.index');
    }

    public function destroy($fakultas)
    {
        $fakultas = Fakultas::find($fakultas,'id');
         $fakultas->delete();
         return redirect()->route('fakultas.index');
    }
}
