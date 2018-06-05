<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    protected $fillable = ['name','merk_id'];
    public $timestamps = true;

    public function merk()
    {
        return $this->belongsTo('App\Merk','merk_id');
    }
}
