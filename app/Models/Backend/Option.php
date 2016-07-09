<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
	public function items()
	{
		return $this->hasMany('App\Models\Backend\OptionItem');
	}
}
