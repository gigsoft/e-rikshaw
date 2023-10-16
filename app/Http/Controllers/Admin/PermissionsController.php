<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Items;
use App\Models\Roles;
use App\Models\Permissions;
use Illuminate\Support\Facades\Storage;


class PermissionsController extends Controller
{

//this function use to show data in index
    public function index(){
        $permission = Permissions::get();
        return view('admin.permissions.index',compact('permission'));

    }

    public function create(){
        return view('admin.permissions.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
           'name'  => 'required|string|max:30',
        ]);
       if ($validator->fails()) {
                 return redirect()->back()->withErrors($validator)->withInput();
               } else {
                    // Validation passed, perform other actions
                   $create = Permissions::create([
                       'name' => $request->input('name'),

                   ]);
                  // Redirect to a success page or another appropriate action
                  return redirect()->route('admin.permissions')->with('success', 'permission created successfully.');
               }
   }

    public function edit($id)
    {
        // Retrieve the store by ID
        $permission = Permissions::find($id);
        // Check if the store was found
        if (!$permission) {
            // Handle the case where the store is not found, for example, display an error message or redirect
            return redirect()->route('admin.permissions')->with('error', 'Store not found');
        }
        // Store found, proceed to the edit view
        return view('admin.permissions.edit', compact('permission'));
    }
    public function update(Request $request, $id){
        // Find the user by ID
        $permission = Permissions::find($id);
            if (!$permission) {
            // Handle the case where the user is not found, for example, display an error message or redirect
                return redirect()->route('admin.permissions')->with('error', 'item not found');
            }
        // Perform validation for updating user data
        $permission->name = $request->input('name');
        // Update other user fields as needed
        $permission->save();
        // Redirect to the user list or another appropriate action
        return redirect()->route('admin.permissions')->with('success', 'permission updated successfully');
    }

    public function destroy($id){
        Permissions::find($id)->delete();
        return redirect()->route('admin.permissions')->with('success','permission deleted successfully');
        return redirect()->route('admin.permissions')->with('success','You cannot delete this permission');
    }


}


