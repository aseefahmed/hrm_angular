<?php namespace Modules\Production\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Production\Entities\Buyer;
use Pingpong\Modules\Routing\Controller;

class BuyersController extends Controller {
	
	public function index()
	{
	    $data['buyers'] = Buyer::all();
		return view('production::buyers.index', $data);
	}

    public function addBuyer(Request $request){
        $buyer_id = Buyer::max('id')+1;
        $buyer = new Buyer();
        $buyer->buyer_name = $request->buyer_name;
        if($request->buyer_image != ""){
            $file_extension = $request->file('buyer_image')->guessExtension();
            $img_name = $buyer_id.".".$file_extension;
                $request->file('buyer_image')->move('img/uploads/production/buyers', $img_name);
        }else{
            $img_name = "no_image.jpg";
        }
        $buyer->image = $img_name;
        $buyer->save();
        $data['buyers'] = Buyer::all();
        return view('production::ajax-views.buyers-list', $data);
    }
	
}