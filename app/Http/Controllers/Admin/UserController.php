<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Roles;
use App\Models\Stores;
use App\Models\Permissions;
use App\Models\User_Permissions;


class UserController extends Controller
{

//this function use to show data in index
    public function index(){
        $users = user::with('store','role','permission')->where('email','!=','admin@gmail.com')->get();


        return view('admin.user.index',compact('users'));
    }

// this function use to create data
    public function create(){
        $store          = Stores::get();
        $role           = Roles::get();
        $permission     = Permissions::get();
        $user_permission     = User_Permissions::get();
        return view('admin.user.create',compact('store','role','permission','user_permission'));
     }

// this function use to store data in database
    public function store(Request $request){

        $all=$request->all();

        $validator        = Validator::make($request->all(),[
            'name'        => 'required|string|max:30',
            'email'       => 'required|email|unique:users',
            'password'    => 'required|min:8',
            'storeName'    => 'required',
        ]);
        // }
        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 400);
        } else {
            // Validation passed, perform other actions
            $create            = User::create([
                'name'         => $request->input('name'),
                'email'        => $request->input('email'),
                'password'     => bcrypt($request->input('password')),
                'store_id'    => $request->input('storeName'),
                //'role_id'    => $request->input('role'),
                'type'         =>$request->role,
            ]);
            $permissions=$request->permission;

            foreach ($permissions as $key => $value) {
               $perData['user_id']=$create->id;
               $perData['role_id']=$request->role;
               $perData['permission_id']=$value;
               User_Permissions::create($perData);
            //    echo"<pre>";
            //    print_r($perData);die;
            }
            // Redirect to a success page or another appropriate action
            return redirect()->route('admin.user')->with('success', 'User created successfully.');
        }
    }


// this function use to edit data
public function edit($id) {
    $user = User::find($id);
    $store  = Stores::get();
    $roles = Roles::all();
    $permissions = Permissions::all();
    $userPermissions = $user->permissions->pluck('id')->toArray(); // Get user's current permission IDs
    return view('admin.user.edit', compact('user','store', 'roles', 'permissions', 'userPermissions'));
}
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:30',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8', // Password is optional for update
            'storeName' => 'required',
            'role' => 'required',
            'permission' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Update user information
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'store_id' => $request->input('storeName'),
            'type' => $request->input('role'),
        ]);

        // Update user password if provided
        if ($request->filled('password')) {
            $user->update([
                'password' => bcrypt($request->input('password')),
            ]);
        }
        // Sync permissions with the user
        $user->permissions()->sync($request->input('permission'));

        // Redirect to a success page or another appropriate action
        return redirect()->route('admin.user')->with('success', 'User updated successfully.');
    }


// this function use to delete data in database
    public function destroy($id){
        User::find($id)->delete();
        return redirect()->route('admin.user')->with('success','User deleted successfully');
        return redirect()->route('admin.user') ->with('success','You cannot delete this user');
    }


}


