<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $fillable = ['logo', 'name'];
    public $timestamps = true;

    public function merk()
    {
        return $this->hasMany('App\Tipe','merk_id');
    }
}

