<?php

namespace App;
use App\Memo;
use Illuminate\Database\Eloquent\Model;

class MemoServer extends Model
{
    protected $guard=['id'];
    public function server(){
        return $this->hasOne('App\Server');
    }
    public function memo(){
        return $this->morphOne('App\Memo','memoable');
    }
}
