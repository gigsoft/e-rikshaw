<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\{User,Guranter,Hierer,Purchase_Details,Stores,Vechiles_Model,Vechiles,Vechicle_Colour,Hierer_cheques,Sale_Details,Purchase_Headers,Items,Sale_Headers};
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

//this function use Data Show in Index Table


public function purchaseIndex() {
    $purchase_details        = Purchase_Details::with(['itemData','purchase_header','vehicles'])->get();

    foreach ($purchase_details as $purchase_detail) {
        $store_id=$purchase_detail->purchase_header->store_id;
        $purchase_detail->store_name=Stores::where('id',$store_id)->first();
        $where = array(
            'store_id' => $store_id,
            'vehicle_id' => $purchase_detail->vehicle_id,
            'item_id' => $purchase_detail->item_id
        );
        $saleDetails = Sale_Details::where($where)->first();
        if ($saleDetails) {
            $purchase_detail->quantity_out = $saleDetails->quantity;
        } else {
            $purchase_detail->quantity_out = 0;
        }
    }
    return view('admin.report.purchaseView',compact('purchase_details'));
}
public function getPurchaseData(Request $request)
    {
        $allMonths = range(1, 12);

    // Get the quantity data for purchases
    $monthWiseQuantity = Purchase_Details::select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(quantity) as total_quantity'))
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->pluck('total_quantity', 'month')
        ->toArray();

    // Get the quantity data for sales
    $monthWiseSaleQuantity = Sale_Details::select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(quantity) as total_quantity'))
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->pluck('total_quantity', 'month')
        ->toArray();

    // Merge the obtained data with all months, filling missing months with 0 values
    $mergedData = [];
    foreach ($allMonths as $month) {
        $mergedData[$month] = [
            'purchase_quantity' => isset($monthWiseQuantity[$month]) ? $monthWiseQuantity[$month] : 0,
            'sale_quantity' => isset($monthWiseSaleQuantity[$month]) ? $monthWiseSaleQuantity[$month] : 0,
        ];


    }

    // echo "<pre>";
    // print_r($mergedData);die;


        $data=array('saleCount'=>$monthWiseSaleQuantity,'purchaseCount'=>$monthWiseQuantity);

        // Return the purchase data as a JSON response
        return response()->json($data);
}





    public function salesIndex(){
        $sale_headers = Sale_Headers::with(['stores', 'sale_details'])->get();

        $sale_headers = $sale_headers ?? [];
        // $purchase_details                   = Purchase_Details::where('order_id', $id)->get();

        foreach ($sale_headers as $value) {
            $value->pending_items=Sale_details::where('order_id',$value->id)->where('status',0)->count();
            $value->recieved_items=Sale_details::where('order_id',$value->id)->where('status',1)->count();

        }

        return view('admin.report.salesView',compact('sale_headers'));
    }

// this function use Data Create function





}
