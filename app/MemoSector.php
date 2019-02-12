<?php

namespace App;
use App\Memo;
use Illuminate\Database\Eloquent\Model;

class MemoSector extends Model
{
    protected $guard=['id'];
    
    public function sector(){
        return $this->hasOne('App\Sector');
    }
    public function memo(){
        return $this->morphOne('App\Memo','memoable');
    }
}
