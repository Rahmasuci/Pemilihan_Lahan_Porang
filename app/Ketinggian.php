<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ketinggian extends Model
{
    protected $table = 'ketinggian';

	protected $fillable = [
		'ketinggian',
	];

	// public function bobot()
    // {
    //     return $this->belongsTo('App\Bobot');
    // }
}
