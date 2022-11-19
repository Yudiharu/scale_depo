<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\SizeTipeMaster;
use App\Models\Company;
use App\Models\MasterLokasi;
use Carbon;
use DB;

class SizeTipeMasterController extends Controller
{
    //
    public function index()
    {
        $lokasi = auth()->user()->kode_lokasi;
        $company = auth()->user()->kode_company;

        $dt = Carbon\Carbon::now();
        $period = Carbon\Carbon::parse($dt)->format('F Y');

        $get_lokasi = MasterLokasi::where('kode_lokasi',auth()->user()->kode_lokasi)->first();
        $nama_lokasi = $get_lokasi->nama_lokasi;
        
        $get_company = Company::where('kode_company',auth()->user()->kode_company)->first();
        $nama_company = $get_company->nama_company;
        $create_url = route('sizetipemaster.create');

        return view('admin.sizetipemaster.index',compact('create_url','nama_lokasi','nama_company','company','period'));

    }

    public function anyData()
    {
        return Datatables::of(SizeTipeMaster::query())
           ->addColumn('action', function ($query){
                return '<a href="'.$query->edit_url.'" class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i></a>'.'&nbsp'.
                    '<a href="javascript:;" onclick="del(\''.$query->id.'\',\''.$query->destroy_url.'\')" id="hapus" class="btn btn-danger btn-xs"> <i class="fa fa-times-circle"></i></a>'.'&nbsp';
                           })
            ->make(true);

    }

    public function store(Request $request)
    {
        $Size = SizeTipeMaster::create($request->all());
        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Selamat! Data ['.$Size->deskripsi.'] berhasil disimpan.'
        ];
        return response()->json($message);
    }

    public function edit_size()
    {
        $kode_size = request()->id;
        $data = SizeTipeMaster::find($kode_size);
        $output = array(
            'kode_size'=>request()->id,
            'deskripsi'=>$data->deskripsi,
        );
        return response()->json($output);
    }

    public function updateAjax(Request $request)
    {
        SizeTipeMaster::find($request->kode_size)->update($request->all());
       
        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data telah di Update.'
        ];

        return response()->json($message);
    }

    public function hapus_size()
    {   
        $size = SizeTipeMaster::find(request()->id);

        $size->delete();

        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data ['.$size->deskripsi.'] telah dihapus.'
        ];
        return response()->json($message);
    }
}
