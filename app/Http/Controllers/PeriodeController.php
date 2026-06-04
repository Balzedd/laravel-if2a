<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = Periode::all();
        // dd($result);

        return view('Periode.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Return view('Periode.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $input=
        $request->validate([
            'tahun_akademik' => 'required',
            'semester'=>'required'
        ]);

        Periode::create($input);
        
        return redirect()->route('periode.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($periode)
    {
         $periode = Periode::find($periode,'id');
       return view('periode.edit', compact
       ('periode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $periode)
    {
         $input=
        $request->validate([
            'tahun_akademik' => 'required',
            'semester'=>'required'
        ]);
        Periode::where('id', $periode)->update($input);
        
        return redirect()->route('periode.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($periode)
    {
         $periode = Periode::find($periode,'id');
        $periode->delete();
        return redirect()->route('periode.index');
    }
}
