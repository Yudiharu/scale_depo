<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Company;
use App\Models\MasterLokasi;
use Carbon;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        
        $create_url = route('customer.create');

        return view('admin.customer.index',compact('create_url','nama_lokasi','nama_company','company','period'));

    }

    public function anyData()
    {
        return Datatables::of(Customer::query())->make(true);
    }

    public function store(Request $request)
    {
        $Customer = Customer::create($request->all());
        
        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Selamat! Data ['.$Customer->nama_customer.'] berhasil disimpan.'
        ];
        return response()->json($message);
    }

    public function edit_customer()
    {
        $kode_customer = request()->id;
        $data = Customer::find($kode_customer);
        $output = array(
            'kode_customer'=>request()->id,
            'nama_customer'=>$data->nama_customer,
            'no_telepon'=>$data->no_telepon,
        );
        return response()->json($output);
    }

    public function updateAjax(Request $request)
    {
        Customer::find($request->kode_customer)->update($request->all());
       
        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data telah di Update.'
        ];

        return response()->json($message);
    }

    public function hapus_customer()
    {   
        $customer = Customer::find(request()->id);

        $customer->delete();

        $message = [
            'success' => true,
            'title' => 'Update',
            'message' => 'Data ['.$customer->nama_customer.'] telah dihapus.'
        ];
        return response()->json($message);
    }
}
