<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\{User,Guranter,Hierer,Purchase_Details,Stores,Vechiles_Model,Vechiles,Vechicle_Colour,Hierer_cheques,Sale_Details,Purchase_Headers,Items};
use Carbon\Carbon;


class ReportController extends Controller
{

//this function use Data Show in Index Table
public function purchaseIndex() {
    $stores = Stores::with(['purchase_headers', 'purchase_details'])->get();
    // Check if $stores is null, and if so, initialize it as an empty array
    $stores = $stores ?? [];
    return view('admin.report.purchaseView', compact('stores'));
}
    public function salesIndex(){


        return view('admin.report.salesView');
    }

// this function use Data Create function





}
