<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhatuyendung_luu_ungvien extends Model
{
    protected $table="nhatuyendung_luu_ungvien";
   public $timestamps=false;
   public function ungvien()
	{
		return $this->belongsTo('App\ungvien','id_ungvien');
	}
   
}
