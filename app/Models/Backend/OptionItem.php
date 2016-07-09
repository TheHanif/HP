<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class OptionItem extends Model
{
	protected $table = 'OptionItems';

	public function option()
    {
        return $this->belongsTo('App\Models\Backend\Option');
    }
}
