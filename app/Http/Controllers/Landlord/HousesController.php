<?php

namespace App\Http\Controllers\Landlord;

use App\House;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class HousesController extends Controller
{
    public function show($id)
    {
        $users = User::where('id',$id)->get();
        $house = House::where('tenant_id', $id)->first();
//        dd($users);
        return view('landlord.houses.show', compact('house', 'users'));
    }
}
