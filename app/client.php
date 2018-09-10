<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\paymentDest;

class client extends Model
{
    //
    /**
     * primary key
     */
    protected $primaryKey = 'clientId';

    public function paymentDest (){
        $this->hasOne($this->paymentDest());
    }
}
