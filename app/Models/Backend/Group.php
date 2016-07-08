<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	public function products()
	{
		return $this->hasMany('App\Models\Backend\Product', 'group_id', 'id');
	}
}
