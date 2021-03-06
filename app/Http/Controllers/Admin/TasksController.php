<?php

namespace App\Http\Controllers\Admin;

use App\House;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTasksRequest;
use App\Http\Requests\Admin\UpdateTasksRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class TasksController extends Controller {

    use FileUploadTrait;

    /**
     * Display a listing of Task.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('task_access'))
        {
            return abort(401);
        }

        $user = Auth::user();

        if ($user->isAdmin())
        {
            $tasks = Task::all();
        }

        if ($user->isLandlord())
        {
            $house = House::where('landlord_id', $user->id)->pluck('id');
            $tasks = Task::whereIn('house_id', $house)->get();
        }

        if ($user->isTenant())
        {
            $house = House::where('tenant_id', $user->id)->pluck('id');
            $tasks = Task::whereIn('house_id', $house)->get();
        }


        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating new Task.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('task_create'))
        {
            return abort(401);
        }
        $houses = \App\House::get()->pluck('city', 'id')->prepend('Please select', '');

        return view('admin.tasks.create', compact('houses'));
    }

    /**
     * Store a newly created Task in storage.
     *
     * @param  \App\Http\Requests\StoreTasksRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTasksRequest $request)
    {
        if (! Gate::allows('task_create'))
        {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $task = Task::create($request->all());


        return redirect()->route('admin.tasks.index');
    }


    /**
     * Show the form for editing Task.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('task_edit'))
        {
            return abort(401);
        }
        $houses = \App\House::get()->pluck('city', 'id')->prepend('Please select', '');

        $task = Task::findOrFail($id);

        return view('admin.tasks.edit', compact('task', 'houses'));
    }

    /**
     * Update Task in storage.
     *
     * @param  \App\Http\Requests\UpdateTasksRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTasksRequest $request, $id)
    {
        if (! Gate::allows('task_edit'))
        {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $task = Task::findOrFail($id);
        $task->update($request->all());


        return redirect()->route('admin.tasks.index');
    }


    /**
     * Display Task.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('task_view'))
        {
            return abort(401);
        }
        $task = Task::findOrFail($id);

        return view('admin.tasks.show', compact('task'));
    }


    /**
     * Remove Task from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('task_delete'))
        {
            return abort(401);
        }
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('admin.tasks.index');
    }

    /**
     * Delete all selected Task at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('task_delete'))
        {
            return abort(401);
        }
        if ($request->input('ids'))
        {
            $entries = Task::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry)
            {
                $entry->delete();
            }
        }
    }

}
