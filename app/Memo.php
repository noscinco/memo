<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    protected $fillable = [
        'number_memo','cod_memo','subject','create_date','send_date','content','read',
    ];
    
    public function attachment(){
        return $this->hasMany('App\Attachment');
    }

    public function memoable(){
        return $this->morphTo();
    }

}
