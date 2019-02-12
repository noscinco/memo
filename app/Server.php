<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Server extends Model
{
    protected $fillable = [
        'name', 'cpf','siape_code','number_memo','initials_code',
    ];
    public function office(){
        return $this->belongsTo('App\Office');
    }
    public function sector(){
        return $this->belongsTo('App\Sector');
    }
    public function user(){
        return $this->morphOne('App\User','userable');
    }
}
