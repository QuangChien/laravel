<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'product_id');
    }

    public function path(){
        return url("./phong-khach-san/{$this->id}-".$this->slug);
    }

    public function pathProduct(){
        return url("phong-khach-san/{$this->id}-".$this->slug);
    }
}
