<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin())
        {
            return view('home');
        }

        if ($user->isLandlord())
        {
            $houses = House::where('landlord_id', $user->id)->get();

            return view('landlord.houses.index', compact('houses'));
        }

        if ($user->isTenant())
        {
            $house = House::where('tenant_id', $user->id)->first();
            $users = User::Where('id', $house->landlord_id)->get();

            return view('landlord.houses.show', compact('house', 'users'));
        }
    }
}
