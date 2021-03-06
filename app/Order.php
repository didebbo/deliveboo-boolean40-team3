<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_price', 'status', 'customer_email', 'customer_firstname', 'customer_lastname', 'customer_phone', 'customer_address', 'notes'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function dishes()
    {
        return $this->belongsToMany('App\Dish')->withPivot(['quantity']);
    }
}
