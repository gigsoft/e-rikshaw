<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\{User,Guranter,Hierer,Vechile_Batterys,Vechiles_Model,Vechiles,Vechicle_Colour,Hierer_cheques,Purchase_Details};


class VehicleController extends Controller
{

     public function vehiclesIndex(){
        $vehicles                     = Vechiles::with(['hierers','guaranters','batteries'])->get();

         foreach($vehicles as $vehicle){
            $vehicle->model_name        = Vechiles_Model::where('id',$vehicle->model_id)->first()->name;
         }
        return view('admin.vehicles.index',compact('vehicles'));
     }
     public function vehiclesCreateNew(){
        $vehicle_models     = Vechiles_Model::get();
        $vechicle_colour    = Vechicle_Colour::get();
         return view('admin.vehicles.createNew',compact('vehicle_models','vechicle_colour'));
     }
     public function vehiclesStore(Request $request){
         $validator     =   Validator::make($request->all(), []);
         $cheques                         =$request->file('cheques');

                  if ($validator->fails()) {
            $errors     =   $validator->errors();

         } else {
             $data['date']                        =$request->input('date');
             $data['model_id']                    =$request->input('model');
             $data['color']                       =$request->input('colour');
             $data['sales_price']                 =$request->input('sales_price');
             $data['cash_finance']                =$request->input('cashFinance');
             $data['bill_price']                  =$request->input('bill_price');
             $data['engine_no']                   =$request->input('engine_no');
             $data['chassie_print']               =$request->input('chassie_print');
             $data['down_payment']                =$request->input('down_payment');
             $data['financed_by']                 =$request->input('financed_by');
             $data['insurance_amount_date']       =$request->input('insurance_amount_date');
             $data['emi_amount']                  =$request->input('emi_amount');
             $data['udhar']                       =$request->input('udhar');
             $data['rc_status']                   =$request->input('rc_status');
             $data['pending_payment']             =$request->input('pending_payment');
             $data['advance_payment']             =$request->input('advance_payment');
             $create                              =Vechiles::create($data);
             $batteryData['vehicle_id']           = $create->id;
             $batteryData['battery_1']            = $request->input('battery1');
             $batteryData['battery_2']            = $request->input('battery2');
             $batteryData['battery_3']            = $request->input('battery3');
             $batteryData['battery_4']            = $request->input('battery4');
             $batteryData['battery_5']            = $request->input('battery5');
             Vechile_Batterys::create($batteryData);
                $guaranterData['vehicle_id']      = $create->id;
                $guaranterData['name']            = $request->input('gurenter_name');
                $guaranterData['contact_1']       = $request->input('gphon_no_1');
                $guaranterData['contact_2']       = $request->input('gphon_no_2');
                $guaranterData['contact_3']       = $request->input('gphon_no_3');
                // Handle file uploads for profile_image, adhar_card, and pan_card
                if ($request->hasFile('gprofile_image')) {
                    $profileImage                 = $request->file('gprofile_image');
                    $gprofileImagePath            = $profileImage->store('public/guaranter/profile_image'); // You can specify the storage path
                    $gprofileImageName            = basename($gprofileImagePath);
                    $guaranterData['profile_image'] = $gprofileImageName;
                }
                if ($request->hasFile('gadhar_card')) {
                    $adharCard                    = $request->file('gadhar_card');
                    $gadharCardPath               = $adharCard->store('public/guaranter/adhar_card'); // You can specify the storage path
                    $gadharCardImageName          = basename($gadharCardPath);
                    $guaranterData['adhar_card']  = $gadharCardImageName;
                }
                if ($request->hasFile('gpan_card')) {
                    $panCard                      = $request->file('gpan_card');
                    $panCardPath                  = $panCard->store('public/guaranter/pan_card'); // You can specify the storage path
                    $gPanCardImageName            = basename($panCardPath);
                    $guaranterData['pan_card']    = $gPanCardImageName;
                }
                    Guranter::create($guaranterData);
                    $hirerData['vehicle_id']      = $create->id;
                    $hirerData['name']            = $request->input('hierer_name');
                    $hirerData['contact_1']       = $request->input('hphon_no_1');
                    $hirerData['contact_2']       = $request->input('hphon_no_2');
                    $hirerData['contact_3']       = $request->input('hphon_no_3');
            if ($request->hasFile('profile_image')) {
                    $profileImage                     = $request->file('profile_image');
                    $profileImagePath                 = $profileImage->store('public/hierer/profile_image'); // You can specify the storage path
                    $profileImageName                 = basename($profileImagePath);
                    $hirerData['profile_image']       = $profileImageName;
                }
            if ($request->hasFile('adhar_card')) {
                    $adharCard                        = $request->file('adhar_card');
                    $adharCardPath                    = $adharCard->store('public/hierer/adhar_card'); // You can specify the storage path
                    $adharCardImageName               = basename($adharCardPath);
                    $hirerData['adhar_card']          = $adharCardImageName;
            }
            if ($request->hasFile('pan_card')) {
                    $panCard                         = $request->file('pan_card');
                    $panCardPath                     = $panCard->store('public/hierer/pan_card'); // You can specify the storage path
                    $panCardImageName                = basename($panCardPath);
                    $hirerData['pan_card']           = $panCardImageName;
            }
            if ($request->hasFile('electricty_bill')) {
                    $electrictyBill                  = $request->file('electricty_bill');
                    $electrictyBillPath              = $electrictyBill->store('public/hierer/electricty_bill'); // You can specify the storage path
                    $electrictyBillImageName         = basename($electrictyBillPath);
                    $hirerData['electricty_bill']    = $electrictyBillImageName;
            }
            if ($request->hasFile('bank_copy')) {
                    $bankCopy                        = $request->file('bank_copy');
                    $bankCopyPath                    = $bankCopy->store('public/hierer/bank_copy'); // You can specify the storage path
                    $bankCopyImageName               = basename($bankCopyPath);
                    $hirerData['bank_copy']          = $bankCopyImageName;
            }
                    $heirer                          =Hierer::create($hirerData);
                    $cheques                         =$request->file('cheques');
                    if (!empty($cheques)) {
                        foreach ($cheques as $cheque) {
                                $imageName           = time() . '_' . uniqid() . '.' . $cheque->getClientOriginalExtension();
                                $chequePath          = $cheque->store('public/hierer/cheques');
                                $chequeImageName     = basename($chequePath);
                                $chequeData['hierer_id'] = $heirer->id;
                                $chequeData['image']  = $chequeImageName;
                                Hierer_cheques::create($chequeData);
                        }
                    }
             return redirect()->route('admin.vehicle.index')->with('success', 'Vehicle created successfully.');
         }
     }
     public function getVehicleData(Request $request){
        $selectedValue           = $request->input('selectedValue'); // Get the selected value from the request
        $vehicle                 =   Vechiles::with(['hierers','guaranters','batteries'])->where('model_id',$selectedValue)->first();
        if($vehicle){
            $data                =array('data'=>$vehicle,'status'=>1);
        }else{
            $data                =array('data'=>"",'status'=>0);
        }
        return response()->json($data);
     }
     public function vehiclesNewEdit($id){
         // Retrieve the user by ID
         $vehicle_models        =   Vechiles_Model::get();
         $vechicle_colour       =   Vechicle_Colour::get();
         $vehicle               =   Vechiles::with(['hierers','guaranters','batteries'])->where('id',$id)->first();

         return view('admin.vehicles.editNew', compact('vehicle','vehicle_models','vechicle_colour'));
     }
     public function vehiclesUpdate(Request $request, $id){
            // Find the user by ID
            $vehicles                               = Vechiles_Model::find($id);
            $data['name']                           =$request->input('name');
            $data['date']                           =$request->input('date');
            $data['model_id']                       =$request->input('model');
            $data['color']                          =$request->input('colour');
            $data['sales_price']                    =$request->input('sales_price');
            $data['bill_price']                     =$request->input('bill_price');
            $data['engine_no']                      =$request->input('engine_no');
            $data['chassie_print']                  =$request->input('chassie_print');
            $data['down_payment']                   =$request->input('down_payment');
            $data['financed_by']                    =$request->input('financed_by');
            $data['insurance_amount_date']          =$request->input('insurance_amount_date');
            $data['emi_amount']                     =$request->input('emi_amount');
            $data['udhar']                          =$request->input('udhar');
            $data['rc_status']                      =$request->input('rc_status');
            $data['pending_payment']                =$request->input('pending_payment');
            $data['advance_payment']                =$request->input('advance_payment');
            $data['cash_finance']                 =$request->input('cashFinance');
            Vechiles::where('id', $id)->update($data);

            // update data for battery
            $batteryData['battery_1']               = $request->input('battery1');
            $batteryData['battery_2']               = $request->input('battery2');
            $batteryData['battery_3']               = $request->input('battery3');
            $batteryData['battery_4']               = $request->input('battery4');
            $batteryData['battery_5']               = $request->input('battery5');
            Vechile_Batterys::where('vehicle_id', $id)->update($batteryData);

            // update data for guranter
            $guaranterData['name']                  = $request->input('gurenter_name');
            $guaranterData['contact_1']             = $request->input('gphon_no_1');
            $guaranterData['contact_2']             = $request->input('gphon_no_2');
            $guaranterData['contact_3']             = $request->input('gphon_no_3');
            $existingGuarantor = Guranter::where('vehicle_id', $id)->first();
            // Handle file uploads for profile_image, adhar_card, and pan_card
        if ($request->hasFile('gprofile_image')) {
            $profileImage                           = $request->file('gprofile_image');
            $gprofileImagePath                      = $profileImage->store('public/guaranter/profile_image'); // You can specify the storage path
            $gprofileImageName                      = basename($gprofileImagePath);
            $guaranterData['profile_image']         = $gprofileImageName;
            $oldImageName = $existingGuarantor->profile_image ?? null;
            if ($oldImageName) {
                Storage::delete('public/guaranter/profile_image/' . $oldImageName);
             }
        }
        if ($request->hasFile('gadhar_card')) {
            $adharCard                               = $request->file('gadhar_card');
            $gadharCardPath                          = $adharCard->store('public/guaranter/adhar_card'); // You can specify the storage path
            $gadharCardImageName                     = basename($gadharCardPath);
            $guaranterData['adhar_card']             = $gadharCardImageName;
            $oldImageName = $existingGuarantor->adhar_card ?? null;
            if ($oldImageName) {
                Storage::delete('public/guaranter/adhar_card/' . $oldImageName);
            }
        }
        if ($request->hasFile('gpan_card')) {
            $panCard                                 = $request->file('gpan_card');
            $panCardPath                             = $panCard->store('public/guaranter/pan_card'); // You can specify the storage path
            $gPanCardImageName                       = basename($panCardPath);
            $guaranterData['pan_card']               = $gPanCardImageName;
            $oldImageName = $existingGuarantor->pan_card ?? null;
            if ($oldImageName) {
                Storage::delete('public/guaranter/pan_card/' . $oldImageName);
            }
        }
            Guranter::where('vehicle_id', $id)->update($guaranterData);
            $existingHierer = Hierer::where('vehicle_id', $id)->first();
                $hirerData['name']                  = $request->input('hierer_name');
                $hirerData['contact_1']             = $request->input('hphon_no_1');
                $hirerData['contact_2']             = $request->input('hphon_no_2');
                $hirerData['contact_3']             = $request->input('hphon_no_3');
        if ($request->hasFile('profile_image')) {
                $profileImage                        = $request->file('profile_image');
                $profileImagePath                    = $profileImage->store('public/hierer/profile_image'); // You can specify the storage path
                $profileImageName                    = basename($profileImagePath);
                $hirerData['profile_image']          = $profileImageName;
                $oldImageName = $existingHierer->profile_image ?? null;
            if ($oldImageName) {
                Storage::delete('public/hierer/profile_image/' . $oldImageName);
            }
        }

        if ($request->hasFile('adhar_card')) {
                $adharCard                           = $request->file('adhar_card');
                $adharCardPath                       = $adharCard->store('public/hierer/adhar_card'); // You can specify the storage path
                $adharCardImageName                  = basename($adharCardPath);
                //$hirerData['adhar_card']             = $adharCardImageName;
                $hirerData['adhar_card']          = $profileImageName;
                $oldImageName = $existingHierer->adhar_card ?? null;
            if ($oldImageName) {
                Storage::delete('public/hierer/adhar_card/' . $oldImageName);
            }
        }
        if ($request->hasFile('pan_card')) {
                $panCard                             = $request->file('pan_card');
                $panCardPath                         = $panCard->store('public/hierer/pan_card'); // You can specify the storage path
                $panCardImageName                    = basename($panCardPath);
                //$hirerData['pan_card']               = $panCardImageName;
                $hirerData['pan_card']          = $profileImageName;
                $oldImageName = $existingHierer->pan_card ?? null;
            if ($oldImageName) {
                Storage::delete('public/hierer/pan_card/' . $oldImageName);
            }
        }
        if ($request->hasFile('electricty_bill')) {
                $electrictyBill                      = $request->file('electricty_bill');
                $electrictyBillPath                  = $electrictyBill->store('public/hierer/electricty_bill'); // You can specify the storage path
                $electrictyBillImageName             = basename($electrictyBillPath);
               // $hirerData['electricty_bill']        = $electrictyBillImageName;
                $hirerData['electricty_bill']          = $profileImageName;
                $oldImageName = $existingHierer->electricty_bill ?? null;
            if ($oldImageName) {
                Storage::delete('public/hierer/electricty_bill/' . $oldImageName);
            }
        }
       if ($request->hasFile('bank_copy')) {
                $bankCopy                            = $request->file('bank_copy');
                $bankCopyPath                        = $bankCopy->store('public/hierer/bank_copy'); // You can specify the storage path
                $bankCopyImageName                   = basename($bankCopyPath);
               // $hirerData['bank_copy']              = $bankCopyImageName;
                $hirerData['bank_copy']          = $profileImageName;
                $oldImageName = $existingHierer->bank_copy ?? null;
            if ($oldImageName) {
                Storage::delete('public/hierer/bank_copy/' . $oldImageName);
            }
        }
            Hierer::where('vehicle_id', $id)->update($hirerData);
            return redirect()->route('admin.vehicle.index')->with('success', 'Vehicle updated successfully');

            $existingGuranter = Guranter::where('vehicle_id', $id)->first();

     }
     public function vehiclesView(Request $request,$id){
          $vehicles                =Vechiles::find($id);
          if($vehicles){
            $vehicle               =Vechiles::with(['hierers','guaranters','batteries'])->where('id',$id)->first();
            $vehicle->model_name   =Vechiles_Model::where('id',$vehicle->model_id)->first()->name;
            return view('admin.vehicles.view',compact('vehicle'));
          }else{
            abort(404, "vehicles not found");
          }
    }

