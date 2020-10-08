<?php

namespace App\Http\Controllers;

use App\PhTanah;
use Illuminate\Http\Request;
use DB;
use Session;

class PhTanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PhTanah::all();

        // $bobot = DB::table('bobot')->get();

        return view('ph.list', [
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
            'ph_tanah'     => 'required',
            // 'bobot_id'    => 'required',
        ]);
 
        PhTanah::create($request->all());
        
        Session::flash('success', 'Data Berhasil Ditambah');
 
        return redirect()->route('ph-tanah.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PhTanah  $phTanah
     * @return \Illuminate\Http\Response
     */
    public function show(PhTanah $phTanah)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhTanah  $phTanah
     * @return \Illuminate\Http\Response
     */
    public function edit(PhTanah $phTanah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhTanah  $phTanah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhTanah $phTanah)
    {
        $this->validate($request,[
            'ph_tanah'     => 'required',
            // 'bobot_id'    => 'required'
        ]);

        $phTanah->update($request->all());

        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('ph-tanah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhTanah  $phTanah
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhTanah $phTanah)
    {
        $phTanah->delete();

        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->route('ph-tanah.index');
    }
}
