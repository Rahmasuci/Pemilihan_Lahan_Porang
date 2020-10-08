<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CurahHujan;
use App\Ketinggian;
use App\Naungan;
use App\PhTanah;
use App\SuhuUdara;
use App\TeksturTanah;
use App\Lahan;

use Illuminate\Support\Arr;


class PagesController extends Controller
{
    public function index()
    {
        // $curahHujan     = CurahHujan::all();
        $ketinggian     = Ketinggian::all();
        $naungan        = Naungan::all();
        $phTanah        = PhTanah::all();
        $suhuUdara      = SuhuUdara::all();
        $teksturTanah   = TeksturTanah::all();

        return view('user', [
            // 'curahHujan'    => $curahHujan,
            'ketinggian'    => $ketinggian,
            'naungan'       => $naungan,
            'phTanah'       => $phTanah,
            'suhuUdara'     => $suhuUdara,
            'teksturTanah'  => $teksturTanah,
        ]);
    }

    public function bobot(){
        $daftarLahan = array();

        $tekstur    = 0.325;
        $suhu       = 0.25;
        $ketinggian = 0.2;
        $ph         = 0.125;
        $naungan    = 0.1;

        foreach ($_POST["listLahan"] as $key) {
            
            //Pembobotan Suhu
            if ($key[1] == "Pasir (Sand)") {
                $key[6] = 1;
            }
            elseif ($key[1] == "Lempung Liat Berpasir (Sandy Clay Loam)") {
                $key[6] = 2;	
            }
            elseif ($key[1] == "Liat Berpasir (Sandy Clay)") {
                $key[6] = 3;	
            }
            elseif ($key[1] == "Lempung - Lempung Liat") {
                $key[6] = 4;
            }

            //Pembobotan Suhu
            if ($key[2] == "0-15") {
                $key[7] =1;
            }
            elseif ($key[2] == "16-24") {
                $key[7] = 3;	
            }
            elseif ($key[2] == "25-35") {
                $key[7] = 4;	
            }
            elseif ($key[2] == ">35") {
                $key[7] = 2;	
            }

            //Pembobotan Ketinggian
            if ($key[3] == "0-399") {
                $key[8] = 2;
            }
            elseif ($key[3] == "400-600") {
                $key[8] = 4;	
            }
            elseif ($key[3] == "601-800") {
                $key[8] = 3;	
            }
            elseif ($key[3] == ">801") {
                $key[8] = 1;	
            }

            //Pembobotan PH
            if ($key[4] == "1-5") {
                $key[9] = 2;	
            }
            elseif ($key[4] == "6-7") {
                $key[9] = 4;	
            }
            elseif ($key[4] == "8-10") {
                $key[9] = 3;	
            }
            elseif ($key[4] == "11-14") {
                $key[9] = 1;	
            }

             //Pembobotan Naungan
            if ($key[5] == "0-39") {
                $key[10] = 2;	
            }
            elseif ($key[5] == "40-60") {
                $key[10] = 4;	
            }
            elseif ($key[5] == "61-80") {
                $key[10] = 3;	
            }
            elseif ($key[5] == "81-100") {
                $key[10] = 1;	
            }

            $lahan = new Lahan($key[0], $key[1], $key[2], $key[3], $key[4], $key[5], $key[6], $key[7], $key[8], $key[9], $key[10] );           

            array_push($daftarLahan, $lahan);
        }

        // var_dump($daftarLahan);

        $compare_bobot_tekstur = array_column($daftarLahan, 'bobot_tekstur');
        $compare_bobot_suhu = array_column($daftarLahan, 'bobot_suhu');
        $compare_bobot_ketinggian = array_column($daftarLahan, 'bobot_ketinggian');
        $compare_bobot_ph = array_column($daftarLahan, 'bobot_ph');
        $compare_bobot_naungan = array_column($daftarLahan, 'bobot_naungan');

        $max_tekstur = max($compare_bobot_tekstur); 
        $min_tekstur = min($compare_bobot_tekstur);
        $selisih_tekstur = $max_tekstur-$min_tekstur;
        // var_dump($selisih_tekstur);

        $max_suhu = max($compare_bobot_suhu); 
        $min_suhu = min($compare_bobot_suhu);
        $selisih_suhu = $max_suhu-$min_suhu;
        // var_dump($selisih_suhu);

        $max_ketinggian = max($compare_bobot_ketinggian); 
        $min_ketinggian = min($compare_bobot_ketinggian);
        $selisih_ketinggian = $max_ketinggian-$min_ketinggian;
        // var_dump($selisih_ketinggian);

        $max_ph = max($compare_bobot_ph); 
        $min_ph = min($compare_bobot_ph);
        $selisih_ph = $max_ph-$min_ph;
        // var_dump($selisih_ph);

        $max_naungan = max($compare_bobot_naungan); 
        $min_naungan = min($compare_bobot_naungan);
        $selisih_naungan = $max_naungan-$min_naungan;
        // var_dump($selisih_naungan);

        // print_r($compare_bobot_tekstur);
        // print_r($compare_bobot_suhu);
        // print_r($compare_bobot_ketinggian);
        // print_r($compare_bobot_ph);
        // print_r($compare_bobot_naungan);

        // var_dump($max_tekstur) ;
        // var_dump($min_tekstur);

        // print_r($max_suhu);
        // print_r($min_suhu);

        // print_r($max_ketinggian);
        // print_r($min_ketinggian);

        // print_r($max_ph);
        // print_r($min_ph);

        // print_r($max_naungan);
        // print_r($min_naungan);
        
        
        foreach ($daftarLahan as $key){

            if ($selisih_tekstur != 0) {                
                $key->normal_tekstur = ($key->bobot_tekstur - $min_tekstur) / $selisih_tekstur;
            }
            else{
                $key->normal_tekstur = 0;
            }

            if ($selisih_suhu != 0) {
                $key->normal_suhu = ($key->bobot_suhu - $min_suhu) / $selisih_suhu;
            }
            else{                
                $key->normal_suhu = 0;
            }

            if ($selisih_ketinggian != 0) {
               $key->normal_ketinggian = ($key->bobot_ketinggian - $min_ketinggian) / $selisih_ketinggian;
            }
            else{
            
                 $key->normal_ketinggian = 0;
            }

            if ($selisih_ph != 0) {
                $key->normal_ph = ($key->bobot_ph - $min_ph) / $selisih_ph;
            }
            else{
                
                $key->normal_ph = 0;
            }

            if ($selisih_naungan != 0) {
                 $key->normal_naungan = ($key->bobot_naungan - $min_naungan) / $selisih_naungan;
            }
            else{
               
                $key->normal_naungan = 0;
            }
           
            // var_dump(
            //     $key->normal_tekstur, 
            //     $key->normal_suhu, 
            //     $key->normal_ketinggian, 
            //     $key->normal_ph,
            //     $key->normal_naungan            
            //     );
        }

        //Hitung Nilai Akhir
        foreach ($daftarLahan as $key) {
            $key->hasil = ($tekstur * $key->normal_tekstur) + ($suhu * $key->normal_suhu) + ($ketinggian * $key->normal_ketinggian) + ($ph * $key->normal_ph) +($naungan * $key->normal_naungan);

            // var_dump($key->hasil);
        }

        //sorting
        usort($daftarLahan, function($a, $b){
            return ($a->hasil < $b->hasil);
        });

        // $this->hasil($daftarLahan);

        
        $collapse = Arr::collapse($daftarLahan);
        $flatten = Arr::flatten($collapse);
        // $get = Arr::get($daftarLahan, '0.nama');
        // $pluck = Arr::pluck($daftarLahan, 'hasil', 'nama');
        // print_r($daftarLahan);
        // print_r($pluck);
        // dd($pluck);
        // print_r($flatten);

        // foreach ($daftarLahan as $key) {
            $length=count($daftarLahan);
            // var_dump($length);

            for ($i = 0; $i < $length; $i++) {
                // var_dump($daftarLahan[$i]);
                $data[$i] = array(
                    'nama'          => $daftarLahan[$i]->nama,
                    'hasil'         => $daftarLahan[$i]->hasil,
                    'tekstur'       => $daftarLahan[$i]->tekstur,
                    'suhu'          => $daftarLahan[$i]->suhu,
                    'ketinggian'    => $daftarLahan[$i]->ketinggian,
                    'ph'            => $daftarLahan[$i]->ph,
                    'naungan'       => $daftarLahan[$i]->naungan,
                );
            }
            
        // }
        //  var_dump($data[0]);
        //  var_dump($data[1]);
        return response()->json($data);
        // return (compact('rank' ));
        
    }  

   
   
}