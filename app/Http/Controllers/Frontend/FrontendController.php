<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Response;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Home page
     */
    public function home()
    {
        
        return view('frontend.home');
    }

    /**
     * Get customer detail to auto fill order form
     */
    public function getCustomerByPhone(Request $request){

		$response = array();

		$response['status'] = 0;

		if ($request->input('phone') == '03000287') {

			$response['status'] = 1;

			$response['customer'] = array(
				'first_name' 	=> 'Muhammad'
				,'last_name' 	=> 'Hanif'
				,'email' 		=> 'developer.hanif@gmail.com'
				,'city'			=> 'Karachi'
				,'area'			=> 'North Karachi'
				,'address'		=> 'Flat # 101, First Floor, Al Rehman Arcade.'
			);
		}

		return Response::json($response);
	}
}
