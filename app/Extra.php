<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra extends BaseModel
{
    //
    protected $fillable = ['name','description','vehicle_type_id','price'];
}
