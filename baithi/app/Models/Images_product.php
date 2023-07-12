<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

    class Images_product extends Model{
        protected $table = 'images_product';
        protected $primarykey = 'id';
        public $timestamps = false;
        protected $fillable = [
            'name', 'photo', 'product_id'
        ];
    }