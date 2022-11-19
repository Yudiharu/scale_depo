<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Auditable\AuditableTrait;
use App\transaksi;

class SizeTipeMaster extends Model
{
    //
    protected $table = 'size_tipe_masters';

	protected $primaryKey = 'kode_size';
    
    public $incrementing = false;

	protected $fillable = [
    	'kode_size',
    	'deskripsi',
    ];

    public function Transaksi()
    {
      return $this->hasMany(transaksi::class,'kode_size');
    }

     public function getDestroyUrlAttribute()
    {
        return route('sizetipemaster.destroy',$this->kode_size);
    }

    public function getEditUrlAttribute()
    {
        return route('sizetipemaster.edit',$this->kode_size);
    }

    public function getUpdateUrlAttribute()
    {
        return route('sizetipemaster.update',$this->kode_size);
    }

    public static function boot()
    {
        parent::boot();
       
        static::creating(function ($query){
            $query->kode_company = Auth()->user()->kode_company;
            $query->created_by = Auth()->user()->name;
            $query->updated_by = Auth()->user()->name;
        });

        static::updating(function ($query){
           $query->updated_by = Auth()->user()->name;
        });
    }
}
