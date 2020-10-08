<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Naungan extends Model
{
    protected $table = 'naungan';

	protected $fillable = [
		'naungan'
		// 'bobot_id'
	];

	// public function bobot()
    // {
    //     return $this->belongsTo('App\Bobot');
    // }
}
