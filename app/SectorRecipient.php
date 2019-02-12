<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SectorRecipient extends Model
{
    protected $guard=[
        'id',
    ];
    public function memo(){
        return $this->belongsTo('App\Memo');
    }
    public function recipient_sector(){
        return $this->belongsTo('App\Sector');
    }
}
