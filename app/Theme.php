<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model {

	protected $table = 'theme';
	public function category() {
		return $this->belongsTo(Categories::class);
	}
}
