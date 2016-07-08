<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =  ['name', 'group_id', 'cost', 'price'];

    public function group()
    {
        return $this->belongsTo('App\Models\Backend\Group', 'group_id', 'id')->select('name');
    }
}
