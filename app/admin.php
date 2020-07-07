<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class admin  extends Authenticatable
{
    use Notifiable;
    protected $table="admin";
    public $timestamps=false;
    const PASSWORD = 'matkhau';
    //const NAME = 'hoten';
    
    public function getAuthPassword()
    {
        return $this->matkhau;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'matkhau','hoten',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'matkhau', 'remember_token',
    ];

   
}
