<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primarykey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'name', 'photo', 'price', 'quantity', 'details', 'categogy_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categogy_id','id');
    }
    
    public function order_product()
    {
        return $this->belongsTo(order_product::class, 'product_id','id');
    }

    public function images(){
        return $this->hasMany(Images_product::class,'product_id', 'id');
    }
}
