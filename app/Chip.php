<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chip extends Model
{
    protected $fillable = [
        'user_id', 'numero', 'id_chip','PIN1','PIN2',
         'PUNK', 'PUNK2', 'DADOS'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
