<?php

namespace App\Http\Controllers;

use App\TeksturTanah;
use Illuminate\Http\Request;
use DB;
use Session;

class TeksturTanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TeksturTanah::all();

        // $bobot = DB::table('bobot')->get();

        return view('tanah.list', [
            'data'  => $data
            // 'bobot' => $bobot
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tekstur_tanah'     => 'required',
            // 'bobot_id'          => 'required',
        ]);
 
        TeksturTanah::create($request->all());
        
        Session::flash('success', 'Data Berhasil Ditambah');
 
        return redirect()->route('tekstur-tanah.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeksturTanah  $teksturTanah
     * @return \Illuminate\Http\Response
     */
    public function show(TeksturTanah $teksturTanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeksturTanah  $teksturTanah
     * @return \Illuminate\Http\Response
     */
    public function edit(TeksturTanah $teksturTanah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeksturTanah  $teksturTanah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeksturTanah $teksturTanah)
    {
        $this->validate($request,[
            'tekstur_tanah'     => 'required',
            // 'bobot_id'          => 'required'
        ]);

        $teksturTanah->update($request->all());

        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('tekstur-tanah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeksturTanah  $teksturTanah
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeksturTanah $teksturTanah)
    {
        $teksturTanah->delete();

        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->route('tekstur-tanah.index');
    }
}
