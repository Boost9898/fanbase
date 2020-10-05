<?php

namespace App\Http\Controllers;

use App\Models\MediaItems;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        $items = MediaItems::all();
        $users = User::all();

        return view('admin',
            ['items' => $items],
            ['users' => $users]);
    }

    public function deletePost(request $request)
    {
        $id = $request->get('id');
        MediaItems::where('id', '=', $id)->delete();

        $items = MediaItems::all();
        $users = User::all();

        return view('admin',
            ['items' => $items],
            ['users' => $users]);
    }
}
