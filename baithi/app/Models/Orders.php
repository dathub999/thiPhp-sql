<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primarykey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'delivered','status',
    ];

    public function order_product(){
        return $this->hasMany(order_product::class, 'id');
    }
}
