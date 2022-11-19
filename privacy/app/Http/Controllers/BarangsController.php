<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Barang;
use App\Models\Company;
use App\Models\MasterLokasi;
use Carbon;
use DB;

class BarangsController extends Controller
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
        $create_url = route('barangs.create');

        return view('admin.barang.index',compact('create_url','nama_lokasi','nama_company','company','period'));
    }

    public function anyData()
    {
        return Datatables::of(Barang::query())->make(true);
    }

    public function store(Request $request)
    {
        $Barang = Barang::create($request->all());
        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Selamat! Data ['.$Barang->nama_barang.'] berhasil disimpan.'
        ];
        return response()->json($message);
    }

    public function edit_barang()
    {
        $kode_barang = request()->id;
        $data = Barang::find($kode_barang);
        $output = array(
            'kode_barang'=>request()->id,
            'nama_barang'=>$data->nama_barang,
            'tipe_barang'=>$data->tipe_barang,
        );
        return response()->json($output);
    }

    public function updateAjax(Request $request)
    {
        Barang::find($request->kode_barang)->update($request->all());
       
        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data telah di Update.'
        ];

        return response()->json($message);
    }

    public function hapus_barang()
    {   
        $barang = Barang::find(request()->id);
        $barang->delete();

        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data ['.$barang->nama_barang.'] telah dihapus.'
        ];
        return response()->json($message);
    }
}
