<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SizeTipeMaster;
use App\Barang;
use App\Supplier;
use App\Models\Company;
use App\Models\Customer;
use DB;

class transaksi extends Model
{
    //
    protected $table = 'transaksis';

	protected $primaryKey = 'no_transaksi';

    protected $dates=['tanggal_masuk'];

	public $incrementing = false;

	protected $fillable = [
    	'no_transaksi',
    	'no_polisi',
        'no_po',
        'no_container',
        'no_seal',
        'id_size',
        'muatan',
    	'kode_barang',
        'kode_supplier',
        'kode_company',
        'kode_customer',
    	'nama_supir',
    	'keterangan',
    	'tanggal_masuk',
    	'berat1',
    	'berat2'
    ];

    public function Barang()
    {
        return $this->belongsTo(Barang::class,'kode_barang');
    }

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class,'kode_supplier');
    }

    public function Company()
    {
        return $this->belongsTo(Company::class,'kode_company');
    }

    public function Customer()
    {
        return $this->belongsTo(Customer::class,'kode_customer');
    }

    public function SizeTipeMaster()
    {
        return $this->belongsTo(SizeTipeMaster::class,'id_size');
    }


    public function getDestroyUrlAttribute()
    {
        return route('transaksis.destroy', $this->no_transaksi);
    }

    public function getEditUrlAttribute()
    {
        return route('transaksis.edit',$this->no_transaksi);
    }

    public function getUpdateUrlAttribute()
    {
        return route('transaksis.update',$this->no_transaksi);
    }

    public function getShowUrlAttribute()
    {
        return route('transaksis.show',$this->no_transaksi);
    }

    public function getExportExcelAttribute()
    {
        return route('transaksis.toExcel',$this->no_transaksi);
    }

    public function getLastTransaksi()
    {
        $last = DB::table('transaksis')->latest('no_transaksi')->first();

        return $last;
    }
    
    public function generateNoTransaksi($transaksi)
    {
       $lastransaksi= $this->getLastTransaksi()->no_transaksi;
       $bulantahun= date('ym');
       $maxkode= 0;
       $kode = 0;
       $kosong = true;
       $kodetransaksi = "";
       $prefix1 = "TBS";
       $prefix2 = "TBC";
       $prefix3 = "TBM";

    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($query){
            $query->no_transaksi = static::generateKode(request());
        });
    }

    public static function generateKode($data,$source_text = 'TBN')
    {
        
        $primary_key = (new self)->getKeyName();
        $get_prefix_1 = Auth()->user()->id;
        $get_prefix_2 = strtoupper($source_text);
        $get_prefix_3 = date('my');
        $prefix_result = $get_prefix_1.$get_prefix_2.$get_prefix_3;
        $prefix_result_length = strlen($get_prefix_1.$get_prefix_2.$get_prefix_3);

        $lastRecort = self::where($primary_key,'like',$prefix_result.'%')->orderBy('created_at', 'desc')->first();

        if ( ! $lastRecort )
            $number = 0;
        else {
            $get_record_prefix = strtoupper(substr($lastRecort->{$primary_key}, 0,$prefix_result_length));
            if ($get_record_prefix == $prefix_result){
                $number = substr($lastRecort->{$primary_key},$prefix_result_length);
            }else {
                $number = 0;
            }

        }

        $result_number = $prefix_result . sprintf('%06d', intval($number) + 1);

        return $result_number ;
    }

    
    
}
