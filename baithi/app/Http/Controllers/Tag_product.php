<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

    class Tag_product extends Model{
        protected $table = 'tag_product';
        protected $primarykey = 'id';
        public $timestamps = false;
        protected $fillable = [
            'tag_id', 'product_id'
        ];
    }