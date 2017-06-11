<?php

namespace App\Http\Controllers\Landlord;

use App\House;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller {

    public function index($id)
    {
        $tasks = Task::where('house_id', $id)->get();
        $house = House::where('id', $id)->first();

        return view('landlord.tasks.index', compact('tasks', 'house'));
    }
}
