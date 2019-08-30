<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $table = 'bill_details';
    public function customer(){
        // return $this->belongsTo('App\Customer','id_customerr','id');
    }
}
