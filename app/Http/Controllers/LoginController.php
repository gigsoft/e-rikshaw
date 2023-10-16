<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{

    #@---- Login Funtion ---@@#
    public function index(){
        $check=auth()->guard('admin')->check();
        if($check){
            return redirect()->route('admin.dashboard');
        }else{
            return view('admin.login');
        }

    }

    public function authenticate(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'

        ]);

        if ($validator->passes()){

            if(auth()->attempt(array('email' => $request['email'], 'password' => $request['password'])))
            {

                if (auth()->user()->type == 'admin') {
                    return redirect()->route('admin.dashboard');
                }else if (auth()->user()->type == 'manager') {
                    return redirect()->route('manager.dashboard');
                }else if(auth()->user()->type == 'operator') {
                    return redirect()->route('operator.dashboard');
                }else{
                    return redirect()->route('home');
                }

            }else{
                 return redirect()->route('admin.login')->with('error','Either Email/Password is incorrect');
             }
        }else {
            return redirect()->route('admin.login')
            ->withErrors($validator)
            ->withInput($request->only('email'));
        }
    }


}

