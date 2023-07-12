<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    protected $table = 'order_product';
    protected $primarykey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'order_id',  'product_id', 'quantity_product_order'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

    public function order(){
        return $this->belongsTo(Orders::class, 'order_id', 'id');
    }
}
