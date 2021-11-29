<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
use App\Ssh;

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
        $user = User::with(['profile'])
                ->findOrFail(Auth::user()->id);
        $users = Profile::with('users')
                ->get();
        $ssh = Ssh::with(['account'])
                ->get();
        //dd($user);
        return view('home',[
            'user' => $user,
            'users' => $users,
            'ssh' => $ssh
        ]);
    }
}
