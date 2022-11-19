<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Auditable\AuditableTrait;
use App\transaksi;

class Barang extends Model
{
    protected $table = 'barangs';

	protected $primaryKey = 'kode_barang';

	public $incrementing = false;

	protected $fillable = [
    	'kode_barang',
    	'nama_barang',
    	'tipe_barang',
    ];

    public function Transaksi()
    {
    return $this->hasMany(transaksi::class,'kode_barang');
    }

     public function getDestroyUrlAttribute()
    {
        return route('barangs.destroy', $this->kode_barang);
    }

    public function getEditUrlAttribute()
    {
        return route('barangs.edit',$this->kode_barang);
    }

    public function getUpdateUrlAttribute()
    {
        return route('barangs.update',$this->kode_barang);
    }

    public static function boot()
    {
        parent::boot();
       
        static::creating(function ($query){
            $query->kode_company = Auth()->user()->kode_company;
            $query->kode_barang = static::generateKode(request()->nama_barang);
            $query->created_by = Auth()->user()->name;
            $query->updated_by = Auth()->user()->name;
        });

        static::updating(function ($query){
           $query->updated_by = Auth()->user()->name;
        });
    }

    public static function generateKode($sumber_text)
    {
        $lastRecort = self::orderBy('kode_barang', 'desc')->first();
        $prefix = strtoupper($sumber_text);
        $primary_key = (new self)->getKeyName();

        if ( $lastRecort == null )
            $number = 0;
        else {
            $field = $lastRecort->{$primary_key};

            if ($prefix[0] != $lastRecort->{$primary_key}[0]){
                $number = $field;
            }else {
                $number = 0;
            }
        }

        return sprintf('%03d', intval($number) + 1);
    }
}
