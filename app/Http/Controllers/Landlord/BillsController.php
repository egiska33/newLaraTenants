<?php

namespace App\Http\Controllers\Landlord;

use App\Bill;
use App\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BillsController extends Controller {

    public function index($id)
    {

        $bills = Bill::where('house_id', $id)->get();
        $house = House::where('id', $id)->first();

        return view('landlord.bills.index', compact('bills', 'house'));
    }

    public function all(){
        $user = Auth::user();
        if ($user->isLandlord()){
            $house = House::where('landlord_id', $user->id)->pluck('id');
            $bills = Bill::whereIn('house_id', $house)->get();

            return view('landlord.bills.all', compact('bills'));
        }
    }
}
