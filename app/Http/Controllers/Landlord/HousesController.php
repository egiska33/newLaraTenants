<?php

namespace App\Http\Controllers\Landlord;

use App\House;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class HousesController extends Controller
{
    public function index()
    {
        $user= Auth::user();
        dd($user);
        $houses = House::where('landlord_id', $user->id)->get();

        return view('landlord.houses.index2', compact( 'houses'));
    }
}
