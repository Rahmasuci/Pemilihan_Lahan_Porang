<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lahan extends Model
{
    public $nama;
	public $tekstur;
	public $suhu;
	public $ketinggian;
	public $ph;
	public $naungan;

	public $bobot_tekstur;
	public $bobot_suhu;
	public $bobot_ketinggian;
	public $bobot_ph;
	public $bobot_naungan;

	public $normal_tekstur;
	public $normal_suhu;
	public $normal_ketinggian;
	public $normal_ph;
	public $normal_naungan;

	public $hasil;

	function __construct($nama, $tekstur, $suhu, $ketinggian, $ph, $naungan, $bobot_tekstur, $bobot_suhu, $bobot_ketinggian, $bobot_ph, $bobot_naungan)
	{
		$this->nama 		= $nama;
		$this->tekstur 		= $tekstur;
		$this->suhu 		= $suhu;
		$this->ketinggian 	= $ketinggian;
		$this->ph 			= $ph;
		$this->naungan 		= $naungan;

		$this->bobot_tekstur 		= $bobot_tekstur;
		$this->bobot_suhu 			= $bobot_suhu;
		$this->bobot_ketinggian 	= $bobot_ketinggian;
		$this->bobot_ph 			= $bobot_ph;
		$this->bobot_naungan 		= $bobot_naungan;

	}
}
