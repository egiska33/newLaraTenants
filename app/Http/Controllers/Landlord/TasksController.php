<?php

namespace App\Http\Controllers\Landlord;

use App\House;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller {

    public function index($id)
    {
        $tasks = Task::where('house_id', $id)->get();
        $house = House::where('id', $id)->first();

        return view('landlord.tasks.index', compact('tasks', 'house'));
    }

    public function all(){
        $user = Auth::user();
        if ($user->isLandlord()){
            $house = House::where('landlord_id', $user->id)->pluck('id');
            $tasks = Task::whereIn('house_id', $house)->get();

            return view('landlord.tasks.all', compact('tasks'));
        }
    }
}
