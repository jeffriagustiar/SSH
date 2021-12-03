<?php

namespace App\Http\Controllers;

use App\Account;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // $user = User::with(['profile'])
        //                 ->findOrFail(Auth::user()->id);
        // dd($user);
        return view('pages.awal');
    }
}
