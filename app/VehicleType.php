<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends BaseModel
{
    //
    protected $fillable = ['name','description'];

    public function price(){
        return $this->hasOne(Price::class);
    }
}
