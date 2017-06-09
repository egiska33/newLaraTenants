<?php

namespace App\Http\Controllers\Landlord;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillsController extends Controller
{
    public function index($id){

        $bills = Bill::whereIn('house_id', $id)->get();

        dd($bills);
    }
}
