<?php

namespace App\Http\Controllers;

use App\Naungan;
use Illuminate\Http\Request;
use DB;
use Session;  

class NaunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Naungan::all();

        // $bobot = DB::table('bobot')->get();

        return view('naungan.list', [
            'data' => $data
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
            'naungan'     => 'required',
            // 'bobot_id'    => 'required',
        ]);
 
        Naungan::create($request->all());
        
        Session::flash('success', 'Data Berhasil Ditambah');
 
        return redirect()->route('naungan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Naungan  $naungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Naungan $naungan)
    {
        $this->validate($request,[
            'naungan'     => 'required',
            // 'bobot_id'    => 'required'
        ]);

        $naungan->update($request->all());

        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('naungan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Naungan  $naungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Naungan $naungan)
    {
        $naungan->delete();

        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->route('naungan.index');
    }
}
