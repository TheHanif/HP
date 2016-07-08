<?php

namespace App\Http\Controllers\Backend;



class ProductController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('backend.form_product');
    }

    public function all()
    {
    	return 'all products';
    }
}
