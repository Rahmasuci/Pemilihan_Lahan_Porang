<?php

namespace App\Http\Controllers;

use App\SuhuUdara;
use Illuminate\Http\Request;
use DB;
use Session;    

class SuhuUdaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SuhuUdara::all();

        // $bobot = DB::table('bobot')->get();

        return view('suhu.list', [
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
            'suhu_udara'     => 'required',
            // 'bobot_id'    => 'required',
        ]);
 
        SuhuUdara::create($request->all());
        
        Session::flash('success', 'Data Berhasil Ditambah');
 
        return redirect()->route('suhu-udara.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuhuUdara  $suhuUdara
     * @return \Illuminate\Http\Response
     */
    public function show(SuhuUdara $suhuUdara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuhuUdara  $suhuUdara
     * @return \Illuminate\Http\Response
     */
    public function edit(SuhuUdara $suhuUdara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuhuUdara  $suhuUdara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuhuUdara $suhuUdara)
    {
        $this->validate($request,[
            'suhu_udara'   => 'required',
            // 'bobot_id'    => 'required'
        ]);

        $suhuUdara->update($request->all());

        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('suhu-udara.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuhuUdara  $suhuUdara
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuhuUdara $suhuUdara)
    {
        $suhuUdara->delete();

        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->route('suhu-udara.index');
    }
}
