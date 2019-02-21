<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WashRequest extends BaseModel
{
    //
//    protected $dates =[
//      'wash_date'
//    ];

    protected $fillable = ['wash_time','wash_date','price_id','valet_id','client_id','wash_location','extra_notes','status','rating_id'];

    public function service(){
        return $this->belongsTo(Price::class);
    }



    public function valet(){
        return $this->belongsTo(User::class,'valet_id');
    }

    public function rating(){
        return $this->hasOne(Rating::class,'wash_request_id');
    }

    public function client(){
        return $this->belongsTo(User::class,'client_id');
    }

    public function price(){
        return $this->belongsTo(Price::class,'price_id');
    }
}
