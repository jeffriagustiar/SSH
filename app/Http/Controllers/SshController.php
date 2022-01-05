<?php

namespace App\Http\Controllers;

use App\Ssh;
use App\User;
use App\Account;
use App\Standard;
use App\Components;
use App\CDetails;
use App\Exports\SshExport;
use App\Imports\SshImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

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

    public function sshSahUser(Request $request)
    {
        if(request()->ajax())
        {
            $ssh = Ssh::leftjoin('components','ssh.ssh_id','=','components.komponen_id')
                ->whereNotNull('components.komponen_id')
                ->where('ssh.users_id',Auth::user()->id)
                ->where('components.status',1)
                ->get();
            $query = $ssh;

            return DataTables::of($query)
                ->addIndexColumn()
                ->make();
        }
            
        return view('pages.ssh_decision_list_sah');
    }

    

    public function sshSahUser2(Request $request)
    {
        if(request()->ajax())
        {
            $ssh = Ssh::leftjoin('components','ssh.ssh_id','=','components.komponen_id')
                ->whereNotNull('components.komponen_id')
                ->where('ssh.users_id',Auth::user()->id)
                ->whereNull('components.status')
                ->get();
            $query = $ssh;

            return DataTables::of($query)
                ->addIndexColumn()
                ->make();
        }
            
        return view('pages.ssh_decision_list_sah');
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
                                    
                                        <a href="'.route('data-ssh-add-d',$item->ssh_id).'" class="btn btn-block btn-success"  >
                                            <i class="fas fa-plus"></i>
                                            Add
                                        </a>
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

    public function sshDA( $id)
    {
        $s = Ssh::where('ssh_id',$id)->firstOrFail();
        $standard = Standard::get();
        $acc = Account::get();

        // dd($s);

        return view('pages.ssh_decision_add',[
            'ssh' => $s,
            'stand' => $standard,
            'acc' => $acc
        ]);
    }

    public function terimaSsh(Request $request)
    {
            $data=$request->except('ssh_id','kode');
            $data2=$request->except('ssh_id','kode','_token');
            $id=$request['ssh_id'];
            $t=Ssh::where('ssh_id',$id)->firstOrFail();
            
            if ($request->r1 == '-' ) {
                unset($data2['r1']);
            }else {
                CDetails::create([
                    'comp_id' => $id,
                    'acc_id' => $data['r1']
                ]);
            }
            if ($request->r2 == '-') {
                unset($data2['r2']);
            }else {
                CDetails::create([
                    'comp_id' => $id,
                    'acc_id' => $data['r2']
                ]);
            }
            if ($request->r3 == '-') {
                unset($data2['r3']);
            }else {
                CDetails::create([
                    'comp_id' => $id,
                    'acc_id' => $data['r3']
                ]);
            }
            if ($request->r4 == '-') {
                unset($data2['r4']);
            }else {
                CDetails::create([
                    'comp_id' => $id,
                    'acc_id' => $data['r4']
                ]);
            }
            if ($request->r5 == '-') {
                unset($data2['r5']);
            }else {
                CDetails::create([
                    'comp_id' => $id,
                    'acc_id' => $data['r5']
                ]);
            }
            if ($request->r6 == '-') {
                unset($data2['r6']);
            }else {
                CDetails::create([
                    'comp_id' => $id,
                    'acc_id' => $data['r6']
                ]);
            }
            if ($request->r7 == '-') {
                unset($data2['r7']);
            }else {
                CDetails::create([
                    'comp_id' => $id,
                    'acc_id' => $data['r7']
                ]);
            }
            if ($request->r8 == '-') {
                unset($data2['r8']);
            }else {
                CDetails::create([
                    'comp_id' => $id,
                    'acc_id' => $data['r8']
                ]);
            }
            if ($request->r9 == '-') {
                unset($data2['r9']);
            }else {
                CDetails::create([
                    'comp_id' => $id,
                    'acc_id' => $data['r9']
                ]);
            }
            if ($request->r10 == '-') {
                unset($data2['r10']);
            }else {
                CDetails::create([
                    'comp_id' => $id,
                    'acc_id' => $data['r10']
                ]);
            }

            Components::create([
                'standar_id' => $request->kode,
                'komponen_id' => $id
            ]);
            
            $t->where('ssh_id',$id)->update($data2);
            // dd($t);

            return redirect()->route('data-keputusan');
    }

    public function listSahSsh(Request $request)
    {
        if(request()->ajax())
        {
            $ssh = Ssh::leftjoin('components','ssh.ssh_id','=','components.komponen_id')
                ->whereNotNull('components.komponen_id')
                ->whereNull('components.status')
                //->where('ssh.users_id',Auth::user()->id)
                ->get();
            $query = $ssh;

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    return '
                        <div class="btn-group">
                                    
                                        <a href="'.route('data-ssh-batal',$item->ssh_id).'" class="btn btn-block btn-danger"  >
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                        </div>
                    ';
                })

                ->rawColumns(['action'])
                ->make();
        }
            
        return view('pages.ssh_decision_list_sah');
    }

    public function sshBatal( $id)
    {
        $item = Components::where('komponen_id',$id);//->get();
        $item2 = CDetails::where('comp_id',$id);//->get();
        $item3 = Ssh::where('ssh_id',$id)->firstOrFail();//->get();
        
        $item->delete();
        $item2->delete();
        $item3->where('ssh_id',$id)->update([
            'r1' => NULL,
            'r2' => NULL,
            'r3' => NULL,
            'r4' => NULL,
            'r5' => NULL,
            'r6' => NULL,
            'r7' => NULL,
            'r8' => NULL,
            'r9' => NULL,
            'r10' => NULL
        ]);
        // dd($item,$item2);

        return redirect()->route('data-ssh-sah');
    }

    public function sshDownload()
    {
        return view('pages.ssh_download');
    }

    public function sshTemplete(Request $request)
    {
        // $com = Components::get();

        // return view('pages.ssh',[
        //     'com' => $com,
        // ]);
        $date1 = $request->date1;
        $date2 = $request->date2;
        
        // $item3 = Ssh::whereBetween('created_at',[$date1,$date2])->get();
        Components::where('komponen_id','LIKE',"%SSH%")
            ->whereBetween('created_at',[$date1,$date2])->update([
                'status' => 1
            ]);
        // dd($date1);
        return Excel::download(new SshExport($date1,$date2),'ssh '.$date1.' sampai '.$date2.'.xlsx');
    }

    public function lookUpStan(Request $request)
	{
		$users = Standard::selectRaw('id, nama_standar AS text')
			->whereRaw('nama_standar LIKE ?', ['%' . $request->q . '%'])
			->orderBy('nama_standar', 'ASC')
			->get();

		$return['results'] = $users;
		
		return $return;
	}

    public function lookUprek(Request $request)
	{
		$users = Account::selectRaw('id, nama_rekening AS text')
			->whereRaw('nama_rekening LIKE ?', ['%' . $request->q . '%'])
			->orderBy('nama_rekening', 'ASC')
			->get();

		$return['results'] = $users;
		
		return $return;
	}

}

