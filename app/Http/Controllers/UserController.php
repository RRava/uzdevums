<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index()
    {

        $count = User::count();

        return view('users.index', compact('count'));
    }


    public function show(request $request)
    {

        $count = User::count();

        $selected = 0;

        $asked = $request->count;

        if($asked > 0 && $asked <= $count)
        {
            $selected = $asked;
        }

        $users = User::take($selected)->get();

        return view('users.show', compact('users'));

    }



    public function store(request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->age = $request->age;
        $user->email = $request->email;

        $user->save();

        return User::count();

    }

    public function delete(request $request)
    {
        User::destroy($request->id);

        return;

    }

    public function update(request $request)
    {
        $user = User::find($request->id);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->age = $request->age;
        $user->email = $request->email;

        $user->save();

        return;

    }

    public function edit(request $request)
    {
        $user = User::find($request->id);

        return $user;

    }
}
