<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\transaksi;


class Supplier extends Model
{
    //

    protected $table = 'suppliers';

	protected $primaryKey = 'kode_supplier';

	public $incrementing = false;

	protected $fillable = [
    	'kode_supplier',
    	'nama_supplier',
    	'alamat',
    ];

    public function Transaksi()
    {
    return $this->hasMany(transaksi::class,'kode_supplier');
    }

     public function getDestroyUrlAttribute()
    {
        return route('supplier.destroy', $this->kode_supplier);
    }

    public function getEditUrlAttribute()
    {
        return route('supplier.edit',$this->kode_supplier);
    }

    public function getUpdateUrlAttribute()
    {
        return route('supplier.update',$this->kode_supplier);
    }

    public static function boot()
    {
        parent::boot();
       
        static::creating(function ($query){
            $query->kode_company = Auth()->user()->kode_company;
            $query->kode_supplier = static::generateKode(request()->nama_supplier);
            $query->created_by = Auth()->user()->name;
            $query->updated_by = Auth()->user()->name;
        });

        static::updating(function ($query){
           $query->updated_by = Auth()->user()->name;
        });
    }

    public static function generateKode($sumber_text)
    {
        $lastRecort = self::orderBy('kode_supplier', 'desc')->first();
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
