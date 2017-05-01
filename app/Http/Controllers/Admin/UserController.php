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

    public function delete($id)
    {
        $my_group = auth()->user()->group;
        $user = User::find($id);
        $group = $user->group;
        if ($my_group === 'root' || $group === 'admin') {
            $user->delete();
        }
        return redirect($_SERVER['HTTP_REFERER']);
    }
}
