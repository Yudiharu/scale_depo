<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\Auditable\AuditableTrait;

class Customer extends Model
{

    protected $table = 'customer';

    protected $primaryKey = 'kode_customer';

    public $incrementing = false;
    
    protected $fillable = [
        'kode_customer',
        'nama_customer',
        'no_telepon'
    ];

    public function Transaksi()
    {
    return $this->hasMany(transaksi::class,'kode_customer');
    }

    public function getDestroyUrlAttribute()
    {
        return route('customer.destroy', $this->kode_customer);
    }

    public function getEditUrlAttribute()
    {
        return route('customer.edit',$this->kode_customer);
    }

    public function getUpdateUrlAttribute()
    {
        return route('customer.update',$this->kode_customer);
    }

    public static function boot()
    {
        parent::boot();
       
        static::creating(function ($query){
            $query->kode_company = Auth()->user()->kode_company;
            $query->kode_customer = static::generateKode(request()->nama_customer);
            $query->created_by = Auth()->user()->name;
            $query->updated_by = Auth()->user()->name;
        });

        static::updating(function ($query){
           $query->updated_by = Auth()->user()->name;
        });
    }

    public static function generateKode($sumber_text)
    {
        $lastRecort = self::orderBy('kode_customer', 'desc')->first();
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
