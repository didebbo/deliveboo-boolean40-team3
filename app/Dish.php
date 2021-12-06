<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $guarded = [];

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
