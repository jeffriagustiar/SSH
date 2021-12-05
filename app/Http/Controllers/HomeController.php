<?php

namespace App\Http\Controllers;

use App\Imports\SshImport;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Profile;
use App\Ssh;
use App\Standard;
use App\Components;
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
        $ssh = Ssh::leftjoin('components','ssh.id','=','components.komponen_id')
                ->whereNull('components.komponen_id')
                ->get();
        // $ssh = Components::get();
        // $users = Profile::with(['users'])
        //         ->get();
        // $ssh = Ssh::with(['standard'])
        //         ->get();
        // $ssh = Ssh::with(['account'])
        //         ->get();
        //dd($ssh);

        return view('home',[
            'user' => $user,
            'ssh' => $ssh,
            // 'ssh' => $ssh
        ]);
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('pages.profile',[
            'user' => $user
        ]);
    }

    public function profileEdit(Request $request, $id)
    {
        $data = $request->all();

        $item = Profile::findOrFail($id);

        $item->update($data);

        // dd($data);
        // dd($item);
        return redirect()->route('home-profile');
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
