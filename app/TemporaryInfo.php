<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryInfo extends Model
{
    protected $fillable = [
        'name', 'cpf','siape_code',
    ];
    public function office(){
        return $this->belongsTo('App\Office');
    }
    public function sector(){
        return $this->belongsTo('App\Sector');
    }
    public function server(){
        return $this->belongsTo('App\Server');
    }
}
