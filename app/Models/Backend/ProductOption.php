<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $fillable =  ['product_id', 'option_id'];
	protected $table = 'ProductOptions';

	// Get main option detail
	public function option()
    {
        return $this->belongsTo('App\Models\Backend\Option');
    }

    // Items which are selected to product's options
    public function items()
    {
        return $this->hasMany('App\Models\Backend\ProductOptionItem', 'product_option_id')
         ->leftJoin('OptionItems', 'ProductOptionItems.option_item_id', '=', 'OptionItems.id')
         ->select(['OptionItems.id', 'OptionItems.name', 'ProductOptionItems.price', 'ProductOptionItems.status']);
    }

    // This method will be used in eloquent delete while updating product
    public function optionItems()
    {
        return $this->hasMany('App\Models\Backend\ProductOptionItem', 'product_option_id');
    }

}
