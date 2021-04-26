<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function customers(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function products(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
