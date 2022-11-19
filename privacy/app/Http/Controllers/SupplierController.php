<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Company;
use App\Models\MasterLokasi;
use Carbon;
use DB;

use App\Supplier;

class SupplierController extends Controller
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
        
        $create_url = route('supplier.create');

        return view('admin.supplier.index',compact('create_url','nama_lokasi','nama_company','company','period'));

    }

    public function anyData()
    {
        return Datatables::of(Supplier::query())->make(true);
    }

    public function store(Request $request)
    {
        $Supplier = Supplier::create($request->all());
        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Selamat! Data ['.$Supplier->nama_supplier.'] berhasil disimpan.'
        ];
        return response()->json($message);
    }

    public function edit_supplier()
    {
        $kode_supplier = request()->id;
        $data = Supplier::find($kode_supplier);
        $output = array(
            'kode_supplier'=>request()->id,
            'nama_supplier'=>$data->nama_supplier,
            'alamat'=>$data->alamat,
        );
        return response()->json($output);
    }

    public function updateAjax(Request $request)
    {
        Supplier::find($request->kode_supplier)->update($request->all());
       
        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data telah di Update.'
        ];

        return response()->json($message);
    }

    public function hapus_supplier()
    {   
        $supplier = Supplier::find(request()->id);

        $supplier->delete();

        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data ['.$supplier->nama_supplier.'] telah dihapus.'
        ];
        return response()->json($message);
    }
}
