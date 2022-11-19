<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\transaksi;
use App\Exports\TransaksiReport;
use App\Barang;
use App\Supplier;
use App\SizeTipeMaster;
use App\Models\Customer;
use PDF;
use Excel;
use DB;
use App\Models\Company;
use App\Models\MasterLokasi;
use Carbon;

class fromTransaksi extends Controller
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

        $create_url = route('transaksis.create');
         
        return view('admin.transaksi.index',compact('create_url','nama_lokasi','nama_company','company','period'));

    }

    public function formTransaksi()
    {
         $list_url= route('transaksis.index');
         $info['title'] = 'Create Transaksi';
         $sizeAll = SizeTipeMaster::pluck('size_type', 'id_size');
         $barangAll = Barang::pluck('nama_barang', 'kode_barang');
         $supplierAll= Supplier::pluck('nama_supplier', 'kode_supplier');
         $customerAll= Customer::pluck('nama_customer', 'kode_customer');
         $companyAll= Company::pluck('nama_company', 'kode_company');
         
 
        return view('admin.transaksi.form', compact('list_url','info','sizeAll','barangAll','supplierAll','customerAll','companyAll'));
    }

    public function formData()
    {

        return Datatables::of(transaksi::with('barang','supplier','customer','company','sizetipemaster'))
           ->editColumn('keterangan', function ($query)
           {
               return str_limit($query->keterangan,10,'...');
           })
           ->addColumn('action', function ($query){
                return '<a href="'.$query->show_url.'" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>'
                .'&nbsp'.
                '<a href="'.$query->edit_url.'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>'
                ;})
            ->make(true);

    }



    public function makePDF(transaksi $transaksi){ 

      $berat1= $transaksi->berat1;
      $berat2= $transaksi->berat2;

      $total= $berat1 - $berat2; 

      $pdf = PDF::loadView('admin.pdf.pdf', compact('transaksi','total'));
      //$pdf->setPaper('a4', 'landscape');
      $pdf->setPaper([0, 0,  283.465,396.85 ], 'portrait');
      return $pdf->stream('transaksi('.$transaksi->no_transaksi.')-'.date('d:m:Y').'.pdf');

    }

    public function laporanPDF(transaksi $transaksi){ 

      $transaksi= transaksi::all();
      $jumlah=count($transaksi);
      $pdf = PDF::loadView('admin.pdf.transaksi', compact('transaksi','jumlah'));
      $pdf->setPaper('a4', 'landscape');
      return $pdf->stream('DataTransaksi-'.date('d:m:Y').'.pdf');

    }
    
    public function laporanExcel()
    {
        return Excel::download(new TransaksiReport, 'DataTransaksis-'.date('d:m:Y').'.xlsx');
    }

    public function laporanPeriode(){

        return view('admin.transaksi.laporan');

    }

    public function CetakLaporan(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $start_date= $data['start_date'];
        $end_date= $data['end_date'];
        $transaksi = transaksi::with('barang','supplier','customer','company','sizetipemaster')
            ->where('tanggal_masuk','>=',$request->start_date)
            ->where('tanggal_masuk','<=',$request->end_date)->get();
        $jumlah=count($transaksi);
        //dd($transaksi);
        $pdf = PDF::loadView('admin.pdf.periodeLaporan', compact('transaksi','jumlah','start_date','end_date'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('transaksi.pdf');
    }
    
    public function crud()
    {
        return view('crud');
    }

    // public function index()
    // {
    //     $posts = Post::latest()->paginate(5);
    //     return response()->json($posts);
    // }
    public function store(Request $request)
    {
        $transaksi = transaksi::create($request->all());
        return response()->json($transaksi);
    }
    public function update(Request $request, $id)
    {
        $transaksi = transaksi::find($id)->update($request->all());
        return response()->json($transaksi);
    }
    public function destroy($id)
    {
        transaksi::find($id)->delete();
        return response()->json(['done']);
    }
}
