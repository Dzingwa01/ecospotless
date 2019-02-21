<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends BaseModel
{
    //
    protected $fillable = ['stars','description','valet_id','wash_request_id'];

    public function valet(){
        return $this->belongsTo(User::class,'valet_id');
    }

    public function request(){
        return $this->belongsTo(WashRequest::class,'wash_request_id');
    }
}
