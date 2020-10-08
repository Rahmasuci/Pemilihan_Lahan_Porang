<?php

namespace App\Http\Controllers;

use App\CurahHujan;
use Illuminate\Http\Request;
use DB;
use Session;  

class CurahHujanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CurahHujan::all();

        $bobot = DB::table('bobot')->get();

        return view('hujan.list', [
            'data'  => $data,
            'bobot' => $bobot
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
            'curah_hujan'   => 'required',
            'bobot_id'      => 'required',
        ]);
 
        CurahHujan::create($request->all());
        
        Session::flash('success', 'Data Berhasil Ditambah');
 
        return redirect()->route('curah-hujan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CurahHujan  $curahHujan
     * @return \Illuminate\Http\Response
     */
    public function show(CurahHujan $curahHujan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CurahHujan  $curahHujan
     * @return \Illuminate\Http\Response
     */
    public function edit(CurahHujan $curahHujan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CurahHujan  $curahHujan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CurahHujan $curahHujan)
    {
        $this->validate($request,[
            'curah_hujan'   => 'required',
            'bobot_id'      => 'required',
        ]);

        $curahHujan->update($request->all());
        
        Session::flash('success', 'Data Berhasil Diubah');
 
        return redirect()->route('curah-hujan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CurahHujan  $curahHujan
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurahHujan $curahHujan)
    {
        $curahHujan->delete();

        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->route('curah-hujan.index');
    }
}
