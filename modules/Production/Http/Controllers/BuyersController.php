<?php namespace Modules\Production\Http\Controllers;

use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;
use Modules\Production\Entities\Buyer;
use Pingpong\Modules\Routing\Controller;

class BuyersController extends Controller {

    public function index()
    {
        return view('production::buyers.index');
    }

    public function fetchBuyersList()
    {
        return Buyer::all();
    }


    public function show($id){
        $data['buyer_id'] = $id;
        return view('production::buyers.show', $data);
    }

    public function fetchBuyerDetails($id){
        $data['buyer'] =  Buyer::where('id', $id)->get();
        $data['buyer']['user_name'] = $data['buyer'][0]->user;
        return $data['buyer'];
    }

    public function viewBuyerEditForm($id){
        $data['buyer_id'] = $id;
        return view('production::buyers.edit', $data);
    }

    public function destroy(Request $request, $id, $action=null){

        if($action == 'all')
        {
            Buyer::truncate();
        }
        elseif($action == 'single_delete')
        {
            Buyer::find($id)->delete();
        }
        else if($action == 'selected')
        {
            $items = explode(',', $id);
            Buyer::destroy($items);
        }

    }

    public function updateField($field, $id, $value)
    {
        Buyer::where('id', $id)->update([
            $field => $value
        ]);
    }

/*    public function update(Request $request){
        $buyer_id = Buyer::max('id')+1;
        $buyer = Buyer::find($request->id);
        $buyer->buyer_name = $request->buyer_name;
        if($request->buyer_image != ""){
            $file_extension = $request->file('buyer_image')->guessExtension();
            $img_name = $buyer_id.".".$file_extension;
            $request->file('buyer_image')->move('img/uploads/production/buyers', $img_name);
            $buyer->image = $img_name;
        }
        $buyer->save();
        $data['buyer'] = Buyer::find($request->id);
        return view('production::ajax-views.buyer_details_edit', $data);
    }*/

    public function addBuyer(Request $request){
        $buyer_id = Buyer::max('id')+1;
        $buyer = new Buyer();
        $buyer->buyer_name = $request->buyer_name;
        $buyer->user_id = Auth::user()->id;
        if($request->buyer_image != ""){
            $file_extension = $request->file('buyer_image')->guessExtension();
            $img_name = $buyer_id.".".$file_extension;
            $request->file('buyer_image')->move('img/uploads/production/buyers', $img_name);
        }else{
            $img_name = "no_image.jpg";
        }
        $buyer->image = $img_name;
        $buyer->save();
    }
	
}