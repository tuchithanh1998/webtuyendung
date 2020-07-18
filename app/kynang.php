<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kynang extends Model
{
    protected $table="kynang";
	public $timestamps=false;

	public function nganhnghe()
	{
		return $this->belongsTo('App\nganhnghe','id_nganhnghe');
	}
}
