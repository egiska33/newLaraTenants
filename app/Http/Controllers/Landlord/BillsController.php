<?php

namespace App\Http\Controllers\Landlord;

use App\Bill;
use App\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillsController extends Controller
{
    public function index($id){

        $bills = Bill::where('house_id', $id)->get();
        $house = House::where('id', $id)->first();
//            dd($house);
        return view('landlord.bills.index', compact('bills', 'house'));
    }
}
