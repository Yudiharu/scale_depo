<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\timbangan;
use App\Charts\dataCharts;
use App\transaksi;
use App\Models\sessions;
use App\Models\MasterLokasi;
use App\Models\Company;
use App\Models\Chat;
use App\User;
use Alert;
use DB;
use Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
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

        $level = auth()->user()->level;
        $nama_user = auth()->user()->username;

        $user_login = User::join('sessions', 'users.id', '=', 'sessions.user_id')
                ->get();
        $leng4 = $user_login->count();

        $user_login2 = User::select('users.name')
                ->where('users.kode_company',auth()->user()->kode_company)
                ->get();

        $chat = Chat::join('users', 'users_chat.to_id', '=', 'users.id')
                ->get();  
        $leng_chat = $chat->count();

        return view('home',compact('period', 'user_login', 'leng4', 'nama_lokasi', 'level','nama_company','nama_user', 'user_login2', 'chat', 'leng_chat','company'));
    }


    public function savechat(Request $request)
    {
        $from_id = auth()->user()->id;
        $pesan = $request->pesan;
        $tujuan = $request->tujuan;

        $gettujuan_id = User::where('name',$tujuan)->first();
        $to_id = $gettujuan_id->id;

        $chat = [
            'from_id'=>$from_id,
            'to_id'=>$to_id,
            'chat'=>$pesan,
        ];

        $savechat = Chat::create($chat);
        return redirect()->back();
    }

}
