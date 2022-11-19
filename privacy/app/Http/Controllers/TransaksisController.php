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

class TransaksisController extends Controller
{
    //

    //$model = App\User::with('posts');

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
         $sizeAll = SizeTipeMaster::pluck('kode_size', 'deskripsi');
         $barangAll = Barang::pluck('nama_barang', 'kode_barang');
         $supplierAll= Supplier::pluck('nama_supplier', 'kode_supplier');
         $customerAll= Customer::pluck('nama_customer', 'kode_customer');
         $companyAll= Company::pluck('nama_company', 'kode_company');
         
        return view('admin.transaksi.form', compact('list_url','info','sizeAll','barangAll','supplierAll','customerAll','companyAll'));
    }

    public function anyData()
    {

        return Datatables::of(transaksi::with('barang','supplier','customer','company','sizetipemaster'))
           ->editColumn('keterangan', function ($query)
           {
               return str_limit($query->keterangan,10,'...');
           })
           ->addColumn('action', function ($query){
                return '<a href="'.$query->show_url.'" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>'
                .'&nbsp'.
                '<a href="'.$query->edit_url.'" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>'
                .'&nbsp'.
                '<a href="javascript:;" onclick="del(\''.$query->id.'\',\''.$query->destroy_url.'\')" id="hapus" class="btn btn-danger btn-xs"><i class="fa fa-times-circle"></i></a>';
                           })
            ->make(true);

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
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $list_url= route('transaksis.index');
         $info['title'] = 'Create Transaksi';
         $sizeAll = SizeTipeMaster::pluck('kode_size', 'deskripsi');
         $barangAll = Barang::pluck('nama_barang', 'kode_barang');
         $supplierAll= Supplier::pluck('nama_supplier', 'kode_supplier');
         $customerAll= Customer::pluck('nama_customer', 'kode_customer');
         $companyAll= Company::pluck('nama_company', 'kode_company');
         $dt = Carbon\Carbon::now();
         $period = Carbon\Carbon::parse($dt)->format('F Y');

         $get_lokasi = MasterLokasi::where('kode_lokasi',auth()->user()->kode_lokasi)->first();
         $nama_lokasi = $get_lokasi->nama_lokasi;
        
         $get_company = Company::where('kode_company',auth()->user()->kode_company)->first();
         $nama_company = $get_company->nama_company;
 
         return view('admin.transaksi.create', compact('list_url','info','sizeAll','barangAll','supplierAll','customerAll','companyAll','nama_lokasi','nama_company','period'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
         $datas =$request->all();
         // $berat = $datas['berat1'];
         // $datas['berat1'] = substr($berat,0,4);
         $datas['tanggal_masuk'] = Carbon\Carbon::now();
         $transaksi=transaksi::create($datas);
         //return view('admin.transaksi.show', compact('transaksi'));
         // return redirect()->route('transaksis.show',$transaksi->no_transaksi);
         return redirect()->route('transaksis.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function show(transaksi $transaksi)
    {
        $info['list_url']= route('transaksis.index');
        $info['edit_url']= $transaksi->edit_url;
        $info['title'] = 'Show Transaksi';
        $dt = Carbon\Carbon::now();
        $period = Carbon\Carbon::parse($dt)->format('F Y');

        $get_lokasi = MasterLokasi::where('kode_lokasi',auth()->user()->kode_lokasi)->first();
        $nama_lokasi = $get_lokasi->nama_lokasi;
        
        $get_company = Company::where('kode_company',auth()->user()->kode_company)->first();
        $nama_company = $get_company->nama_company;

        return view('admin.transaksi.show', compact('transaksi','info','nama_lokasi','nama_company','period'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function edit(transaksi $transaksi)
    {
        //
        $list_url= route('transaksis.index');
        $info['title'] = 'Edit Transaksi';
        $sizeAll = SizeTipeMaster::pluck('kode_size', 'deskripsi');
        $barangAll = Barang::pluck('nama_barang', 'kode_barang');
        $supplierAll= Supplier::pluck('nama_supplier', 'kode_supplier');
        $customerAll= Customer::pluck('nama_customer', 'kode_customer');
        $companyAll= Company::pluck('nama_company', 'kode_company');
        $dt = Carbon\Carbon::now();
        $period = Carbon\Carbon::parse($dt)->format('F Y');

        $get_lokasi = MasterLokasi::where('kode_lokasi',auth()->user()->kode_lokasi)->first();
        $nama_lokasi = $get_lokasi->nama_lokasi;
        
        $get_company = Company::where('kode_company',auth()->user()->kode_company)->first();
        $nama_company = $get_company->nama_company;
        return view('admin.transaksi.edit', compact('transaksi','list_url','info','sizeAll','barangAll','supplierAll','customerAll','companyAll','nama_lokasi','nama_company','period'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, transaksi $transaksi)
    {
        //
      $request->validate([
        'no_transaksi'=>'required',
        'no_po'=>'required',
        'nama_supir'=>'required',
        'berat1'=>'required',
        'berat2'=>'required',
      ]);
     $datas= $request->all();
     $transaksi->update($datas);	

      return redirect()->route('transaksis.show',$transaksi->no_transaksi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(transaksi $Transaksi)
    {
           try {
            $Transaksi->delete();

            $message = [
                'success' => true,
                'title' => 'Update',
                'message' => 'Selamat! Data ['.$Transaksi->no_transaksi.'] berhasil dihapus.'
            ];
            return response()->json($message);

        }catch (\Exception $exception){
            $message = [
                'success' => false,
                'title' => 'Update',
                'message' => 'Maaf! Data gagal dihapus.'
            ];
            return response()->json($message);
        }
    
    }

}
