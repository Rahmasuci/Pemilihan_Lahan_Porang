<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CurahHujan;
use App\Ketinggian;
use App\Naungan;
use App\PhTanah;
use App\SuhuUdara;
use App\TeksturTanah;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $ketinggian     = Ketinggian::all();
        $naungan        = Naungan::all();
        $phTanah        = PhTanah::all();
        $suhuUdara      = SuhuUdara::all();
        $teksturTanah   = TeksturTanah::all();

        return view('admin', [
            'ketinggian'    => $ketinggian,
            'naungan'       => $naungan,
            'phTanah'       => $phTanah,
            'suhuUdara'     => $suhuUdara,
            'teksturTanah'  => $teksturTanah,
        ]);
    }
}
