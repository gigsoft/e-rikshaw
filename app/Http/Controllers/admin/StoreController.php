<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\validator;
use App\Models\User;
use App\Models\Items;
use App\Models\Stores;
use Illuminate\Support\Facades\Storage;


class StoreController extends Controller
{

//this function use to show data in index
    public function index(){
        $stores = Stores::get();
        return view('admin.store.index',compact('stores'));
    }

// this function use to create data
    public function create(){
        return view('admin.store.create');
    }

// this function use to store data in database
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:30',
            'address' => 'required',
            'phone_no' => 'required|string',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming you're uploading images
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Validation passed, perform other actions

            if ($request->hasFile('image')) {

                $profileImage                 = $request->file('image');
                $gprofileImagePath            = $profileImage->store('public/store/image'); // You can specify the storage path
                $gprofileImageName            = basename($gprofileImagePath);

            }

        $data= [
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'phone_no' => $request->input('phone_no'),
                'email' => $request->input('email'),
                'status' => $request->input('status'),
                'image'=>$gprofileImageName,

        ];

            $create = Stores::create($data);

            // Redirect to a success page or another appropriate action
            return redirect()->route('admin.store')->with('success', 'Store created successfully.');
        }
    }

// this function use to edit data
    public function edit($id)
    {
        // Retrieve the store by ID
        $store = Stores::find($id);
        // Check if the store was found
        if (!$store) {
            // Handle the case where the store is not found, for example, display an error message or redirect
            return redirect()->route('admin.store')->with('error', 'Store not found');
        }
        // Store found, proceed to the edit view
        return view('admin.store.edit', compact('store'));
    }


// this function use to updata in save database
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:30',
            'address' => 'required',
            'phone_no' => 'required|string',
            'email' => 'required|email',

        ]);
        if ($validator->fails()) {
        // return redirect()->back()->withErrors($validator)->withInput();
        }
        $store = Stores::find($id);
        if (!$store) {
            return redirect()->route('admin.store')->with('error', 'Store not found.');
        }
        // Update store data
        $store->name = $request->input('name');
        $store->address = $request->input('address');
        $store->phone_no = $request->input('phone_no');
        $store->email = $request->input('email');
        $store->status = $request->input('status');

        if ($request->hasFile('image')) {
            // Delete previous image from storage and database
            $previousImage = $store->image;
            if ($previousImage) {
                // Delete previous image from storage
                Storage::delete('public/store/image/' . $previousImage);
                // Delete previous image from database
                $store->image = null;
                $store->save();
            }
            // Upload new image and update image field
            $profileImage = $request->file('image');
            $gprofileImageName = $profileImage->store('public/store/image'); // You can specify the storage path
            $store->image = basename($gprofileImageName);
        }

        $store->save();

        return redirect()->route('admin.store')->with('success', 'Store updated successfully.');
    }
    
// this function use to delete data in database
    public function destroy($id){
        Stores::find($id)->delete();
        return redirect()->route('admin.store')->with('success','store deleted successfully');
        return redirect()->route('admin.store')->with('success','You cannot delete this store');
    }


}


