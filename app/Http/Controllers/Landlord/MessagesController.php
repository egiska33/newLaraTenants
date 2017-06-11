<?php

namespace App\Http\Controllers\Landlord;

use App\House;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller {

    public function index($id)
    {

        $messages = Message::where('house_id', $id)->get();
        $house = House::where('id', $id)->first();

        return view('landlord.messages.index', compact('messages', 'house'));
    }

    public function all(){
        $user = Auth::user();
        if ($user->isLandlord()){
            $house = House::where('landlord_id', $user->id)->pluck('id');
            $messages = Message::whereIn('house_id', $house)->get();

            return view('landlord.messages.all', compact('messages'));
        }
    }
}
