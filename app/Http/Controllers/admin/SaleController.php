<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\{User,Guranter,Hierer,Vechile_Batterys,Stores,Vechiles_Model,Vechiles,Vechicle_Colour,Hierer_cheques,Sale_Details,Sale_Headers,Items};
use Carbon\Carbon;


class SaleController extends Controller
{

//this function use Data Show in Index Table
    public function index(){
        $items                         = Items::get();
        $sale_headers              = Sale_Headers::with('vehicles')->get();
        foreach($sale_headers as $value){
            $value->pending_count        = Sale_Details::where('order_id',$value->id)->where('status',"0")->count();
            $value->recieved_count        = Sale_Details::where('order_id',$value->id)->where('status',"1")->count();
         }

        return view('admin.sale.index',compact('items','sale_headers'));
    }

// this function use Data Create function
    public function create(){
        $item                         = Items::get();
        $vehicle_models               = Vechiles_Model::get();
        $stores                        = Stores::get();
        return view('admin.sale.create',compact('vehicle_models','item','stores'));
    }

// this function use Data Store in Database
    public function store(Request $request){
        $validator = Validator::make($request->all(), []);
        $sale_header = Sale_Headers::get();


        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
               $saleHeader['vehicle_id']           = $request->input('vehicle_id');
               $saleHeader['date']                 = now();
               $saleHeader['supplier_name']        = $request->input('supplier_name');
               $saleHeader['supplier_contact_no']  = $request->input('supplier_contact_no');
               $saleHeader['total_amount']         = $request->input('grand_total');
               $saleHeader['store_id']             = $request->input('storeName');
               $create                                 = Sale_Headers::create($saleHeader);
               $numRows                                = $request->input('invoice');

               foreach ($numRows as $key => $value) {
                    $detailData = [
                        'order_id'           => $create->id,
                        'item_id'            => $value['item'],
                        'quantity'           => $value['qty'],
                        'price'              => $value['price'],
                        'total_price'        => $value['qty'] * $value['price'],
                    ];
                    // Create Purchase_Details records
                    Sale_Details::create($detailData);
                }
            }

                 return redirect()->route('admin.sale')->with('success', 'Items created successfully.');
    }

// this function use in Show Item Data

    public function saleView(Request $request, $id){

        $sale_details = Sale_Details::where('order_id', $id)->get();

        foreach ($sale_details as $value) {
            $item = optional(Items::find($value->item_id));
            $value->item_name = $item->name ?? 'Item Not Found';

            // Check status and set status_text accordingly
            if ($value->status == 0) {
                $value->status_text = 'Pending';
            } elseif ($value->status == 1) {
                $value->status_text = 'Received';
            } else {
                // Handle other status values if necessary
                $value->status_text = 'Unknown Status';
            }
        }

        return view('admin.sale.view', compact('sale_details'));
    }


    public function edit($id) {
        $saleHeader        = Sale_Headers::find($id);
        $item                  = Items::get();
        $vehicle_models        = Vechiles_Model::get();
        $stores                        = Stores::get();

        if (!$saleHeader) {
            return redirect()->route('admin.sale')->with('error', 'sale record not found.');
        }
        $saleDetails       = Sale_Details::where('order_id', $id)->get();
        return view('admin.sale.edit', compact('saleHeader', 'item', 'stores','vehicle_models', 'saleDetails'));
    }

    public function update(Request $request, $id) {
        $validator               = Validator::make($request->all(), []);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $saleHeader      = Sale_Headers::find($id);

            if (!$saleHeader) {
                return redirect()->route('admin.sale')->with('error', 'Sale record not found.');
            }

            $saleHeader['vehicle_id']           = $request->input('vehicle_id');
            $saleHeader['supplier_name']        = $request->input('supplier_name');
            $saleHeader['supplier_contact_no']  = $request->input('supplier_contact_no');
            $saleHeader['total_amount']         = $request->input('grand_total');
            $saleHeader['store_id']             = $request->input('storeName');

            $saleHeader->save();

            // Delete existing purchase details related to this order
            Sale_Details::where('order_id', $id)->delete();

            // Insert updated purchase details
            $numRows                                = $request->input('invoice');
            foreach ($numRows as $key => $value) {
                $detailData = [
                    'order_id'           => $id,
                    'item_id'            => $value['item'],
                    'quantity'           => $value['qty'],
                    'price'              => $value['price'],
                    'total_price'        => $value['qty'] * $value['price'],
                ];
                // Create Purchase_Details records
                Sale_Details::create($detailData);
            }
        }

        return redirect()->route('admin.sale')->with('success', 'sale record updated successfully.');
    }




}
