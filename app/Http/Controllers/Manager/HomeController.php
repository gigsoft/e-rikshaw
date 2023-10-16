<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User,Stores,Vechiles};


class HomeController extends Controller
{
    public function index(){
      $data['userCount']=User::where('id','!=',1)->count();
      $data['storeCount']=Stores::count();
      $data['vehicleCount']=Vechiles::count();
      return view('manager.dashboard.dashboard',compact('data'));
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
