<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Ssh;
use App\Standard;
use App\Components;
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
                                    <form action="'. route('ssh-delete',$item->ssh_id) .'" method="POST">
                                        '. method_field('delete') . csrf_field() .'
                                        <button type="submit" class="btn btn-block btn-danger">
                                            Delete
                                        </button>
                                    </form>
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

    public function destroy($id)
    {
        $item = Ssh::where('ssh_id',$id);
        $item->delete();

        return redirect()->route('data-ssh');
    }

    public function decision(Request $request)
    {
        $standard = Standard::get();

        if(request()->ajax())
        {
            $ssh = Ssh::leftjoin('components','ssh.ssh_id','=','components.komponen_id')
                ->whereNull('components.komponen_id')
                //->where('ssh.users_id',Auth::user()->id)
                ->get();
            $query = $ssh;

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    return '
                        <div class="btn-group">
                                    <form action="'. route('ssh-delete',$item->ssh_id) .'" method="POST">
                                        '. method_field('delete') . csrf_field() .'
                                        <a href="#" class="btn btn-block btn-success btn-add"  
                                            data-toggle="modal" data-target="#modal-add" >
                                            <i class="fas fa-plus"></i>
                                            Save
                                        </a>
                                        <button type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#modal-default" data-id="">
                                            <i class="fas fa-paper-plane"></i>
                                            Kirim Pesan
                                        </button>
                                    </form>
                        </div>
                    ';
                })

                ->rawColumns(['action'])
                ->make();
        }
            
        return view('pages.ssh_decision',[
            'stand' => $standard
        ]);
    }

    public function terimaSsh(Request $request,$id)
    {
        $a=Components::create([
            'standar_id' => $request['standard'],
            'komponen_id' => $id
        ]);

        return redirect()->route('data-keputusan');
    }

}
