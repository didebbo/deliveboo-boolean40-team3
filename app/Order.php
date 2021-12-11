<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // protected $guarder = [];
    protected $fillable = ['customer_email', 'customer_firstname', 'customer_lastname', 'customer_phone', 'customer_address', 'notes', 'user_id', 'total_price', 'status'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function dishes()
    {
        return $this->belongsToMany('App\Dish');
    }
}
