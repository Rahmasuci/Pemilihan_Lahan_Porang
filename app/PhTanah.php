<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhTanah extends Model
{
    protected $table = 'ph_tanah';

	protected $fillable = [
		'ph_tanah'
		// 'bobot_id'
	];

	// public function bobot()
    // {
    //     return $this->belongsTo('App\Bobot');
    // }
}
