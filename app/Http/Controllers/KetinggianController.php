<?php

namespace App\Http\Controllers;

use App\Ketinggian;
use Illuminate\Http\Request;
use DB;
use Session; 

class KetinggianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ketinggian::all();

        // $bobot = DB::table('bobot')->get();

        return view('ketinggian.list', [
            'data'  => $data,
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
            'ketinggian'    => 'required',
            // 'bobot_id'    => 'required',
        ]);
 
        Ketinggian::create($request->all());
        
        Session::flash('success', 'Data Berhasil Ditambah');
 
        return redirect()->route('ketinggian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ketinggian  $ketinggian
     * @return \Illuminate\Http\Response
     */
    public function show(Ketinggian $ketinggian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ketinggian  $ketinggian
     * @return \Illuminate\Http\Response
     */
    public function edit(Ketinggian $ketinggian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ketinggian  $ketinggian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ketinggian $ketinggian)
    {
        $this->validate($request,[
            'ketinggian'    => 'required',
            // 'bobot_id'    => 'required'
        ]);

        $ketinggian->update($request->all());

        Session::flash('success', 'Data Berhasil Diubah');

        return redirect()->route('ketinggian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ketinggian  $ketinggian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ketinggian $ketinggian)
    {
        $ketinggian->delete();

        Session::flash('success', 'Data Berhasil Dihapus');

        return redirect()->route('ketinggian.index');
    }
}
