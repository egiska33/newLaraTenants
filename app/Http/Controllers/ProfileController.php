<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests\Admin\UpdateHousesRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller {

    public function update($id)
    {


        $house = House::findOrFail($id);
        $house->tenant_id = null;
        $house->update();

        return redirect()->route('view.house');

    }
}
