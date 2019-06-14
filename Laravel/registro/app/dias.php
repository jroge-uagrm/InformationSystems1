<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dias extends Model
{
    protected $table = 'dias';

    protected $fillable = [
        'diasUsados'
    ];

    public function grupo()
    {
        return $this->hasMany('App\grupo','idDias');
    }
}
