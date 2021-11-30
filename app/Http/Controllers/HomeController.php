<?php

namespace App\Http\Controllers;

use App\Imports\SshImport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
use App\Ssh;
use App\Standard;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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
        $users = Profile::with(['users'])
                ->get();
        $ssh = Ssh::with(['standard'])
                ->get();
        // $ssh = Ssh::with(['account'])
        //         ->get();
        //dd($ssh);

        return view('home',[
            'user' => $user,
            'users' => $users,
            'ssh' => $ssh
        ]);
    }

    public function importSsh(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nm_file = $file->hashName();

        $path = $file->storeAs('public/excel/',$nm_file);

        Excel::import(new SshImport(), storage_path('app/public/excel/'.$nm_file));

        Storage::delete($path);

        return redirect()->route('home');
    }
}
