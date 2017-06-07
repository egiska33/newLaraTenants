<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests\Admin\UpdateHousesRequest;
use App\User;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class ProfileController extends Controller {

    public function update($id)
    {


        $house = House::findOrFail($id);
        $house->tenant_id = null;
        $house->update();

        return redirect()->route('view.house');

    }

    public function addTenant(Request $request, $id)
    {
//        dd($id);
        $house = House::findOrFail($id);
        $user = User::create($request->all());

        $house->tenant_id = $user->id;
        $house->update();

        return redirect()->route('view.house');
    }

    public function create($id)
    {

        $house = House::findOrFail($id);

        return view('landlord.users.create', compact('house'));
    }
}
