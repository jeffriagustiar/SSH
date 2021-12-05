<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Ssh;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SshImport;

use Illuminate\Support\Facades\Auth;

class SshController extends Controller
{
    public function index(Request $request)
    {
        if(request()->ajax())
        {
            $ssh = Ssh::leftjoin('components','ssh.ssh_id','=','components.komponen_id')
                ->whereNull('components.komponen_id')
                ->where('ssh.users_id',Auth::user()->id)
                ->get();
            $query = $ssh;

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown" >
                                    Aksi
                                </button>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">
                                        Edit
                                    </a>
                                    <form action="#" method="POST">
                                        '. method_field('delete') . csrf_field() .'
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                })

                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.ssh_table');
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
        
        return redirect()->route('data-ssh');
    }

}
