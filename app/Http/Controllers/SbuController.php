<?php

namespace App\Http\Controllers;

use App\Ssh;
use App\Sbu;
use App\User;
use App\Account;
use App\Standard;
use App\Components;
use App\CDetails;
use App\Exports\SbuExport;
use App\Imports\SbuImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SbuController extends Controller
{
    public function index(Request $request)
    {
        if(request()->ajax())
        {
            $sbu = Sbu::leftjoin('components','sbu.sbu_id','=','components.komponen_id')
                ->whereNull('components.komponen_id')
                ->where('sbu.users_id',Auth::user()->id)
                ->get();
            $query = $sbu;

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    return '
                        <div class="btn-group">
                                    <form action="'. route('sbu-delete',$item->sbu_id) .'" method="POST">
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

        return view('pages.sbu.sbu_table');
    }

    public function sbuSahUser(Request $request)
    {
        if(request()->ajax())
        {
            $sbu = Sbu::leftjoin('components','sbu.sbu_id','=','components.komponen_id')
                ->whereNotNull('components.komponen_id')
                ->where('sbu.users_id',Auth::user()->id)
                ->where('components.status',1)
                ->get();
            $query = $sbu;

            return DataTables::of($query)
                ->addIndexColumn()
                ->make();
        }
            
        return view('pages.sbu.sbu_decision_list_sah');
    }

    public function importSbu(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nm_file = $file->hashName();

        $path = $file->storeAs('public/excel/',$nm_file);

        Excel::import(new SbuImport(), storage_path('app/public/excel/'.$nm_file));

        Storage::delete($path);
        
        return redirect()->route('data-sbu');
    }

    public function destroy($id)
    {
        $item = Sbu::where('sbu_id',$id);
        $item->delete();

        return redirect()->route('data-sbu');
    }

    public function decision(Request $request)
    {
        $standard = Standard::get();

        if(request()->ajax())
        {
            $sbu = Sbu::leftjoin('components','sbu.sbu_id','=','components.komponen_id')
                ->whereNull('components.komponen_id')
                //->where('ssh.users_id',Auth::user()->id)
                ->get();
            $query = $sbu;

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    return '
                        <div class="btn-group">
                                    
                                        <a href="'.route('data-sbu-add-d',$item->sbu_id).'" class="btn btn-block btn-success"  >
                                            <i class="fas fa-plus"></i>
                                            Add
                                        </a>
                        </div>
                    ';
                })

                ->rawColumns(['action'])
                ->make();
        }
            
        return view('pages.sbu.sbu_decision',[
            'stand' => $standard
        ]);
    }

    public function sbuDA( $id)
    {
        $s = Sbu::where('sbu_id',$id)->firstOrFail();
        $standard = Standard::get();
        $acc = Account::get();

        // dd($s);

        return view('pages.sbu.sbu_decision_add',[
            'sbu' => $s,
            'stand' => $standard,
            'acc' => $acc
        ]);
    }

    public function terimaSbu(Request $request)
    {
            $data=$request->except('sbu_id','kode');
            $data2=$request->except('sbu_id','kode','_token');
            $id=$request['sbu_id'];
            $t=Sbu::where('sbu_id',$id)->firstOrFail();
            
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
            
            $t->where('sbu_id',$id)->update($data2);
            // dd($t);

            return redirect()->route('data-keputusan-sbu');
    }

    public function listSahSbu(Request $request)
    {
        if(request()->ajax())
        {
            $sbu = Sbu::leftjoin('components','sbu.sbu_id','=','components.komponen_id')
                ->whereNotNull('components.komponen_id')
                //->where('ssh.users_id',Auth::user()->id)
                ->get();
            $query = $sbu;

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    return '
                        <div class="btn-group">
                                    
                                        <a href="'.route('data-sbu-batal',$item->sbu_id).'" class="btn btn-block btn-danger"  >
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>
                        </div>
                    ';
                })

                ->rawColumns(['action'])
                ->make();
        }
            
        return view('pages.sbu.sbu_decision_list_sah');
    }

    public function sbuBatal( $id)
    {
        $item = Components::where('komponen_id',$id);//->get();
        $item2 = CDetails::where('comp_id',$id);//->get();
        $item3 = Sbu::where('sbu_id',$id)->firstOrFail();//->get();
        
        $item->delete();
        $item2->delete();
        $item3->where('sbu_id',$id)->update([
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

        return redirect()->route('data-sbu-sah');
    }

    public function sbuDownload()
    {
        return view('pages.sbu.sbu_download');
    }

    public function sbuTemplete(Request $request)
    {
        // $com = Components::get();

        // return view('pages.ssh',[
        //     'com' => $com,
        // ]);
        $date1 = $request->date1;
        $date2 = $request->date2;
        
        // $item3 = Ssh::whereBetween('created_at',[$date1,$date2])->get();
        Components::where('komponen_id','LIKE',"%SBU%")
            ->whereBetween('created_at',[$date1,$date2])->update([
                'status' => 1
            ]);
        // dd($date1);
        return Excel::download(new SbuExport($date1,$date2),'sbu '.$date1.' sampai '.$date2.'.xlsx');
    }

}

