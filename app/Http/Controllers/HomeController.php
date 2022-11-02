<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
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
        // dd(1);
        return view('admin-panel.index');

        // return view('home');
    }
    public function profile($id)
    {
        // dd(1);
        $data = User::find($id);
        return view('admin-panel.users.profile', compact('data'));
    }
}
