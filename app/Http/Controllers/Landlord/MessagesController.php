<?php

namespace App\Http\Controllers\Landlord;

use App\House;
use App\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController extends Controller {

    public function index($id)
    {

        $messages = Message::where('house_id', $id)->get();
        $house = House::where('id', $id)->first();

        return view('landlord.messages.index', compact('messages', 'house'));
    }
}
