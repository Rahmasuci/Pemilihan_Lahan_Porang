<?php

namespace App\Http\Controllers;

use App\Bobot;
use Illuminate\Http\Request;
use DB;
use Session;    

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Bobot::all();

        return view('bobot.list', [
            'data'  => $data
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
            'bobot'         => 'required',
            'keterangan'    => 'required',
        ]);
 
        Bobot::create($request->all());
        
        Session::flash('success', 'Data Berhasil Ditambah');
 
        return redirect()->route('bobot.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function show(Bobot $bobot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function edit(Bobot $bobot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bobot $bobot)
    {
        $this->validate($request,[
            'bobot'         => 'required',
            'keterangan'    => 'required'
        ]);

        $bobot->update($request->all());

        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('bobot.index');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bobot  $bobot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bobot $bobot)
    {
        $bobot->delete();

        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->route('bobot.index');
    }
}