    //vehicle function
    public function vehicleModalList(){

        $vehicle_models    = Vechiles_Model::get();
       return view('admin.vehicle_model.index',compact('vehicle_models'));
   }

   public function vehicleModalCreate(){
    return view('admin.vehicle_model.create');
 }

 public function vehicleModalStore(Request $request)
    {
        $validator        = Validator::make($request->all(),[
            'name'        => 'required|string|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Validation passed, perform other actions
            $create       = Vechiles_Model::create([
                'name'    => $request->input('name'),
            ]);
            // Redirect to a success page or another appropriate action
            return redirect()->route('admin.vehicle.models')->with('success', 'User created successfully.');
        }

    }


    public function vehicleModalEdit($id)
    {
        // Retrieve the user by ID
        $vehicles = Vechiles_Model::find($id);

        if (!$vehicles) {
            // Handle the case where the user is not found, for example, display an error message or redirect
            return redirect()->route('admin.vehicle.models')->with('error', 'User not found');
        }

        return view('admin.vehicle_model.edit', compact('vehicles'));
    }
    public function vehicleModalUpdate(Request $request, $id)
    {

        // Find the user by ID
        $vehicles = Vechiles_Model::find($id);

        if (!$vehicles) {
            // Handle the case where the user is not found, for example, display an error message or redirect
            return redirect()->route('admin.vehicle.models')->with('error', 'User not found');
        }

        // Perform validation for updating user data

        $vehicles->name = $request->input('name');

        // Update other user fields as needed

        $vehicles->save();

        // Redirect to the user list or another appropriate action
        return redirect()->route('admin.vehicle.models')->with('success', 'User updated successfully');
    }

}


