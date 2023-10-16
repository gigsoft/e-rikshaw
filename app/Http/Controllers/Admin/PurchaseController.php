<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\{User,Guranter,Hierer,Vechile_Batterys,Vechiles_Model,Vechiles,Vechicle_Colour,Hierer_cheques,Purchase_Details,Purchase_Headers,Items,Stores};
use Carbon\Carbon;


class PurchaseController extends Controller
{

//this function use Data Show in Index Table
    public function index(){
        $items                          = Items::get();
        $purchase_headers               = Purchase_Headers::with('vehicles')->get();
        foreach($purchase_headers as $value){
            $value->pending_count       = Purchase_Details::where('order_id',$value->id)->where('status',"0")->count();
            $value->recieved_count      = Purchase_Details::where('order_id',$value->id)->where('status',"1")->count();
            $value->incomplete_count    = Purchase_Details::where('order_id',$value->id)->where('status',"2")->count();
         }

        return view('admin.purchase.index',compact('items','purchase_headers'));
    }

// this function use Data Create function
    public function create(){
        $item                           = Items::get();
        $vehicle_models                 = Vechiles_Model::get();
        $stores                         = Stores::get();
        return view('admin.purchase.create',compact('vehicle_models','item','stores'));
    }

// this function use Data Store in Database
    public function store(Request $request){
        $validator                    = Validator::make($request->all(), []);
        $purchase_header              = Purchase_Headers::get();

        if ($validator->fails()) {
            $errors                   = $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
              // $purchaseHeader['vehicle_id']           = $request->input('vehicle_id');
               $purchaseHeader['date']                 = now();
               $purchaseHeader['supplier_name']        = $request->input('supplier_name');
               $purchaseHeader['supplier_contact_no']  = $request->input('supplier_contact_no');
               $purchaseHeader['total_amount']         = $request->input('grand_total');
               $purchaseHeader['store_id']             = $request->input('storeName');
               $create                                 = Purchase_Headers::create($purchaseHeader);
               $numRows                                = $request->input('invoice');

               foreach ($numRows as $key => $value) {
                    $detailData = [
                        'order_id'           => $create->id,
                        'store_id'           => $request->input('storeName'),
                        'item_id'            => $value['item'],
                        'quantity'           => $value['qty'],
                        'price'              => $value['price'],
                        'vehicle_id'         => $value['vehicle_models'],
                        'total_price'        => $value['qty'] * $value['price'],
                    ];
                    // Create Purchase_Details records
                    Purchase_Details::create($detailData);
                }
            }
                 return redirect()->route('admin.purchase')->with('success', 'Items created successfully.');
    }

// this function use in Show Item Data

    public function purchaseView(Request $request, $id){
        $purchase_details                   = Purchase_Details::where('order_id', $id)->get();

        foreach ($purchase_details as $value) {
            $item                           = optional(Items::find($value->item_id));
            $value->item_name               = $item->name ?? 'Item Not Found';

            // Check status and set status_text accordingly
            if ($value->status == 0) {
                $value->status_text = 'Pending';
            } elseif ($value->status == 1) {
                $value->status_text = 'Received';

            } elseif ($value->status == 2) {
                $value->status_text = 'InComplete';
            }else {
                // Handle other status values if necessary
                $value->status_text = 'Unknown Status';
            }
        }

        return view('admin.purchase.view', compact('purchase_details'));
    }

    public function edit($id) {
        $purchaseHeader                = Purchase_Headers::find($id);
        $item                          = Items::get();
        $vehicle_models                = Vechiles_Model::get();
        $stores                        = Stores::get();
        $purchaseDetails               = Purchase_Details::where('order_id', $id)->get();
        return view('admin.purchase.edit', compact('purchaseHeader', 'item','stores', 'vehicle_models', 'purchaseDetails'));
    }

    public function update(Request $request, $id)
   {
             $validator      = Validator::make($request->all(), []);
             $purchaseHeader = Purchase_Headers::find($id);

         if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
             // Update the purchase header
              $purchaseHeader->update([
                   'date'                  => now(),
                   'supplier_name'         => $request->input('supplier_name'),
                   'supplier_contact_no'   => $request->input('supplier_contact_no'),
                   'total_amount'          => $request->input('grand_total'),
                   'store_id'              => $request->input('storeName'),
              ]);

                // Delete existing purchase details for this header
               Purchase_Details::where('order_id', $id)->delete();
              // Insert updated purchase details
             $numRows = $request->input('invoice');
             foreach ($numRows as $key => $value) {
                       $detailData = [
                         'order_id'         => $purchaseHeader->id,
                         'store_id'         => $request->input('storeName'),
                         'item_id'          => $value['item'],
                         'quantity'         => $value['qty'],
                         'price'            => $value['price'],
                         'vehicle_id'       => $value['vehicle_models'],
                         'status'           => $value['status'],
                         'total_price'      => $value['qty'] * $value['price'],
            ];
            // Create Purchase_Details records
            Purchase_Details::create($detailData);
        }
    }

    return redirect()->route('admin.purchase')->with('success', 'Items updated successfully.');
 }




}
