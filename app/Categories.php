<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

	protected $table = 'categories';

	public function theme() {
		return $this->hasMany(Theme::class);
	}

}
