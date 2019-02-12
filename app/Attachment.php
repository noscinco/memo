<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'attachment','name',
    ];
    
    public function memo(){
        return $this->belongsTo('App\Memo');
    }

}
