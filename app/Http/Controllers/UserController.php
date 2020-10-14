<?php

namespace App\Http\Controllers;

use App\Models\MediaItems;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $currentUser = \Auth::id();

        $items = MediaItems::where('id', 'LIKE', '%' . $currentUser . '%')->get();

        $users = User::where('id', 'LIKE', '%' . $currentUser . '%')->get();

        return view('overview',
            ['items' => $items],
            ['users' => $users]);
    }
}
