<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Items;


class ItemController extends Controller
{

//this function use to show data in index
    public function index(){
        $items = Items::get();
        return view('admin.item.index',compact('items'));
    }

// this function use to create data
    public function create(){
        return view('admin.item.create');
    }

// this function use to store data in database
    public function store(Request $request){
         $validator = Validator::make($request->all(),[
            'name'  => 'required|string|max:30',
            'price' => 'required|',

         ]);
        if ($validator->fails()) {
                  return redirect()->back()->withErrors($validator)->withInput();
                } else {
                     // Validation passed, perform other actions
                    $create = Items::create([
                        'name' => $request->input('name'),
                        'price' => $request->input('price'),
                    ]);
                   // Redirect to a success page or another appropriate action
                   return redirect()->route('admin.item')->with('success', 'item created successfully.');
                }
    }

// this function use to edit data
    public function edit($id){
        // Retrieve the user by ID
        $item = Items::find($id);
          if (!$item) {
              // Handle the case where the user is not found, for example, display an error message or redirect
              return redirect()->route('admin.item.index')->with('error', 'item not found');
          }
              return view('admin.item.edit', compact('item'));
    }

// this function use to updata in save database
    public function update(Request $request, $id){
        // Find the user by ID
        $item = Items::find($id);
            if (!$item) {
            // Handle the case where the user is not found, for example, display an error message or redirect
                return redirect()->route('admin.item')->with('error', 'item not found');
            }
        // Perform validation for updating user data
        $item->name = $request->input('name');
        // Update other user fields as needed
        $item->save();
        // Redirect to the user list or another appropriate action
        return redirect()->route('admin.item')->with('success', 'Item updated successfully');
    }

// this function use to delete data in database
    public function destroy($id){
        Items::find($id)->delete();
        return redirect()->route('admin.item')->with('success','Iten deleted successfully');
        return redirect()->route('admin.item')->with('success','You cannot delete this item');
    }


}


