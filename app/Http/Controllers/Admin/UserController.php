<?php

namespace App\Http\Controllers\Admin;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('must_admin');
    }

    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('admin.users.index', compact('users'));
    }

    public function store()
    {
        $user = new User;
        if (!request()->has('username')) {
            return redirect($_SERVER['HTTP_REFERER']);
        }
        $user->username = request('username');
        $user->name = request('username');
        $user->email = request('username');
        $user->password = '*';
        $user->save();
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function update($id)
    {
        $my_user = auth()->user();
        $user = User::find($id);
        if ($my_user->id == $user->id) {
            return redirect($_SERVER['HTTP_REFERER']);
        }
        if ($my_user->group === 'root' || $user->group != 'root') {
            $user->group = request('group', 'user');
            $user->save();
        }
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id)
    {
        $my_user = auth()->user();
        $user = User::find($id);
        if ($my_user->id == $user->id) {
            return redirect($_SERVER['HTTP_REFERER']);
        }
        if ($my_user->group === 'root' || $user->group != 'root') {
            $user->delete();
        }
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
