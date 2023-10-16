<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Items;
use App\Models\Roles;
use Illuminate\Support\Facades\Storage;


class RolesController extends Controller
{

//this function use to show data in index
    public function index(){
        $roles = Roles::get();
        return view('admin.roles.index',compact('roles'));

    }

    public function create(){
        return view('admin.roles.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
           'name'  => 'required|string|max:30',
        ]);
       if ($validator->fails()) {
                 return redirect()->back()->withErrors($validator)->withInput();
               } else {
                    // Validation passed, perform other actions
                   $create = Roles::create([
                       'name' => $request->input('name'),

                   ]);
                  // Redirect to a success page or another appropriate action
                  return redirect()->route('admin.role')->with('success', 'role created successfully.');
               }
   }

    public function edit($id)
    {
        // Retrieve the store by ID
        $roles = Roles::find($id);
        // Check if the store was found
        if (!$roles) {
            // Handle the case where the store is not found, for example, display an error message or redirect
            return redirect()->route('admin.roles')->with('error', 'Store not found');
        }
        // Store found, proceed to the edit view
        return view('admin.roles.edit', compact('roles'));
    }
    public function update(Request $request, $id){
        // Find the user by ID
        $roles = Roles::find($id);
            if (!$roles) {
            // Handle the case where the user is not found, for example, display an error message or redirect
                return redirect()->route('admin.role')->with('error', 'item not found');
            }
        // Perform validation for updating user data
        $roles->name = $request->input('name');
        // Update other user fields as needed
        $roles->save();
        // Redirect to the user list or another appropriate action
        return redirect()->route('admin.role')->with('success', 'roles updated successfully');
    }

    public function destroy($id){
        Roles::find($id)->delete();
        return redirect()->route('admin.role')->with('success','role deleted successfully');
        return redirect()->route('admin.role')->with('success','You cannot delete this role');
    }


}


