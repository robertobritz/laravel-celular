<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'user_id', 'marca', 'serial_number','modelo','IMEI1', 
        'IMEI2', 'mac_wirelles',
    ];


    public function user()
    {
        return $this->hasone(User::class);
    }
}
