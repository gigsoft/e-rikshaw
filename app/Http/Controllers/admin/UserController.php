<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\validator;
use App\Models\User;
use App\Models\Stores;


class UserController extends Controller
{

//this function use to show data in index
    public function index(){
        $users = user::with('store')->where('email','!=','admin@gmail.com')->get();


        return view('admin.user.index',compact('users'));
    }

// this function use to create data
    public function create(){
        $store     = Stores::get();
        return view('admin.user.create',compact('store'));
     }

// this function use to store data in database
    public function store(Request $request){
        $validator        = Validator::make($request->all(),[
            'name'        => 'required|string|max:30',
            'email'       => 'required|email|unique:users',
            'password'    => 'required|min:8',
            'storeName'    => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // Validation passed, perform other actions
            $create            = User::create([
                'name'         => $request->input('name'),
                'email'        => $request->input('email'),
                'password'     => bcrypt($request->input('password')),
                'store_id'    => $request->input('storeName'),
                'role'         => '1',
            ]);
            // Redirect to a success page or another appropriate action
            return redirect()->route('admin.user')->with('success', 'User created successfully.');
        }
    }

// this function use to edit data
    public function edit($id){
        // Retrieve the user by ID
        $store     = Stores::get();
        $user = User::with('store')->find($id);
        if (!$user) {
            // Handle the case where the user is not found, for example, display an error message or redirect
            return redirect()->route('admin.user.index')->with('error', 'User not found');
        }
        return view('admin.user.edit', compact('user','store'));
    }


// this function use to updata in save database
    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::find($id);
         if (!$user) {
        // Handle the case where the user is not found, for example, display an error message or redirect
         return redirect()->route('admin.user')->with('error', 'User not found');
         }
        // Perform validation for updating user data
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->store_id = $request->input('storeName');
        // Update other user fields as needed
        $user->save();
        // Redirect to the user list or another appropriate action
        return redirect()->route('admin.user')->with('success', 'User updated successfully');
    }

// this function use to delete data in database
    public function destroy($id){
        User::find($id)->delete();
        return redirect()->route('admin.user')->with('success','User deleted successfully');
        return redirect()->route('admin.user') ->with('success','You cannot delete this user');
    }


}


