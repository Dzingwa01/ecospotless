<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends BaseModel
{
    //
    protected $fillable = ['service','description','vehicle_type_id','price','service_type'];

    public function vehicle(){
        return $this->hasOne(VehicleType::class,'id','vehicle_type_id');
    }

    public function wash_requests(){
        return $this->hasMany(WashRequest::class,'price_id');
    }
}
