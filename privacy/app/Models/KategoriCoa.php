<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriCoa extends Model
{

	protected $table = 'kategori_coa';

	protected $primaryKey = 'kode_kategori';

	public $incrementing = false;
    
    protected $fillable = [
    	'kode_kategori',
    	'nama_kategori'
    ];


}
