<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;


class UserController extends Controller
{

    public function index()
    {
        //
        $users = User::all();
        return view('dashboard.users.index',compact('users'));
    }


    public function create()
    {
        return view('dashboard.users.create');
    }


    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);
        session()->flash('success','user added successfully');
        return redirect()->route('dashboard.users.index');
    }


    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $request_data = $request->except(['permissions']);
        $user->update($request_data);
        $user->syncPermissions($request->permissions);
        session()->flash('success','user updated successfully');
        return redirect()->route('dashboard.users.index');

    }


    public function destroy(User $user)
    {
        //
    }
}
