<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuhuUdara extends Model
{
    protected $table = 'suhu_udara';

	protected $fillable = [
		'suhu_udara'
		// 'bobot_id'
	];

	// public function bobot()
    // {
    //     return $this->belongsTo('App\Bobot');
    // }
}
