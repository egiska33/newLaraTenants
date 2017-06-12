<?php

namespace App\Http\Controllers\Landlord;

use App\House;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TenantsController extends Controller {

    public function all()
    {
        $user = Auth::user();
        if ($user->isLandlord())
        {
            $houses = House::where('landlord_id', $user->id)->pluck('tenant_id','id');
            $tenants = User::whereIn('id', $houses)->get();
            return view('landlord.tenants.all', compact('tenants'));
        }
    }
}
