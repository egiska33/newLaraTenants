<?php

namespace App\Http\Controllers\Admin;

use App\House;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller {

    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_access'))
        {
            return abort(401);
        }

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_create'))
        {
            return abort(401);
        }
        if(Auth::user()->isAdmin())
        {
            $roles = \App\Role::get()->pluck('title', 'id')->prepend('Please select', '');

            return view('admin.users.create', compact('roles'));
        }

        if(Auth::user()->isLandlord())
        {
            $house= House::findOrFail(Auth::user()->id);
            return view('landlord.users.create', compact('house'));
        }
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request,$house)
    {
        if (! Gate::allows('user_create'))
        {
            return abort(401);
        }
        if(Auth::user()->isAdmin()){
            $user = User::create($request->all());


            return redirect()->route('admin.users.index');
        }

        if(Auth::user()->isLandlord()){
            dd($house);

            $user = User::create($request->all());
            $house->tenant_id = $user->id;
            $house->update();

            return redirect()->back();
        }

    }


    /**
     * Show the form for editing User.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_edit'))
        {
            return abort(401);
        }
        $roles = \App\Role::get()->pluck('title', 'id')->prepend('Please select', '');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('user_edit'))
        {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->update($request->all());


        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_view'))
        {
            return abort(401);
        }
        $roles = \App\Role::get()->pluck('title', 'id')->prepend('Please select', '');
        $houses = \App\House::where('landlord_id', $id)->get();
        $houses = \App\House::where('tenant_id', $id)->get();
        $messages = \App\Message::where('user_id', $id)->get();
        $messages = \App\Message::where('created_by_id', $id)->get();

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user', 'houses', 'houses', 'messages', 'messages'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_delete'))
        {
            return abort(401);
        }

            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('admin.users.index');

    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_delete'))
        {
            return abort(401);
        }
        if ($request->input('ids'))
        {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry)
            {
                $entry->delete();
            }
        }
    }

}
