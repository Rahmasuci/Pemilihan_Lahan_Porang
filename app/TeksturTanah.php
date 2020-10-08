<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeksturTanah extends Model
{
    protected $table = 'tekstur_tanah';

	protected $fillable = [
		'tekstur_tanah'
		// 'bobot_id'
	];

	// public function bobot()
    // {
    //     return $this->belongsTo('App\Bobot');
    // }
}
